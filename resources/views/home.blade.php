@extends('layouts.app')
@section('title', 'Admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Card -->
            <div class="card mt-2">
                <!-- Card image -->
                <div class="view overlay">
                    <img class="card-img-top" src="https://mdbootstrap.com/img/Mockups/Lightbox/Thumbnail/img%20(67).jpg"
                        alt="Card image cap">
                    <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>
                <!-- Card content -->
                <div class="card-body">
                <!-- Title -->
                <h4 class="card-title text-center  text-capitalize text-bold">Bienvenido {{ Auth::user()->name }}</h4>
                <!-- Text -->
                <p class="card-text text-center">Empieza a revisar tu tienda online</p>
                <!-- Button -->
                <a href="{{url('courses/')}}" class="btn btn-primary btn-lg btn-block text-capitalize">Acceder <i class="fas fa-check"></i></a>
                </div>
            </div>
            <!-- Card -->
        </div>
    </div>
</div>
@endsection
