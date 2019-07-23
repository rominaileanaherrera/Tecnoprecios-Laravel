@extends('layouts.app')
@section('assets')
<link rel="stylesheet" href="{{asset('css/registercss.css')}}">
@endsection

@section('content')
<!-- <div class="logoRegistro"> 
<img src="img/logoRegistro2.png" alt="logo">
</div> -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="header">{{ __('Formulario de Registro') }}</div>
                <br>

                <!-- {{ $errors }} -->

                <div class="body">
                    <form method="POST" action="{{ route('register') }}"enctype= "multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="formatoform btn btn-outline-primary @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="formatoform btn btn-outline-primary @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="formatoform btn btn-outline-primary @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirme el Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="formatoform btn btn-outline-primary" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Subí tu foto') }}</label>

                            <div class="col-md-6">
                                <input  class="archivo" type="file"  name="avatar" required autocomplete="Subí tu foto">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="formatoform btn btn-primary btn-lg">
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
<script src="{{asset('js/register.js')}}"></script>
@endsection
