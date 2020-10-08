@extends('layouts.app');
@section('title', 'Editar curso')
@section('content')
    <div class="container">
        <h1>Editar producto</h1>
        @include('courses.form',['course'=>$course,'url'=>'/courses/'.$course->id,'method'=>'PATCH'])
    </div>
@endsection