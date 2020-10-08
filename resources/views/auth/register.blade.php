@extends('layouts.app')
@section('title', 'Register')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="class="modal" role="dialog" aria-labelledby="myModalLabel"">
                <div class="modal-dialog modal-notify" role="document">
                    <!--Content-->
                    <div class="modal-content">
                        <div class="modal-header text-center modal-color">
                            <h4 class="modal-title white-text w-100 font-weight-bold py-2">Registrarse</h4>
                        </div>
                        <form method="POST" action="{{ route('register') }}">
                        @csrf
                            <div class="modal-body">
                                <div class="md-form">
                                    <label style="font-size: 0.9em" for="name" data-error="wrong" data-success="right">Nombre</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="md-form">
                                    <label style="font-size: 0.9em" for="email" class="text-md-right" data-error="wrong" data-success="right">Email</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>

                                <div class="md-form">
                                    <label style="font-size: 0.9em" for="password" class="text-md-right" data-error="wrong" data-success="right">Contraseña</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="md-form">
                                    <label style="font-size: 0.9em" for="password-confirm" class="text-md-right" data-error="wrong" data-success="right">Confirmar contraseña</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <div class="">
                                    <button type="submit" class="btn btn-outline btn-color">
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
</div>
@endsection
