@extends('layouts.app')
@section('title','Mi carrito')
@section('content')
    <div class="container">
        <header class="page-header page-header-no-border">
            <h1 class="h2-mycart">
                <i class="fa fa-shopping-cart i-space-right"></i>
                Tu Carrito de compras
            </h1>
            <div class="row justify-content-center">
                <div class="col-md-6" id="carrito-status" style="margin-top:15px;" >
                    <div style="background-color:#ddd; width:76%; margin:0 auto; height:10px; border-radius:5px;">
                    <div style="width:0%; height:10px; background-color:rgb(70, 187, 231); border-radius:5px;"></div>
                    </div>
                    <div class="row" style="margin-top:-20px; color:#ddd;">
                        <div class="col-md-4 cart-payment">
                            <img src="{{url('img/checkout/carritoblanco.png')}}" style="width:20px; margin-top:5px; margin-left:5px; position:absolute;">
                            <svg width="30" height="30">
                                <circle cx="15" cy="15" r="15" fill="rgb(70, 187, 231)" /> 
                            </svg>
                            <br><span style="color:rgb(26, 26, 26)">Carrito</span>
                        </div>
                        <div class="col-md-4 cart-payment">
                            <svg width="30" height="30">
                                <circle cx="15" cy="15" r="15" fill="#ddd" />
                            </svg>
                            <br>Pago
                        </div>
                        <div class="col-md-4 cart-payment">
                            <svg width="30" height="30">
                                <circle cx="15" cy="15" r="15" fill="#ddd" />
                            </svg>
                            <br>Confirmación
                        </div>
                    </div>
                </div>
            </div>
        </header>
        @if (count($courses)>0)
            {{--  row product  --}}
            <p class="text-left text-muted">Tu carrito tiene 4 productos</p>
            <div class="row">
                <div class="col-md-8">
                @foreach ($courses as $course )
                        <!-- Editable table -->
                        <div class="text-muted flex-start box-cart-product">
                            <div class="box-img-photo-product">
                                <img class="fadeIn photo-producto img-fluid" src="{{url("courses/imgcourses/$course->id.$course->name.$course->extension")}}" alt="image product">
                            </div>
                            <div class="box-detalle-producto">
                                <p class="text-left text-bold nombre-producto">{{ $course->name }}</p>
                                <p class="text-left text-muted nombre-profesor-producto">Prof. {{ $course->user_id }}</p>
                                <p class="text-left text-bold text-uppercase text-pricing1 ">MXN {{ $course->pricing1 }}</p> <p class="text-muted text-left font-weight-ligh text-pricing2"><strike>MXN {{ $course->pricing2 }}</strike></p>
                            </div>
                            <div class="box-btn-delete">
                                <a href="#" id="{{$course->id}}" class="text-muted delete-icon text-decoration-none deleteCart"><i class="far fa-trash-alt fa-lg"></i></a>
                            </div>
                        </div>
                    <!-- Editable table -->
                @endforeach
                </div>
                <div class="col-md-4 row-col-total">
                        <div class="card card-pay">
                            <div class="box-card-buy">
                                <p style="padding-top: 15px" class="resumen">Resumen</p>
                                <div class="subtotalynum">
                                    <p class="subtotal">Subtotal </p><p class="subtotal-pesos">MX${{$subTotal}}</p>
                                </div>
                                <div class="descuento-num">
                                    <p class="descuento">Descuento </p><p class="descuento-pesos">-MX${{$discount}}</p>
                                </div>
                                <div class="total-pagar-num">
                                    <p class="tota-pagar">Total a pagar </p><p class="total-pesos">MX${{$total}}</p>
                                </div>
                                <div>
                                    <a style="margin-bottom: 15px" class="btn btn-info btn-lg text-white" href="{{url('/mycart/checkout')}}" role="button">Continuar</a>
                                    {{--  @include('shopping_carts.form')  --}}
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        @else
            <div class="cart-box">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-defoult alert-top">
                            <i class="fa fa-info-circle icon color-green"></i>
                            <h3 class="cart-empty">Tu carrito está vacío</h3>
                            <p class="info-buy-learn">
                                Sólo tienes que llenarlo y empezar a aprender con los maestros
                                <a class="text-danger text-decoration-none continue-buy-text" href="{{route('courseslist')}}">Continuar comprando
                                    <i class="fas fa-long-arrow-alt-right"></i>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col col-metodos-pago">
                <div class="text-metodo-pago">
                    <p class="text-left text-muted">Compra con todos los medios de pagos disponibles</p>
                </div>
                <div class="img-metodos-de-pago">
                    <img class="img-m-pago" src="{{url('img/metodos-de-pago/visa.png')}}" alt="Visa">
                    <img class="img-m-pago" src="{{url('img/metodos-de-pago/master-card.jpg')}}" alt="MasterCard">
                    <img class="img-m-pago" src="{{url('img/metodos-de-pago/paypal.png')}}" alt="Paypal">
                    <img class="img-m-pago" src="{{url('img/metodos-de-pago/oxxo.png')}}" alt="Oxxo">
                    <img class="img-m-pago" src="{{url('img/metodos-de-pago/spei.png')}}" alt="Spei">
                </div>
            </div>
        </div>
        <div>
            <div class="text-right mt-md-5">
                {{$courses_list->links()}}
            </div>
            @foreach ($courses_list as $course_list)
                <!-- News jumbotron -->
                    <!-- Grid row -->
                    <div class="row hoverable">
                    <!-- Grid column -->
                    <div class="col-md-4 offset-md-1 mx-3 my-3">
                        <!-- Featured image -->
                        <div class="view overlay">
                            @if ($course_list->extension)
                                {{--  img 600x300 --}}
                                <img style="display: inline-block" src="{{url("courses/imgcourses/$course_list->id.$course_list->name.$course_list->extension")}}" class="img-fluid" alt="Sample image for first version of blog listing">
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
                        <h4 class="h4 mb-4 text-muted">{{$course_list->name}}</h4>
                        <p class="font-weight-normal text-muted">{{$course_list->description}}</p>
                        <p class="font-weight-normal text-muted">Impartido por <a class="text-muted" href="{{route('teacher')}}"><strong>Prof. {{$course_list->user_id}}</strong></a>, actualizado  19/08/2020</p>
                        @include('shopping_carts.formpaynow') <!--Pagar al momento-->
                        <div class="card-footer card-footer-recomendado text-muted text-right">
                            <div>
                                <span class="text-left text-uppercase text-bold " style="color: #E6215D;font-size:large;font-weight:bold">MX$ {{$course_list->pricing1}}</span>
                            <span class="text-left font-weight-ligh text-muted" style="text-through"><strike>MX${{$course_list->pricing2}}</strike></span>
                            </div>
                            <div>
                                <span class="text-recomendado">Recomendado</span>
                                <i class="fa fa-star star-recomended"></i>
                                <i class="fa fa-star star-recomended"></i>
                                <i class="fa fa-star star-recomended"></i>
                                <i class="fa fa-star star-recomended"></i>
                                <i class="fa fa-star-half star-recomended"></i>
                            </div>
                        </div>
                    </div>
                    <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
            @endforeach
        </div>
    </div>
@endsection