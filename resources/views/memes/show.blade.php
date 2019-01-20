@extends('layouts.app')
@section('title', 'Memes')
@section('content')
<div class="container">
    <div class="row justify-content-center pt-3">
        <div class="col-md-6">
            <div class="card bg-kenons">
                <div class="card-body bg-kenons">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error) 
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    @if(session('sucsess'))
                        <div class="alert alert-success">
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif
                      @if(session('error'))
                        <div class="alert alert-success">
                            <p>Meme not found</p>
                        </div>
                    @endif
                    <div class=" bg-kenons ">
                    	<form action="{{ route('add.memes') }}" method="Post" role="form" class="col-12">
                            <div class="row">
                        		<input type="hidden" name="_token" value="{{ csrf_token() }}">
                        		<div class="form-goup col-md-11 ">
                                    <div class="input-group flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping"><i class="far fa-hdd"></i></span>
                                    </div>
                                    <input type="text" name="url" class="form-control" placeholder="Add meme">
                                </div>
                                </div>
                                <div class="float-right">
                        		    <button class="btn btn-success float-right"><i class="fas fa-save"></i></button>
                                </div>
                            </div>
                    	</form>
                 	</div>
                </div>
            </div>
        </div>
            <div class="col-md-10">
                @foreach ($memes as $mem)
                <div class="card bg-kenons pt-2 pb-2 m-3">
                    <div class="card-body bg-kenons ">
                        <p>
                            <center><a href="memes/detail/{{ $mem->id }}"><h3>{{ $mem->title }}</h3></a></center>
                            @if($mem->type == 'img')
                                <center><img src="{{asset('img/memes').'/'.$mem->id.'.'.$mem->format}}" class="img-responsive" width="800"></center>
                            @elseif ($mem->type == 'gif')
                                <center>
                                    <video width="800" controls>
                                        <source src="{{asset('img/memes').'/'.$mem->id.'.'.$mem->format}}" type="video/{{$mem->format}}">
                                    </video>
                            </center>
                            @endif
                        </p>
                    </div>
                </div>
                @endforeach 
            </div>
            <div class="col-md-6">
                <div class="card bg-kenons">
                    <div class="card-body ">
                        <center><div class="col-md-4">{{ $memes->links() }}</div></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection