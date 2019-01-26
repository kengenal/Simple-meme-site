@extends('layouts.app')
@section('title', 'Memes')
@section('content')
<div class="container">
    <div class="row justify-content-center pt-3">
        <div class="col-md-10">
            @include('layouts.meme')
        </div>
    </div>
</div>
@endsection