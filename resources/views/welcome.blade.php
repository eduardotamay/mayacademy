@extends('layouts.app')
@section('title', 'Inicio')
@section('content')
    <div class="container card-course">
        {{--  CardStart  --}}
        @foreach ($courses as $course)
            <div class="col s12 m7 hoverable">
                <div class="card horizontal">
                    <div class="card-image">
                        @if ($course->extension) 
                            {{--  img 600x300 --}}
                            <img class="fadeIn img-fluid" src="{{url("courses/imgcourses/$course->id.$course->name.$course->extension")}}" alt="Image courses">
                        @endif
                    </div>
                    <div class="card-stacked black-text">
                        <div class="card-content">
                            <h1 class="card-title title-course">{{$course->name}}</h1>
                            <p class="text-left description-course">
                                {{$course->description}}
                            </p>
                            <div class="text-left name-profesordiv" title="Ver perfil del profesor">
                                <a class="name-profesor text-muted" href="{{route('teacher')}}">Por Prof. {{$course->user_id}}</a><br>
                            </div>
                        </div>
                        <div class="progress-b">
                            <p class="text-progress">Tu progreso</p>
                            <div class="progress barra-progreso" style="margin-bottom: 0px;">
                                <div class="progress-bar" role="progressbar" style="width: 1%;" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"><span>1%</span></div>
                            </div>
                        </div>
                        <div>
                            <span class="text-left text-uppercase text-bold " style="color: #E6215D;font-size:large;font-weight:bold">MX$ {{$course->pricing1}}</span>
                            <span class="text-left font-weight-ligh text-muted" style="text-through"><strike>MX${{$course->pricing2}}</strike></span>
                        </div>
                        <div class="col" style="display: inline-flex;align-items: center;">
                            <div class="card-action card-action-buy">
                                @include('in_shopping_cart.form',['course'=>$course])
                            </div>
                            <div>
                                @include('shopping_carts.formpaynow') <!--Pagar al momento-->
                            </div>
                            <div class="card-footer card-footer-recomendado text-muted text-right">
                                <i class="fas fa-users"></i> 560
                                <i class="fa fa-star star-recomended"></i> 5.0
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{--  CardEnd  --}}
        <div>
            {{$courses->links()}}
        </div>
        <div class="row row-svg">
            <p class="nuestra-plataforma">
                Nuestra plataforma se adapta a tu forma de aprender
            </p>
            <div class="col-md-4 col-card-sgv">
                <div class="card card-svg">
                    <!-- Title -->
                    <h4 class="card-title title-sgv">Aprende un nuevo idioma</h4>
                    <object class="img-fluid" alt="Responsive image" width="275px" data="{{url('/svg/studying-athome.svg')}}" type="image/svg+xml">
                        {{-- <img src="gráficoalternativo.png" alt="Imagen PNG alternativa"> --}}
                    </object>
                    <!-- Card content -->
                    <div class="card-body">
                        <!-- Text -->
                        <p class="card-text text-description-sgv text-left">
                        La lengua maya derivada del tronco mayense, 
                        que se habla principalmente en estados mexicanos peninsulares de Yucatán, 
                        Campeche y Quintana Roo.
                        </p>
                    </div>  
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-svg">
                    <!-- Title -->
                    <h4 class="card-title title-sgv">Aprende desde cualquier lugar</h4>
                    {{-- Obj --}}
                    <object class="img-fluid" width="240px" alt="Responsive image" data="{{url('/svg/studying-now.svg')}}" type="image/svg+xml">
                        {{-- <img src="gráficoalternativo.png" alt="Imagen PNG alternativa"> --}}
                    </object>
                    <!-- Card content -->
                    <div class="card-body">
                        <!-- Text -->
                        <p class="card-text text-description-sgv text-left">Una plataforma web adaptable 
                            a cualquier dispositivo para seguir aprendiendo estes donde estes.
                        </p>
                    </div>
                    
                    </div>
            </div>
            <div class="col-md-4">
                <div class="card card-svg">
                    <!-- Title -->
                    <h4 class="card-title title-sgv">Asesoría Personalizada</h4>
                    <object class="img-fluid" width="360px" alt="Responsive image" data="{{url('/svg/education-online.svg')}}" type="image/svg+xml">
                        {{-- <img src="gráficoalternativo.png" alt="Imagen PNG alternativa"> --}}
                    </object>
                    <!-- Card content -->
                    <div class="card-body">
                        <!-- Text -->
                        <p class="card-text text-description-sgv text-left">Interactúa con profesores catedráticos de la lengua maya del
                            los diferentes niveles (maya básico, intermedio y avanzado). Un lugar para
                            solucionar tus dudas.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection