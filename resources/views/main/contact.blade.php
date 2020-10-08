@extends('layouts.app')
@section('title', 'Contacto')
@section('content')
    <div class="container contact-card">
        <section class="mb-4 text-black contact-section">
            <!--Section heading-->
            <h2 class="contact-use h1-responsive font-weight-bold black-text text-center my-4">Contáctanos</h2>
            <!--Section description-->
            <p class="text-center w-responsive mx-auto mb-5 indication-form">Tienes alguna pregunta?
                Por favor, no olvides rellenar este formulario. En breve resolveremos tu questión.
            </p>
            <div class="row">
                <!--Grid column-->
                <div class="col-md-9 mb-md-0 mb-5">
                    <form id="contact-form" name="contact-form" action="mail.php" method="POST">
        
                        <!--Grid row-->
                        <div class="row">
        
                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="name" name="name" class="form-control">
                                    <label class="label-contact" for="name" class="">Tu nombre</label>
                                </div>
                            </div>
                            <!--Grid column-->
        
                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="email" name="email" class="form-control">
                                    <label class="label-contact" for="email" class="">Tu correo</label>
                                </div>
                            </div>
                            <!--Grid column-->
        
                        </div>
                        <!--Grid row-->
        
                        <!--Grid row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form mb-0">
                                    <input type="text" id="subject" name="subject" class="form-control">
                                    <label class="label-contact" for="subject" class="">Asunto</label>
                                </div>
                            </div>
                        </div>
                        <!--Grid row-->
                        <!--Grid row-->
                        <div class="row">
                            <!--Grid column-->
                            <div class="col-md-12">
                                <div class="md-form">
                                    <textarea type="text" id="message" name="message" rows="4" class="form-control md-textarea"></textarea>
                                    <label class="muted-text label-contact" for="message">Tu mensaje</label>
                                </div>
                            </div>
                        </div>
                        <!--Grid row-->
        
                    </form>
        
                    <div class="text-center text-md-left">
                        <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Send</a>
                    </div>
                    <div class="status"></div>
                </div>
                <!--Grid column-->
        
                <!--Grid column-->
                <div class="col-md-3 text-center">
                    <ul class="list-unstyled mb-0 black-text">
                        <li><i class="fas fa-location-arrow mt-4 fa-2x"></i>
                            <p>Felipe Carrillo Puerto, QRoo, Mex.</p>
                        </li>
                        <li><i class="fa fa-phone mt-4 fa-2x"></i>
                            <p>+52 983-106-54-09</p>
                        </li>
                        <li><i class="fa fa-envelope mt-4 fa-2x"></i>
                            <p>info@mayacademy.com</p>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->
            </div>
            <!--Google map-->
            <div class="card-location-maps">
                <div class="row row-location">
                    <iframe class="z-depth-1-half map-container-section mb-4 maps-location" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14976.73924336073!2d-87.48063071303135!3d20.209639919867378!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f4fd40310e42a4b%3A0xeedc0db93ff9ab7!2sTulum%2C%20Q.R.!5e0!3m2!1ses!2smx!4v1599923034517!5m2!1ses!2smx" 
                    width="600" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </section>
    </div>
@endsection
