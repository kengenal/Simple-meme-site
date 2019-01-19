<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Meme;
use App\Models\Memes;
use Auth;

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
       
       return view('memes.show');
    }

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function add(Request $request)
    {
       $url = $request->input('url');

       $filesystem = public_path('img/memes');
       $meme = new Meme();
       $meme->getUrl($url);
       $result = $meme->getMeme();
       $data = Memes::create([
            'user_id' => Auth::id(),
            'title'   => $result['title'],
            'type'    => $result['type'],
            'home'    => true,
       ]);
       $id = $data->id;
       $errors = $meme->download($filesystem, $id);
      
       return redirect('/memes');
    }
}
