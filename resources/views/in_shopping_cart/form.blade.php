{!! Form::open(['url'=>'/in_shopping_carts','method'=>'POST',"class"=>"add-to-cart inline block d-flex justify-content-end"]) !!}
    <input type="hidden" name="course_id" value="{{ $course->id }}">
    {{--  <a href="#" type="submit" class="white-text d-flex justify-content-end text-decoration-none">
        <i class="fas fa-shopping-cart fa-3x green-text pr-3" aria-hidden="true"></i>
    </a>  --}}
    <input type="submit" value="Agregar al carrito" class="btn btn-info">
{!! Form::close() !!}