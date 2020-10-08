@extends('layouts.app')
@section('title', 'Lista de cursos')
@section('content')
    <div class="container card-course">
            @foreach ($courses as $course)
                <!-- News jumbotron -->
                    <!-- Grid row -->
                    <div class="row hoverable">
                    <!-- Grid column -->
                    <div class="col-md-4 offset-md-1 mx-3 my-3">
                        <!-- Featured image -->
                        <div class="view overlay">
                            @if ($course->extension)
                                {{--  img 600x300 --}}
                                <img src="{{url("courses/imgcourses/$course->id.$course->name.$course->extension")}}" class="img-fluid" alt="Sample image for first version of blog listing">
                            @endif
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                    </div>
                    <!-- Grid column -->
                    <!-- Grid column -->
                    <div class="col-md-7 text-md-left ml-3 mt-3">
                        <!-- Excerpt -->
                        <a href="#!" class="green-text">
                        <h6 class="h6 pb-1"><i class="fas fa-desktop pr-1"></i> Programación</h6>
                        </a>
                        <h4 class="h4 mb-4 text-muted">{{$course->name}}</h4>
                        <p class="font-weight-normal text-muted">{{$course->description}}</p>
                        <p class="font-weight-normal text-muted">Impartido por <a class="text-muted" href="{{route('teacher')}}"><strong>Prof. {{$course->user_id}}</strong></a>, actualizado  19/08/2020</p>
                        @include('in_shopping_cart.form',['course'=>$course])
                        <div class="card-footer card-footer-recomendado text-muted text-right">
                            <span class="text-recomendado">Recomendado</span>
                            <i class="fa fa-star star-recomended"></i>
                            <i class="fa fa-star star-recomended"></i>
                            <i class="fa fa-star star-recomended"></i>
                            <i class="fa fa-star star-recomended"></i>
                            <i class="fa fa-star-half star-recomended"></i>
                        </div>
                    </div>
                    <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
            @endforeach
        <div>
            {{$courses->links()}}
        </div>
    </div>
@endsection