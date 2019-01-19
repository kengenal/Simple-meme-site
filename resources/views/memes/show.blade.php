@extends('layouts.app')
@section('title', 'Memes')
@section('content')
<div class="container">
    <div class="row justify-content-center pt-5">
        <div class="col-md-6">
            <div class="card bg-kenons ">
            	<form action="{{ route('add.memes') }}" method="Post" role="form">
            		<input type="hidden" name="_token" value="{{ csrf_token() }}">
            		<div class="form-goup">
            		<input type="text" name="url"  class="form-control">
            		<button class="btn btn-primary">Save</button>
            	</div>
            	</form>

         	</div>
        </div>
    </div>
</div>
@endsection