@extends('layouts.app')
@section('title', 'Register')
@section('content')
<div class="container">
    <div class="row justify-content-center pt-5">
        <div class="col-md-4">
            <div class="card bg-kenons">
                <div class="avatar">
                    <img src="{{URL::asset('img/avatar.png')}}" alt="Avatar" height="70" width="70">
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" class="pt-5">
                        @csrf

                        <div class="form-group row">
                            <!--<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>-->

                            <div class="col-md-12">
                                <div class="input-group flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user"></i></span>
                                    </div>
                                      <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" name="name" value="{{ old('name') }}" required autofocus>
                                </div>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <!--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>-->

                            <div class="col-md-12">                 
                                <div class="input-group flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping">@</span>
                                    </div>
                                      <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" required>
                                </div>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <!--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>-->

                            <div class="col-md-12">
                                <div class="input-group flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping"><i class="fa fa-lock"></i></span>
                                    </div>
                                      <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" name="password" required>
                                </div>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert" display="block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <!--<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>-->

                            <div class="col-md-12">
                                <div class="input-group flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping"><i class="fa fa-lock"></i></span>
                                    </div>
                                      <input id="password-confirm" type="password" class="form-control" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required>
                                </div>
                            </div>
                        </div>

                        <div class="container col-md-8">
                            <div >
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
