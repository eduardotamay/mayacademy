@extends('layouts.app')
@section('title','Mi carrito')
@section('content')
    <div class="container">
        <header class="page-header page-header-no-border">
            <h1 class="h2-mycart">
                <i class="fas fa-check i-space-right"></i>
                Revisa y Confirma tu compra
            </h1>
            <div class="row justify-content-center">
                <div class="col-md-6" id="carrito-status" style="margin-top:15px;" >
                    <div style="background-color:#ddd; width:76%; margin:0 auto; height:10px; border-radius:5px;">
                    <div style="width:100%; height:10px; background-color:rgb(70, 187, 231); border-radius:5px;"></div>
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
                            <img src="{{url('img/checkout/pago.png')}}" style="width:12px; margin-top:6px; margin-left:9px; position:absolute;">
                            <svg width="30" height="30">
                                <circle cx="15" cy="15" r="15" fill="rgb(70, 187, 231)" /> 
                            </svg>
                            <br><span style="color:rgb(26, 26, 26)">Pago</span>
                        </div>
                        <div class="col-md-4 cart-payment">
                            <img src="{{url('img/checkout/confirmacion.png')}}" style="width:12px; margin-top:6px; margin-left:9px; position:absolute;">
                            <svg width="30" height="30">
                                <circle cx="15" cy="15" r="15" fill="rgb(70, 187, 231)" /> 
                            </svg>
                            <br><span style="color:rgb(26, 26, 26)">Confirmación</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        {{--  Form to payment  --}}
        <div class="row payment-form">
            {{-- form --}}
            <form>
            @csrf
                <div class="col-md-8">
                    <div class="modal" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-notify" role="document" style="margin: 0px;">
                            <!--Content-->
                            <div class="modal-content">
                                <!--Body-->
                                <div class="modal-body">
                                    <div class="box-card">
                                        <p class="text-left">Detalle de la compra</p>
                                        @foreach ($courses as $course)
                                            <div class="form-check text-left box-pagar-banco">
                                                <label class="radio-inline radio-select-payment" style="padding-left: 0">
                                                    <div class="img-metodos-de-pago-pagar" style="margin-left: 0">
                                                        <img class="img-m-pago-pagar img-fluid" src="{{url("courses/imgcourses/$course->id.$course->name.$course->extension")}}" alt="logo-santander">
                                                    </div>
                                                    <label class="form-check-label" for="banco1">
                                                        {{$course->name}}
                                                    </label><br>
                                                    <span class="text-muted texto-weigth" >Precio:${{ $course->pricing1 }}</span><br>
                                                    <span class="text-muted texto-weigth">{{ $course->description}}</span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="box-card" style="margin-top: 50px">
                                        <p class="text-left">Detalle del pago</p>
                                        {{-- @foreach ($datos_credebit as $datos)
                                            {{$datos}}
                                        @endforeach --}}
                                        {{-- Imprimir datos de la tarjeta --}}
                                        @switch($opcion_pago)
                                            @case("credito_debito")
                                                <div class="form-check text-left box-pagar-banco">
                                                    <label class="radio-inline radio-select-payment" style="padding-left: 0">
                                                        <div class="img-metodos-de-pago-pagar" style="margin-left: 0">
                                                            <img class="img-m-pago-pagar" src="{{url('img/metodos-de-pago/master-card.jpg')}}" alt="logo-metodo-de-pago">
                                                        </div>
                                                        <div class="nombre-pago-modificar">
                                                            <label class="form-check-label" for="banco1">
                                                            Tarjeta de crédito o débito
                                                            </label>
                                                            <a class="text-decoration-none" href="{{url('/mycart/checkout')}}">Modificar</a>
                                                        </div>
                                                        <span>Pagas $300.00</span><br>
                                                        <span>El curso estará disponible cuando realices el pago. No demores en pagar.</span>
                                                    </label>
                                                </div>
                                                @break
                                            @case("paypal_pago")
                                                <div class="form-check text-left box-pagar-banco">
                                                    <label class="radio-inline radio-select-payment" style="padding-left: 0">
                                                        <div class="img-metodos-de-pago-pagar" style="margin-left: 0">
                                                            <img class="img-m-pago-pagar" src="{{url('img/metodos-de-pago/paypal.png')}}" alt="logo-metodo-de-pago">
                                                        </div>
                                                        <div class="nombre-pago-modificar">
                                                            <label class="form-check-label" for="banco1">
                                                            Paypal
                                                            </label>
                                                            <a class="text-decoration-none" href="{{url('/mycart/checkout')}}">Modificar</a>
                                                        </div>
                                                        <span>Pagas $300.00</span><br>
                                                        <span>Para completar la transacción, te enviaremos a los servidores seguros de PayPal.</span>
                                                    </label>
                                                </div>
                                                @break
                                            @case("oxxo_pago")
                                                <div class="form-check text-left box-pagar-banco">
                                                    <label class="radio-inline radio-select-payment-2" style="padding-left: 0;margin-left: 0px;">
                                                        <div class="img-metodos-de-pago-pagar" style="margin-left: 0">
                                                            <img class="img-m-pago-pagar" src="{{url('img/metodos-de-pago/oxxo.png')}}" alt="logo-metodo-de-pago">
                                                        </div>
                                                        <div class="nombre-pago-modificar">
                                                            <label class="form-check-label" for="banco1">
                                                            Oxxo
                                                            </label>
                                                            <a class="text-decoration-none" href="{{url('/mycart/checkout')}}">Modificar</a>
                                                        </div><br>
                                                        <span>El curso estará disponible cuando realices el pago. No demores en pagar.</span>
                                                        <div class="opps">
                                                            <div class="opps-header">
                                                                <div class="opps-reminder">Ficha digital. No es necesario imprimir.</div>
                                                                <div class="opps-info">
                                                                    <div class="opps-brand">
                                                                        <img src="{{url('img/metodos-de-pago/oxxopay_brand.png')}}" alt="OXXOPay">
                                                                    </div>
                                                                    <div class="opps-ammount">
                                                                        <h3>Monto a pagar</h3>
                                                                        <h2>$ 230.00</sup>
                                                                        </h2>
                                                                        <p>OXXO cobrará una comisión adicional al momento de realizar el pago.</p>
                                                                    </div>
                                                                </div>
                                                                <div class="opps-reference">
                                                                    <h3>Referencia</h3>
                                                                    <h1 class="referencia-oxxo">82393749273947</h1>
                                                                </div>
                                                                <div class="opps-reference">
                                                                    <h4>Expira el:</h4>
                                                                    <h1 class="expira-oxxo">01/10/2020</h1>
                                                                </div>
                                                            </div>
                                                            <div class="opps-instructions">
                                                                <h3>Instrucciones</h3>
                                                                <ol class="lista-desordenada" >
                                                                    <li class="lista-ordenada">Acude a la tienda OXXO más cercana. <a href="https://www.google.com.mx/maps/search/oxxo/"
                                                                            target="_blank">Encuéntrala aquí</a>.</li>
                                                                    <li class="lista-ordenada">Indica en caja que quieres realizar un pago de <strong>OXXOPay</strong>.</li>
                                                                    <li class="lista-ordenada">Dicta al cajero el número de referencia en esta ficha para que tecleé directamete en la pantalla de
                                                                        venta.</li>
                                                                    <li class="lista-ordenada">Realiza el pago correspondiente con dinero en efectivo.</li>
                                                                    <li class="lista-ordenada">Al confirmar tu pago, el cajero te entregará un comprobante impreso. <strong>En el podrás verificar
                                                                            que se haya realizado correctamente.</strong> Conserva este comprobante de pago.</li>
                                                                </ol>
                                                                <div class="opps-footnote">Al completar estos pasos recibirás un correo de <strong>Autopartes Alpa S.A. de
                                                                        C.V.</strong> confirmando tu pago.</div>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                                @break
                                            @case("spei_pago")
                                                <div class="form-check text-left box-pagar-banco">
                                                    <label class="radio-inline radio-select-payment" style="padding-left: 0">
                                                        <div class="img-metodos-de-pago-pagar" style="margin-left: 0">
                                                            <img class="img-m-pago-pagar" src="{{url('img/metodos-de-pago/spei.png')}}" alt="logo-metodo-de-pago">
                                                        </div>
                                                        <div class="nombre-pago-modificar">
                                                            <label class="form-check-label" for="banco1">
                                                            Spei
                                                            </label>
                                                            <a class="text-decoration-none" href="{{url('/mycart/checkout')}}">Modificar</a>
                                                        </div>
                                                        <div class="box-spei-information">
                                                            <p class="text-left transferencia">Transferencia</p>
                                                            @switch($spei_banco)
                                                                @case("spei_santander")
                                                                    <div class="img-metodos-de-pago-pagar">
                                                                        <img class="img-m-pago-pagar" src="{{url('img/checkout/santander-mx.jpg')}}" alt="logo-banamex">
                                                                        Santander
                                                                    </div>
                                                                    @break
                                                                @case("spei_banamex")
                                                                    <div class="img-metodos-de-pago-pagar">
                                                                        <img class="img-m-pago-pagar" src="{{url('img/checkout/banamex-logo-mx.png')}}" alt="logo-banamex">
                                                                        Banamex
                                                                    </div>
                                                                    @break
                                                                @case("spei_bancommer")
                                                                    <div class="img-metodos-de-pago-pagar">
                                                                        <img class="img-m-pago-pagar" src="{{url('img/checkout/bancommer-logo.png')}}" alt="logo-banamex">
                                                                        BBVA Bancommer
                                                                    </div>
                                                                    @break
                                                            @endswitch
                                                            <div class="text-center text-muted a-nombre-de">
                                                                <p>A nombre de:</p>
                                                                <span class="nombre-sucursal" >MAYACADEMY S.A DE C.V</span>
                                                            </div>
                                                            <div class="text-left text-muted referencia">
                                                                <span>Clave: </span><span class="clave-num">9472974890290383948</span><br>
                                                                <span>Referencia:</span><span class="refe-num">203021</span>
                                                            </div>
                                                            <div class="text-left text-muted para-localizar-pago">
                                                                <small>Para localizar tu pago, es muy importante que lo hagas por la
                                                                    cantidad exacta en pesos y centavos.</small><br>
                                                                <small>Una ves realizado el pago, tardaremos 1 día hábil en validar
                                                                    el pago.</small>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                                @break   
                                        @endswitch
                                    </div>
                                </div>
                                <!--Footer-->
                                <div class="modal-footer">
                                    
                                </div>
                            </div>
                            <!--/.Content-->
                        </div>
                    </div>
                </div>
                <div class="col-md-4 resumen-payment">
                    <div class="card card-pay">
                        <div class="box-card-buy">
                            <p class="resumen" style="padding-top: 15px" >Resumen</p>
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
                                <a id="btn-confirmar-compra" style="margin-bottom: 15px" class="btn btn-info btn-lg text-white" href="#" role="button">Confirmar compra</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection