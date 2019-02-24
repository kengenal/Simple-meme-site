@extends('layouts.app')
@section('title', 'Memes')
@section('content')
<div class="container">
    @if (Auth::check())
        <div class="row justify-content-center pt-3 w-100">
            <div class="col-md-6 justify-content-center">
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
                        <div class=" bg-kenons">
                        	<form action="{{ route('url.memes') }}" method="Post" role="form" class="col-12">
                                <div class="row">
                            		<input type="hidden" name="_token" value="{{ csrf_token() }}">
                            		<div class="form-goup col-md-10 row justify-content-left mr-3">
                                        <div class="input-group flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-save"></i></span>
                                            </div>
                                            <input type="text" name="url" class="form-control" placeholder="Add meme">
                                        </div>
                                    </div>
                                    <div class="row justify-content-right">
                            		    <button class="btn btn-success float-right mr-2"><i class="fas fa-hdd"></i></button>
                                        <a @click="toggle = !toggle" class="btn btn-success float-right ml-2"><i class="fas fa-cloud-upload-alt"></i></a>
                                    </div>
                                </div>
                        	</form>
                     	</div>
                    </div>
                </div>
            </div>
        @endif
        <transition name="bounce">
            <div v-if="toggle" class=" row justify-content-center w-100 p-3" >
                @include('layouts.addFiles')
            </div>
        </transition>
        <div class="col-md-8 row justify-content-center w-100 ml-auto mr-auto">
            @include('layouts.meme')
        </div>
        <div class="col-md-6 row justify-content-center w-100">
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