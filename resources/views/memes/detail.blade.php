@extends('layouts.app')
@section('title', 'Memes')
@section('content')
	<div class="container">
    	<div class="row justify-content-center pt-3">
 
        <div class="col-md-10">
            <div class="card bg-kenons pt-2 pb-2 m-3">
                <div class="card-body bg-kenons ">
                    <p>
                        <center><a href=""><h3>{{ $meme[0]->title }}</h3></a></center>
                        @if($meme[0]->type == 'img')
                            <center><img src="{{asset('img/memes').'/'.$meme[0]->id.'.'.$meme[0]->format}}" class="img-responsive" width="800"></center>
                        @elseif ($meme[0]->type == 'gif')
                            <center>
                                <video width="800" controls>
                                    <source src="{{asset('img/memes').'/'.$meme[0]->id.'.'.$meme[0]->format}}" type="video/{{$meme[0]->format}}">
                                </video>
                        </center>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection