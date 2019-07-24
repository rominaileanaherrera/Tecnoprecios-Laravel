@extends('layouts.app')
@section('assets')
<link rel="stylesheet" href="{{asset('css/registercss.css')}}">
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="header">{{ __('Registrate') }}</div>
                <br>

                

                <div class="body">
                    <form method="POST" class="form" id="form"  action="{{ route('register') }}"enctype= "multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class=" form-control formatoform btn btn-outline-primary" name="name" value="{{ old('name') }}" autofocus >

                                @if ($errors->has('name'))
                                    <strong>{{ $errors->first('name') }}</strong>
                                @endif
                                <p id="errorName"> </p>

                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class=" form-control formatoform btn btn-outline-primary" name="email" value="{{ old('email') }}"  >
                                
                                @if ($errors->has('email'))
                                    <strong>{{ $errors->first('email') }}</strong>
                                @endif
                                <p id="errorEmail"> </p>
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control formatoform btn btn-outline-primary" name="password" >
                                
                                <small class="form-text text-muted">
                                    Al menos 8 caracteres, debe contenter letras en mayúsculas, minúsculas y números
                                </small>
                                
                                @if ($errors->has('password'))
                                    <strong>{{ $errors->first('password') }}</strong>
                                @endif
                                <p id="errorPass"> </p>
                                
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="passwordconfirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirme el Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control formatoform btn btn-outline-primary" name="password_confirmation">
                                <p id="errorPass2"></p>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Subí tu foto') }}</label>

                            <div class="col-md-6">
                                <input  class="archivo" id="avatar" type="file"  name="avatar">
                                @if ($errors->has('avatar'))
                                    <strong>{{ $errors->first('avatar') }}</strong>
                                @endif
                                <p id="errorAvatar"> </p>

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="formatoform btn  btn-primary btn-lg btn-block">
                                    {{ __('Registrarse') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/register2.js')}}"></script>
@endsection
