@extends('layouts.app')
@section('title','Mi carrito')
@section('content')
    <div class="big-padding text-center blue-grey white-text">
        <h1>Felicidades la compra ha sido realizada</h1>
    </div>
    <div class="container">
        <div class="card large-padding">
            <h1>Tu compra fue procesado <span class="{{$order->status}}">{{$order->status}}</span></h1>
            <p>Corrobara los datos de tu compra</p>
            <div class="row">   
                <div class="col-xl-6">Correo</div>
                <div class="col-xl-6">{{$order->email}}</div>
            </div>
            <div class="row">   
                <div class="col-xl-6">Direccion</div>
                <div class="col-xl-6">{{$order->address()}}</div>
            </div>
            <div class="row">   
                <div class="col-xl-6">Código Postal</div>
                <div class="col-xl-6">{{$order->postal_code}}</div>
            </div>
            <div class="row">   
                <div class="col-xl-6">Ciudad</div>
                <div class="col-xl-6">{{$order->city}}</div>
            </div>
            <div class="row">   
                <div class="col-xl-6">Estado y pais</div>
                <div class="col-xl-6">{{"$order->state $order->country_code"}}</div>
            </div>
            <div class="text-center">
                <a href="{{url('/buy/'.$shopping_cart->customid)}}">Link Permanente de tu compra</a>
            </div>
        </div>
    </div>
@endsection