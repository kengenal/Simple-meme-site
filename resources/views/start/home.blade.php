@extends('layouts.app')
@section('title', 'Home')
@section('content')
<div class="container">
    <div class="row justify-content-center pt- w-100">
        <div class="col-md-12 justify-content-center">
            <div class="card bg-kenons">
                <div class="card-body bg-kenons center">
                    <h4 class="text-center">Complete Modules</h4>
                    <hr>
                        <div class="justify-content-center">      
                             <a href="{{ route('memes') }}" class="btn btn-success w-22 m-4">
                                <i class="fas fa-bell fa-10x" style="width:180px;"></i>
                                <p>Memes</p>
                            </a>
                        </div>
                        <br><br>
                        <div class="justify-content-center">
                            <h4 class="text-center">Coming soon..</h4>
                            <hr>
                            <a class="btn btn-success w-22 m-4 justify-content-center" disabled>
                                <i class="fas fa-bell-slash fa-10x"></i>
                                <p>Todoist</p>
                            </a>
                            <a class="btn btn-success w-22 m-4 justify-content-center" disabled>
                                <i class="fas fa-bell-slash fa-10x"></i>
                                <p>Quiz app</p>
                            </a>
                             <a class="btn btn-success w-22 m-4 justify-content-center" disabled>
                                <i class="fas fa-bell-slash fa-10x"></i>
                                <p>Discord integrate</p>
                            </a>
                            <a class="btn btn-success w-22 m-4 justify-content-center" disabled>
                                <i class="fas fa-bell-slash fa-10x"></i>
                                <p>Comments And likes</p>
                            </a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
