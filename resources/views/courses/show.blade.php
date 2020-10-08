@extends('layouts.app')
@section('title', 'detalle curso')
@section('content')
<div class="container my-custom-scrollbar-primary">
    <div class="row justify-content-center">
        <div class="col-md-6">
                <!-- Card Dark -->
            <div class="card">
                {{-- Acciones cuando es dueño del curso --}}
                @if (Auth::check() && $course->user_id == Auth::user()->id)
                    <div class="d-flex justify-content-end">
                        <a href="{{url('/courses/'.$course->id.'/edit')}}" class="btn btn-link m-0 text-capitalize text-decoration-none">Editar</a>
                        @include('courses.delete',['course'=>$course])
                    </div>
                @endif
                <!-- Card image -->
                <div class="view overlay">
                @if ($course->extension)
                  <img class="card-img-top" src="{{url("courses/imgcourses/$course->id.$course->name.$course->extension")}}" alt="Image courses">
                @endif
                <a>
                  <div class="mask rgba-white-slight"></div>
                </a>
                </div>
                <!-- Card content -->
                <div class="card-body elegant-color white-text rounded-bottom">
                <!-- Social shares button -->
                <a class="activator waves-effect mr-4"><i class="fa fa-share-alt white-text"></i></a>
                <!-- Title -->
                <h4 class="card-title">{{$course->name}}</h4>
                <hr class="hr-light">
                <!-- Text -->
                <p class="card-text white-text mb-4">{{$course->description}}</p>
                <!-- Link -->
                  @include('in_shopping_cart.form',['course'=>$course])
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-10">
            <div id="accordion">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                      <button class="btn btn-link text-decoration-none" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Introducción
                      </button>
                      <span class="text-rigth"><i class="fa fa-angle-down"></i></span>
                    </h5>
                  </div>
              
                  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed text-decoration-none" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Primeros pasos y autenticación
                      </button>
                    </h5>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed text-decoration-none" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Productos
                      </button>
                    </h5>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection