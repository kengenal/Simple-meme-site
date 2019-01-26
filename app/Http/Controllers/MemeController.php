<?php
declare(ticks=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Meme;
use App\Models\Memes;
use Auth;
use Validator;

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
    public function show()
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
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'url' => 'required|min:5',
        ])->validate();

        $url = $request->input('url');

        $filesystem = public_path('img/memes');
        $meme = new Meme();
        $meme->getUrl($url);
        $result = $meme->getMeme();
        $memid = uniqid();
        if ($result && !$result['errors'])
        {
            $data = Memes::create([
               'user_id' => Auth::id(),
               'title'   => $result['title'],
               'type'    => $result['type'],
               'format'  => $result['format'],
               'home'    => true,
               'name'    => $memid,
             ]);
            $id = $data->id;
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
}
