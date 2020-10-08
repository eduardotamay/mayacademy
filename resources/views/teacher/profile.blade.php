@extends('layouts.app')
@section('title', 'Perfil profesor')
@section('content')
    <header class="header">
        <div class="container">
        <div class="teacher-name black-text">
            <div class="row row-header">
                <div class="col-sm-9">
                    <h2 class="name-teacher-h2"><strong>JOSÉ EDUARDO</strong></h2>
                </div>
                <div class="col-sm-3">
                    @auth
                        <div class="button pull-right">
                            <a href="#" class="btn edit-profile">Editar perfil <i class="fa fa-pencil"></i></a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
        <div class="row row-section" style="margin-top:20px;">
            <div class="col-sm-3"> 
            <a href="#"> <img class="rounded-circle photo-profile" src="{{url('/img/photo.jpeg')}}" alt="Teacher Profile" ></a>
            </div>

            <div class="col-sm-6 black-text"> 
            <h5 class="title-h5">Associate Professor, <small>Dept. of Alien Agriculture, Jaarvlar-3 University</small></h5>
            <p>PhD on Molecular Shwanky Physics</p>
            <p>Dirección: 123 Cuba str Tampa, Fl, Earth 137</p>
            </div>

            <div class="col-sm-3 text-center social black-text">
            <span class="number">Teléfono:<strong>+0001732226402</strong></span>
            <div class="button-email">
                <a class="btn btn-block email-button"><i class="fa fa-envelope-o"></i><span class="email-teacher">eduardo.dev@gmail.com</span></a>
            </div>
            <div class="social-icons">
                    <a href="#">
                    <span class="fa-stack">
                    <i class="fa fa-stack-2x" ></i>
                    <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                    </span></a>
                    <a href="#">
                    <span class="fa-stack">
                    <i class="fa fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                    </span></a>
                    <a href="#">
                    <span class="fa-stack">
                    <i class="fa fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                    </span></a>
                    </a>
            </div>
            </div>
        </div>
        </div>
    </header>
    <div class="container black-text">
        <div class="row row-container">
            <div class="title-recomendacion">
                <!-- Title -->
                <h2 class="title-teacher text-left">Escribir una recomendación</h2>
                <div class="subtitle-teacher text-left">
                    a JOSÉ para que gane confianza entre sus alumnos
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-consejo">
                    <!-- Card content -->
                    <div class="card-body">
                    <!-- Text -->
                    <p class="card-text text-description text-left">
                        MAYACADEMY se basa en la confianza y la reputación. 
                        Es por ello que con estar ecomendación, estás validando 
                        a JOSÉ con otros miembros de la comunidad MAYACADEMY.
                    </p>
                    <div class="consejos">
                        <h4 class="text-left">Consejos para una recomendación útil</h4>
                        <ul class="text-left">
                            <li>¿Cómo es su forma de enseñanza?</li>
                            <li>¿Le pone empatía a lo que enseña?</li>
                            <li>¿Genera confianza?</li>
                            <li>Tiene pasión por lo que hace</li>
                        </ul>
                    </div>
                    </div>  
                </div>
            </div>
            <div class="col-md-5 form-recomendation form-group green-border-focus">
                <form action="">
                    <div class="form-group">
                        <label class="text-left" for="Textarea">Explica por qué piensas que JOSÉ es un maestro digno de confianza:</label> <br>
                        <p class="text-right text-areaP"><textarea class="textarea-explication form-control" name="explication" cols="33" rows="10"></textarea><br></p>
                        <p class="text-right"><button class="align-text-middle btn button-send align-middle" type="submit"><span class="align-text-middle">Enviar</span> <i class="fa fa-paper-plane"></i></button></p>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="title-recomendacion">
                <h2 class="title-teacher text-left">Las últimas recomendaciones</h2>   
            </div>
            <section class="main-box-comments">
                <article class="main-box-comment">
                    <div class="card-body card-consejo">
                        <div class="box-image-perfil-comment">
                            <img class="image-perfil-comment" src="http://wpdemo.thememodern.com/construction/wp-content/uploads/sites/3/2017/03/2-2-1.jpg" alt="photo profesor">
                        </div>
                        <div class="box-comment">
                            <p class="text-comment">Vestibulum eu libero volutpat, portas quam acc, tempus sem. Donec sodales quam id lorem lobortis, vitae interdum nisl vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam suscipit, elit quis facilisis dictum, diam justo volutpat dui.</p>
                        </div>
                        <div class="box-date-comment">
                            <h3 class="name-comment">Name profesor</h3>
                            <p class="profession-comment">Name profession</p>
                        </div>
                    </div>
                </article>
                <article class="main-box-comment">
                    <div class="card-body card-consejo">
                        <div class="box-image-perfil-comment">
                            <img class="image-perfil-comment" src="http://wpdemo.thememodern.com/construction/wp-content/uploads/sites/3/2017/03/3-2-1.jpg" alt="">
                        </div>
                        <div class="box-comment">
                            <p class="text-comment">Vestibulum eu libero volutpat, portas quam acc, tempus sem. Donec sodales quam id lorem lobortis, vitae interdum nisl vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam suscipit, elit quis facilisis dictum, diam justo volutpat dui.</p>
                        </div>
                        <div class="box-date-comment">
                            <h3 class="name-comment">Name profesor</h3>
                            <p class="profession-comment">Name profession</p>
                        </div>
                    </div>
                </article>
                <article class="main-box-comment">
                    <div class="card-body card-consejo">
                        <div class="box-image-perfil-comment">
                            <img class="image-perfil-comment" src="http://wpdemo.thememodern.com/construction/wp-content/uploads/sites/3/2017/03/1-2-1.jpg" alt="">
                        </div>
                        <div class="box-comment">
                            <p class="text-comment">Vestibulum eu libero volutpat, portas quam acc, tempus sem. Donec sodales quam id lorem lobortis, vitae interdum nisl vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam suscipit, elit quis facilisis dictum, diam justo volutpat dui.</p>
                        </div>
                        <div class="box-date-comment">
                            <h3 class="name-comment">Name profesor</h3>
                            <p class="profession-comment">Name profession</p>
                        </div>
                    </div>
                </article>
            </section>
        </div>
    </div>
@endsection