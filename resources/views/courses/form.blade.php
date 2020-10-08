{!! Form::open(['url'=>$url,'method'=>$method,'files'=>true]) !!}
    <div class="form-group">
        {{ Form::label('name','', ['class' => 'control-label']) }}
        {{ Form::text('name',$course->name,['class'=>'form-control','placeholder'=>'Nombre...'])}}
    </div>
    <div class="form-group">
        {{ Form::label('pricing','', ['class' => 'control-label']) }}
        {{ Form::number('pricing',$course->pricing1,['class'=>'form-control','placeholder'=>'$0.00'])}}
    </div>
    <div class="form-group">
        {{ Form::label('description','', ['class' => 'control-label']) }}
        {{ Form::textarea('description',$course->description,['class'=>'form-control','placeholder'=>'Descripcion del curso...'])}}
    </div>
    <div class="custom-file">
        {{ Form::file('img_course')}}
    </div>
    <div class="form-group text-right">
        <a href="{{url('/courses')}}">Regresar al listado de cursos</a>
        <input type="submit" value="Agregar" class="btn btn-info">
    </div>
{!! Form::close() !!}