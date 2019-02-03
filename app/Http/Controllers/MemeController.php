<?php
declare(ticks=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Meme;
use App\Models\Memes;
use Auth;
use Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class MemeController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function memes()
    {
       $memes = Memes::where('home', '=', true)->orderBy('id', 'desc')->paginate(10);
       return view('memes.show', [
            'memes' => $memes,
            'width' => 600,
       ]);
    }

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function addUrl(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'url' => 'required|min:5',
        ])->validate();

        $url = $request->input('url');

        $meme = new Meme();
        $meme->getUrl($url);
        $result = $meme->getMeme();
        $storage =  Storage::disk('public')->getDriver()->getAdapter()->getPathPrefix();
        $memid = uniqid();
        if ($result && !$result['errors'])
        {
            $folder = $result['type'];
            $filesystem = "{$storage}/memes/{$folder}";
            $data = Memes::create([
               'user_id' => Auth::id(),
               'title'   => $result['title'],
               'type'    => $result['type'],
               'format'  => $result['format'],
               'home'    => true,
               'name'    => $memid,
             ]);
            $errors = $meme->download($filesystem, $memid);
           
            return redirect('/memes')->with('Meme has be added');
        }
        else
        {
            return redirect('/memes')->withErrors('Meme not found');
        }
    }
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function detail(int $id)
    {
       $meme = Memes::where('id', $id)->get();
       return view('memes.detail', [
            'memes' => $meme,
            'width' => 800,
       ]);
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function addFile(Request $request)
    {
        $max_upload = auth()->user()->staff ? '64000' : '1999';
        $video_format = ['webm', 'mp4'];
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3',
            'get-meme'   => 'mimes:mp4,webm,jpg,jpeg,png|max:'.$max_upload,
        ])->validate();

        $show_home = $request->input('home') ? 1 : 0;
        $title = $request->input('title');
        echo $show_home;
        if ($request->hasFile('upload_meme'))
        {
            $file_type_array = explode('.', $request->upload_meme->getClientOriginalName());
            $file_type = end($file_type_array);
            $meme = $request->upload_meme->getClientOriginalName();
            $meme_id = uniqid();
            $type = '';
            if (in_array($file_type, $video_format))
            {
                $type = 'gif';
            }
            else
            {
                $type = 'img';
            }
            $file = $request->upload_meme->storeAs("memes/{$type}", $meme_id.'.'.$file_type, 'public');
            $data = Memes::create([
                'user_id' => Auth::id(),
                'title'   => $title,
                'type'    => $type,
                'format'  => $file_type,
                'home'    => $show_home,
                'name'    => $meme_id,
            ]);
            return redirect('/memes')->with('Meme has be uploaded');
        }
    }

}
