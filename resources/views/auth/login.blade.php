@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="modal" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-notify" role="document">
                    <!--Content-->
                    <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header text-center modal-color">
                            <h4 class="modal-title white-text w-100 font-weight-bold py-2">Iniciar Sesión</h4>
                        </div>
                        <!--Body-->
                        <form method="POST" action="{{ route('login') }}">
                        @csrf
                            <div class="modal-body">
                                <div class="md-form mb-5">
                                <i style="display: block" class="fas fa-user prefix grey-text"></i>
                                <input id="email" type="email" class="form-control validate @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <label style="font-size: 0.9em" data-error="wrong" data-success="right" for="form3">Email</label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="md-form">
                                <i style="display: block" class="fas fa-envelope prefix grey-text"></i>
                                <input id="password" type="password" class="form-control validate @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <label style="font-size: 0.9em" data-error="wrong" data-success="right" for="form2">Contraseña</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <!--Footer-->
                            <div class="modal-footer justify-content-center">
                                <button type="submit" class="btn btn-outline btn-color">Entrar <i class="fas fa-paper-plane-o ml-1"></i></button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link btn-olvide-contrasena" href="{{ route('password.request') }}">
                                        {{ __('Olvidé la contraseña?') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                    <!--/.Content-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
