@extends('layouts.app')
@section('title', 'Crear curso')
@section('content')
    <div class="container">
        <h1>Nuevo Producto</h1>
        {{--  Form del nvo producto  --}}
        @include('courses.form',['course'=>$course,'url'=>'/courses','method'=>'POST'])
    </div>
@endsection