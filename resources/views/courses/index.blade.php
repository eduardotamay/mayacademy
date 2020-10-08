@extends('layouts.app')
@section('title', 'Lista de cursos')
@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home/')}}">Inicio</a></li>
                <li class="breadcrumb-item active">Lista de cursos</li>
            </ol>
        </nav>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Nombre</td>
                    <td>Descripción</td>
                    <td>Profesor</td>
                    <td>Precio</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr>
                        <td>{{$course->id}}</td>
                        <td>{{$course->name}}</td>
                        <td> <a class="text-decoration-none" href="{{url('/courses/'.$course->id)}}">{{$course->description}}</a></td>
                        <td>{{$course->user_id}}</td>
                        <td>{{$course->pricing1}}</td>
                        <td>
                            <a href="{{url('/courses/'.$course->id.'/edit')}}" class="text-decoration-none waves-effect btn-small light-blue accent-2
                            ">Editar</a>
                            @include('courses.delete',['course'=>$course])
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end floating">
            <a href="{{url('/courses/create')}}" class="btn btn-primary btn-fab">
                <i class="material-icons">+</i>
            </a>
        </div>
    </div>
@endsection