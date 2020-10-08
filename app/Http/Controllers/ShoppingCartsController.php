<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\ShoppingCart;
use App\PayPal;
use App\Order;
use App\Course;



class ShoppingCartsController extends Controller
{

    public function __construct()
    {
        $this->middleware("shoppingcart");
    }

    public function show($id)
    {
        $shopping_cart = ShoppingCart::where('customid',$id)->first();

        $order = $shopping_cart->order();

        return view("shopping_carts.completed",["shopping_cart"=>$shopping_cart,"order"=>$order]);
    }

    public function checkout(Request $request) //Payment-method
    {
        $shopping_cart = $request->shopping_cart;
        // [[ -Me lleva a crear un nuevo orden con Paypal-]]
        $paypal = new PayPal($shopping_cart);

        $payment = $paypal->generate();

        return redirect($payment->getApprovalLink());
    }

    //
    public function index(Request $request)
    {

        // $Actualizar correo electrónico
        // $order = Order::all()->last();
        // $order->sendUpdatedMail();

        $shopping_cart = $request->shopping_cart;

        $courses = $shopping_cart->courses()->get();

        $courses_list = Course::latest()->simplePaginate(3);

        $total = $shopping_cart->total();

        $subTotal = $shopping_cart->subTotal();

        $discount = $shopping_cart->discount();

        return view("shopping_carts.index",["courses"=>$courses,"total"=>$total,"subTotal"=>$subTotal,"discount"=>$discount,"courses_list"=>$courses_list]);
    }

    public function paymentmethod(Request $request)
    {
        $shopping_cart = $request->shopping_cart;

        // $courses = $shopping_cart->courses()->get();

        // $courses_list = Course::latest()->simplePaginate(3);

        $total = $shopping_cart->total();

        $subTotal = $shopping_cart->subTotal();

        $discount = $shopping_cart->discount();

        return view("checkout\paymentmethod",["total"=>$total,"subTotal"=>$subTotal,"discount"=>$discount]);
    }

    public function paymentConfirmation(Request $request)
    {
        $opcion_pago = $request->opcion_de_pago;
        $selecciona_ciudad = $request->selecciona_ciudad;
        $shopping_cart = $request->shopping_cart;
        $courses = $shopping_cart->courses()->get();
        $total = $shopping_cart->total();
        $subTotal = $shopping_cart->subTotal();
        $discount = $shopping_cart->discount();

        if ($opcion_pago==="credito_debito") {
            $nom_en_tar = ['nombre_en_tarjeta'=>$request->nombre_en_tarjeta];
            $num_tar = ['num_tarjeta'=>$request->num_tarjeta];
            $mes_tar = ['mes_tarjeta'=>$request->mes_tarjeta];
            $anio_tar = ['anio_tarjeta'=>$request->anio_tarjeta];
            $cvc_tar = ['cvc_tarjeta'=>$request->cvc];
            $datos_credebit = Arr::collapse([$nom_en_tar,$num_tar,$mes_tar,$anio_tar,$cvc_tar]);
            return view("checkout\paymentconfirmation",["courses"=>$courses,"total"=>$total,
                                                        "subTotal"=>$subTotal,"discount"=>$discount,
                                                        "datos_credebit"=>$datos_credebit,
                                                        "opcion_pago"=>$opcion_pago]);
        }elseif($opcion_pago==="paypal_pago"){
            return view("checkout\paymentconfirmation",["courses"=>$courses,"total"=>$total,
                                                        "subTotal"=>$subTotal,"discount"=>$discount,
                                                        "opcion_pago"=>$opcion_pago]);
        }elseif($opcion_pago==="oxxo_pago"){
            $nom_com = ['nombre'=>$request->nom_completo];
            $email = ['email'=>$request->email];
            $tel = ['tel'=>$request->telefono];
            $cp = ['cp'=>$request->cp];
            $pais = ['pais'=>$request->pais];
            $ciudad = ['ciudad'=>$request->ciudad];
            $estado = ['estado'=>$request->estado];
            $datos_oxxo = Arr::collapse([$nom_com,$email,$tel,$cp,$pais,$ciudad,$estado]);
            return view("checkout\paymentconfirmation",["courses"=>$courses,"total"=>$total,
                                                        "subTotal"=>$subTotal,"discount"=>$discount,
                                                        "datos_oxxo"=>$datos_oxxo,
                                                        "opcion_pago"=>$opcion_pago]);
        }elseif($opcion_pago==="spei_pago"){
            $spei_banco = $request->spei_banco;
            return view("checkout\paymentconfirmation",["courses"=>$courses,"total"=>$total,
                                                        "subTotal"=>$subTotal,"discount"=>$discount,
                                                        "opcion_pago"=>$opcion_pago,"spei_banco"=>$spei_banco]);
        }
    }
}
