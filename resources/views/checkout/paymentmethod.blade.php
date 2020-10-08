@extends('layouts.app')
@section('title','Mi carrito')
@section('content')
    <div class="container">
        <header class="page-header page-header-no-border">
            <h1 class="h2-mycart">
                <i class="fas fa-dollar-sign i-space-right"></i>
                Selecciona el método de pago
            </h1>
            <div class="row justify-content-center">
                <div class="col-md-6" id="carrito-status" style="margin-top:15px;" >
                    <div style="background-color:#ddd; width:76%; margin:0 auto; height:10px; border-radius:5px;">
                    <div style="width:50%; height:10px; background-color:rgb(70, 187, 231); border-radius:5px;"></div>
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
                            <svg width="30" height="30">
                                <circle cx="15" cy="15" r="15" fill="#ddd" />
                            </svg>
                            <br>Confirmación
                        </div>
                    </div>
                </div>
            </div>
        </header>
        {{--  Form to payment  --}}
        <div class="row payment-form">
            {{-- form --}}
            <form action="{{route('confirmation')}}" method="POST">
            @csrf
                <div class="col-md-8">
                    <div class="modal" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-notify" role="document">
                            <!--Content-->
                            <div class="modal-content">
                                <!--Body-->
                                <div class="modal-body">
                                    <div class="md-form">
                                        <p class="text-left text-muted text-bold" >Pais</p>
                                        <select class="form-control custom-select select-country" name="selecciona_ciudad" searchable="Search here..">
                                            <option value="" disabled="">Selecciona...</option><option value="AF">Afganistán</option><option value="AL">Albania</option><option value="DE">Alemania</option><option value="AD">Andorra</option><option value="AO">Angola</option><option value="AI">Anguila</option><option value="AQ">Antártida</option>
                                            <option value="AG">Antigua y Barbuda</option><option value="SA">Arabia Saudí</option><option value="DZ">Argelia</option><option value="AR">Argentina</option><option value="AM">Armenia</option><option value="AW">Aruba</option><option value="AU">Australia</option><option value="AT">Austria</option><option value="AZ">Azerbaiyán</option><option value="BS">Bahamas</option><option value="BD">Bangladés</option>
                                            <option value="BB">Barbados</option><option value="BH">Baréin</option><option value="BE">Bélgica</option><option value="BZ">Belice</option><option value="BJ">Benín</option><option value="BM">Bermuda</option><option value="BY">Bielorrusia</option><option value="MM">Birmania</option><option value="BO">Bolivia</option><option value="BQ">Bonaire</option><option value="BA">Bosnia y Herzegovina</option>
                                            <option value="BW">Botsuana</option><option value="BR">Brasil</option><option value="BN">Brunéi</option><option value="BG">Bulgaria</option><option value="BF">Burkina Faso</option><option value="BI">Burundi</option><option value="BT">Bután</option><option value="CV">Cabo Verde</option><option value="KH">Camboya</option><option value="CM">Camerún</option><option value="CA">Canadá</option><option value="QA">Catar</option>
                                            <option value="TD">Chad</option><option value="CL">Chile</option><option value="CN">China</option><option value="CY">Chipre</option>
                                            <option value="VA">Ciudad del Vaticano</option><option value="CO">Colombia</option><option value="KM">Comoras</option><option value="CG">Congo</option><option value="KR">Corea del Sur</option><option value="CI">Costa de Marfil</option><option value="CR">Costa Rica</option><option value="HR">Croacia</option><option value="CW">Curazao</option><option value="DK">Dinamarca</option><option value="DM">Dominica</option>
                                            <option value="EC">Ecuador</option><option value="EG">Egipto</option><option value="SV">El Salvador</option><option value="AE">Emiratos Árabes Unidos</option><option value="ER">Eritrea</option><option value="SK">Eslovaquia</option><option value="SI">Eslovenia</option><option value="ES">España</option><option value="US">Estados Unidos</option>
                                            <option value="EE">Estonia</option><option value="ET">Etiopía</option><option value="PH">Filipinas</option><option value="FI">Finlandia</option><option value="FJ">Fiyi</option><option value="FR">Francia</option><option value="GA">Gabón</option><option value="GM">Gambia</option><option value="GE">Georgia</option><option value="GH">Ghana</option><option value="GI">Gibraltar</option><option value="GD">Granada</option><option value="GR">Grecia</option><option value="GL">Groenlandia</option><option value="GP">Guadalupe</option>
                                            <option value="GU">Guam</option><option value="GT">Guatemala</option><option value="GF">Guayana Francesa</option><option value="GG">Guernsey</option><option value="GN">Guinea</option><option value="GQ">Guinea Ecuatorial</option><option value="GW">Guinea-Bisáu</option><option value="GY">Guyana</option><option value="HT">Haití</option><option value="NL">Holanda</option><option value="HN">Honduras</option><option value="HK">Hong Kong</option><option value="HU">Hungría</option><option value="ID">Indonesia</option><option value="IQ">Irak</option><option value="IE">Irlanda</option><option value="BV">Isla Bouvet</option><option value="IM">Isla de Man</option><option value="NF">Isla Norfolk</option>
                                            <option value="IS">Islandia</option><option value="AX">Islas Åland</option><option value="KY">Islas Caimán</option><option value="CC">Islas Cocos</option><option value="CK">Islas Cook</option><option value="FO">Islas Feroe</option><option value="GS">Islas Georgias del Sur y Sandwich del Sur</option><option value="HM">Islas Heard y McDonald</option><option value="FK">Islas Malvinas</option><option value="MP">Islas Marianas del Norte</option><option value="MH">Islas Marshall</option><option value="PN">Islas Pitcairn</option><option value="SB">Islas Salomón</option><option value="TC">Islas Turcas y Caicos</option><option value="UM">Islas Ultramarinas de Estados Unidos</option><option value="VG">Islas Vírgenes Británicas</option>
                                            <option value="VI">Islas Vírgenes de los Estados Unidos</option><option value="IL">Israel</option><option value="IT">Italia</option><option value="JM">Jamaica</option><option value="JP">Japón</option><option value="JE">Jersey</option><option value="JO">Jordania</option><option value="KZ">Kazajistán</option><option value="KE">Kenia</option><option value="KG">Kirguistán</option><option value="KI">Kiribati</option><option value="CX">Kiritimati</option><option value="XK">Kósovo</option><option value="KW">Kuwait</option><option value="LA">Laos</option><option value="LS">Lesoto</option>
                                            <option value="LV">Letonia</option><option value="LB">Líbano</option><option value="LR">Liberia</option><option value="LY">Libia</option><option value="LI">Liechtenstein</option><option value="LT">Lituania</option><option value="LU">Luxemburgo</option><option value="MO">Macao</option><option value="MK">Macedonia</option><option value="MG">Madagascar</option>
                                            <option value="MY">Malasia</option><option value="MW">Malaui</option><option value="MV">Maldivas</option><option value="ML">Mali</option><option value="MT">Malta</option><option value="MA">Marruecos</option><option value="MQ">Martinica</option><option value="MU">Mauricio</option><option value="MR">Mauritania</option><option value="YT">Mayotte</option><option value="MX">México</option><option value="FM">Micronesia</option><option value="MD">Moldavia</option><option value="MC">Mónaco</option><option value="MN">Mongolia</option><option value="ME">Montenegro</option><option value="MS">Montserrat</option>
                                            <option value="MZ">Mozambique</option><option value="NA">Namibia</option><option value="NR">Nauru</option><option value="NP">Nepal</option><option value="NI">Nicaragua</option><option value="NE">Níger</option><option value="NG">Nigeria</option><option value="NU">Niue</option><option value="NO">Noruega</option><option value="NC">Nueva Caledonia</option><option value="NZ">Nueva Zelanda</option><option value="OM">Omán</option><option value="PK">Pakistán</option><option value="PW">Palaos</option><option value="PA">Panamá</option><option value="PG">Papúa Nueva Guinea</option>
                                            <option value="PY">Paraguay</option><option value="PE">Perú</option><option value="PF">Polinesia Francesa</option><option value="PL">Polonia</option><option value="PT">Portugal</option><option value="PR">Puerto Rico</option><option value="GB">Reino Unido</option><option value="CF">República Centroafricana</option><option value="CZ">República Checa</option><option value="CD">República Democrática del Congo</option><option value="DO">República Dominicana</option><option value="RE">Reunión</option><option value="RW">Ruanda</option><option value="RO">Rumanía</option><option value="RU">Rusia</option><option value="EH">Sahara Occidental</option><option value="WS">Samoa</option><option value="AS">Samoa Americana</option>
                                            <option value="BL">San Bartolomé</option><option value="KN">San Cristobal y Nieves</option><option value="SM">San Marino</option><option value="MF">San Martín</option><option value="PM">San Pedro y Miquelón</option><option value="VC">San Vicente y las Granadinas</option><option value="SH">Santa Elena</option><option value="LC">Santa Lucía</option><option value="ST">Santo Tomé y Príncipe</option><option value="SN">Senegal</option><option value="RS">Serbia</option><option value="SC">Seychelles</option>
                                            <option value="SL">Sierra Leona</option><option value="SG">Singapur</option><option value="SX">Sint Maarten</option><option value="SO">Somalia</option><option value="LK">Sri Lanka</option><option value="SZ">Suazilandia</option><option value="ZA">Sudáfrica</option>
                                            <option value="SS">Sudán del Sur</option><option value="SE">Suecia</option><option value="CH">Suiza</option><option value="SR">Surinam</option><option value="SJ">Svalbard y Jan Mayen</option><option value="TH">Tailandia</option><option value="TW">Taiwán</option><option value="TZ">Tanzania</option><option value="TJ">Tayikistán</option><option value="IO">Territorio Británico del Océano Índico</option><option value="TF">Territorios Australes Franceses</option><option value="PS">Territorios Palestinos</option><option value="TL">Timor Oriental</option><option value="TG">Togo</option><option value="TK">Tokelau</option><option value="TO">Tonga</option><option value="TT">Trinidad y Tobago</option>
                                            <option value="TN">Túnez</option><option value="TM">Turkmenistán</option><option value="TR">Turquía</option><option value="TV">Tuvalu</option><option value="UA">Ucrania</option>
                                            <option value="UG">Uganda</option><option value="UY">Uruguay</option><option value="UZ">Uzbekistán</option><option value="VU">Vanuatu</option><option value="VE">Venezuela</option><option value="VN">Vietnam</option><option value="WF">Wallis y Futuna</option><option value="YE">Yemen</option><option value="DJ">Yibuti</option><option value="ZM">Zambia</option><option value="ZW">Zimbabue</option>
                                        </select>
                                    </div>
                                    <fieldset class="form-group">
                                        <div class="row justify-content-start">
                                            <div class="form-check text-left box-pagar-input">
                                                <label class="radio-inline radio-select-payment">
                                                    <input class="form-check-input input-pago" type="radio" name="opcion_de_pago" 
                                                    id="gridRadios1" value="credito_debito" checked>
                                                    <label class="form-check-label" for="gridRadios1">
                                                    Tarjeta de crédito o débito
                                                    </label>
                                                    <div class="img-metodos-de-pago-pagar">
                                                        <img class="img-m-pago-pagar" src="{{url('img/metodos-de-pago/visa.png')}}" alt="Visa">
                                                        <img class="img-m-pago-pagar" src="{{url('img/metodos-de-pago/master-card.jpg')}}" alt="MasterCard">
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="form-check text-left box-pagar-input">
                                                <label class="radio-inline radio-select-payment">
                                                    <input class="form-check-input input-pago" type="radio" name="opcion_de_pago" 
                                                    id="gridRadios2" value="paypal_pago">
                                                    <label class="form-check-label" for="gridRadios2">
                                                    Paypal
                                                    </label>
                                                    <div class="img-metodos-de-pago-pagar">
                                                        <img class="img-m-pago-pagar" src="{{url('img/metodos-de-pago/paypal.png')}}" alt="Paypal">
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="form-check text-left box-pagar-input">
                                                <label class="radio-inline radio-select-payment">
                                                    <input class="form-check-input input-pago" type="radio" name="opcion_de_pago" 
                                                        id="gridRadios3" value="oxxo_pago">
                                                    <label class="form-check-label" for="gridRadios3">
                                                    Tiendas Oxxo
                                                    </label>
                                                    <div class="img-metodos-de-pago-pagar">
                                                        <img class="img-m-pago-pagar" src="{{url('img/metodos-de-pago/oxxo.png')}}" alt="Oxxo">
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="form-check text-left box-pagar-input">
                                                <label class="radio-inline radio-select-payment">
                                                    <input class="form-check-input input-pago" type="radio" name="opcion_de_pago" 
                                                        id="gridRadios4" value="spei_pago">
                                                    <label class="form-check-label" for="gridRadios4">
                                                    Transferencia Electrónica
                                                    </label>
                                                    <div class="img-metodos-de-pago-pagar">
                                                        <img class="img-m-pago-pagar" src="{{url('img/metodos-de-pago/spei.png')}}" alt="Spei">
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div id="box-creditdebi">
                                        <div class="box-card">
                                            <div class=" form-group md-form name-person">
                                                <input type="text" class="form-control name-person" name="nombre_en_tarjeta" id="name-person">
                                                <label id="name-person" class="name-person" for="name-person">Nombre en la tarjeta</label>
                                            </div>
                                            <div class="form-group md-form number-card">
                                                <input type="text" class="form-control number-card" name="num_tarjeta" id="number-card">
                                                <label id="number-card" class="number-card" for="number-card">Número de tarjeta</label>
                                            </div>
                                            <div class=" form-group month-year-valid">
                                                <span class="fecha-valida-month">MM /</span><span class="fecha-valida-year">YYYY</span>
                                            </div>
                                            <div class="form-group month-year-cvc">
                                                <div class="month-card">
                                                    <select class="form-control custom-select" name="mes_tarjeta" searchable="Search here..">
                                                        <option value="" disabled selected>MM</option>
                                                        <option value="01">01</option>
                                                        <option value="02">02</option>
                                                        <option value="03">03</option>
                                                        <option value="04">04</option>
                                                        <option value="05">05</option>
                                                        <option value="06">06</option>
                                                        <option value="07">07</option>
                                                        <option value="08">08</option>
                                                        <option value="09">09</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                    </select>
                                                </div>
                                                <div class="year-card">
                                                    <select class="form-control custom-select" name="anio_tarjeta" searchable="Search here..">
                                                        <option value="" disabled selected>AAAA</option>
                                                        <option value="2021">2021</option>
                                                        <option value="2022">2022</option>
                                                        <option value="2023">2023</option>
                                                        <option value="2024">2024</option>
                                                        <option value="2025">2025</option>
                                                        <option value="2026">2026</option>
                                                        <option value="2027">2027</option>
                                                        <option value="2028">2028</option>
                                                        <option value="2029">2029</option>
                                                        <option value="2030">2030</option>
                                                        <option value="2031">2031</option>
                                                        <option value="2032">2032</option>
                                                        <option value="2033">2033</option>
                                                        <option value="2034">2034</option>
                                                        <option value="2035">2035</option>
                                                        <option value="2036">2036</option>
                                                        <option value="2037">2037</option>
                                                        <option value="2038">2038</option>
                                                        <option value="2039">2039</option>
                                                        <option value="2040">2040</option>
                                                        <option value="2041">2041</option>
                                                        <option value="2042">2042</option>
                                                        <option value="2043">2043</option>
                                                        <option value="2044">2044</option>
                                                        <option value="2045">2045</option>
                                                    </select>
                                                </div>
                                                <div class="md-form cvc-card">
                                                    <input class="cvc" type="text" class="form-control" name="cvc" id="cvc">
                                                    <label class="cvc" for="cvc">CVC</label>
                                                </div>
                                            </div>
                                            <div class="form-group security-card">
                                                <span class="fecha-valida text-muted">Introduce la fecha de vencimiento válida</span>
                                                <span id="cvc-secu" data-toggle="tooltip" data-placement="top" title="Tres dígitos al reverso">
                                                    <i class="far fa-question-circle"></i>
                                                    <img src="{{url('img/checkout/security_code.svg')}}" alt="Ejemplo CVC" width="40px">
                                                </span>
                                            </div>
                                            <div class="row recordar-conexsecu">
                                                <div>
                                                    <input type="checkbox" aria-label="Checkbox for following text input">
                                                    <span>Recordar esta tarjeta</span>
                                                </div>
                                                <div>
                                                    <i class="fas fa-lock fa-lg"></i>
                                                    <span>Conexión</span> <span>segura</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="box-paypal" style="display: none">
                                        <div class="box-card">
                                            <div class="text-left">
                                                <p class="text-left">Para completar la transacción, te enviaremos a los servidores seguros de PayPal.</p>
                                            </div>
                                            <div class="text-right">
                                                <i class="fas fa-lock fa-lg"></i>
                                                <span>Conexión</span> <span>segura</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="box-oxxo" style="display: none">
                                        <p class="text-left">Llena este formulario para generar su ficha de pago</p>
                                        <div class="box-card">
                                            <div class="form-group md-form name-person">
                                                <input type="text" class="form-control name-person" name="nom_completo" id="name-full">
                                                <label id="name-full" class="name-full" for="name-full">Nombre Completo</label>
                                            </div>
                                            <div class="form-group md-form name-person">
                                                <input type="email" class="form-control name-person" name="email" id="email">
                                                <label id="email" class="email" for="email">Email</label>
                                            </div>
                                            <div class="form-group md-form name-person">
                                                <input type="text" class="form-control name-person" name="telefono" id="number-phone">
                                                <label id="number-phone" class="number-phone" for="number-phone">Número de teléfono</label>
                                            </div>
                                            <div class="text-left" style="margin-bottom: 5px">
                                                <span class="fecha-valida-month">Dirección</span>
                                            </div>
                                            <div class="form-group md-form name-person">
                                                <input type="text" class="form-control name-person" name="cp" id="cp">
                                                <label id="cp" class="cp" for="cp">Código Postal</label>
                                            </div>
                                            <div class="form-group md-form name-person">
                                                <input type="text" class="form-control name-person" name="pais" id="country">
                                                <label id="country" class="country" for="country">Pais</label>
                                            </div>
                                            <div class="form-group md-form name-person">
                                                <input type="text" class="form-control name-person" name="ciudad" id="city">
                                                <label id="city" class="city" for="city">Ciudad</label>
                                            </div>
                                            <div class="form-group md-form name-person">
                                                <input type="text" class="form-control name-person" name="stado" id="state">
                                                <label id="state" class="state" for="state">Estado</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="box-spei" style="display: none">
                                        <div class="box-card">
                                                <div class="form-check text-left box-pagar-banco">
                                                    <label class="radio-inline radio-select-payment">
                                                        <input class="form-check-input" type="radio" name="spei_banco" id="banco1" value="spei_santander">
                                                        <div class="img-metodos-de-pago-pagar">
                                                            <img class="img-m-pago-pagar" src="{{url('img/checkout/san-logo.png')}}" alt="logo-santander">
                                                        </div>
                                                        <label class="form-check-label" for="banco1">
                                                        Santander
                                                        </label>
                                                    </label>
                                                </div>
                                                <div class="form-check text-left box-pagar-banco">
                                                    <label class="radio-inline radio-select-payment">
                                                        <input class="form-check-input" type="radio" name="spei_banco" id="banco2" value="spei_banamex">
                                                        <div class="img-metodos-de-pago-pagar">
                                                            <img class="img-m-pago-pagar" src="{{url('img/checkout/banamex-logo-mx.png')}}" alt="logo-banamex">
                                                        </div>
                                                        <label class="form-check-label" for="banco2">
                                                            Citibanamex
                                                        </label>
                                                    </label>
                                                </div>
                                                <div class="form-check text-left box-pagar-banco">
                                                    <label class="radio-inline radio-select-payment">
                                                        <input class="form-check-input" type="radio" name="spei_banco" id="banco3" value="spei_bancommer">
                                                        <div class="img-metodos-de-pago-pagar">
                                                            <img class="img-m-pago-pagar" src="{{url('img/checkout/bancommer-logo.png')}}" alt="logo-bancommer">
                                                        </div>
                                                        <label class="form-check-label" for="banco3">
                                                            BBVA Bancommer
                                                        </label>
                                                    </label>
                                                </div>
                                        </div>
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
                                <p class="subtotal">Total en carrito </p><p class="subtotal-pesos">MX${{$subTotal}}</p>
                            </div>
                            <div class="descuento-num">
                                <p class="descuento">Descuento </p><p class="descuento-pesos">-MX${{$discount}}</p>
                            </div>
                            <div class="total-pagar-num">
                                <p class="tota-pagar">Total a pagar </p><p class="total-pesos">MX${{$total}}</p>
                            </div>
                            <div>
                                <button style="margin-bottom: 15px" class="btn btn-info btn-lg text-white" type="submit">Continuar</button>
                                {{--  @include('shopping_carts.form')  --}}
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection