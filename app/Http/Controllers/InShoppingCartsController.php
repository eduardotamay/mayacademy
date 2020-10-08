<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShoppingCart;
use App\InShoppingCart;

class InShoppingCartsController extends Controller
{   
    public function __construct()
    {
        $this->middleware("shoppingcart");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shopping_cart = $request->shopping_cart;

        $response = InShoppingCart::create([
            'shopping_cart_id'=>$shopping_cart->id,
            'course_id'=>$request->course_id
        ]);
        // Variable con el id_cart para mandarlo al frotend
        $shopping_cart_id = $shopping_cart->id;
        if($request->ajax()){
            return response()->json([
                'products_count' => InshoppingCart::productsCount($shopping_cart->id)
            ]);
        }

        if ($response) {
            return redirect('/mycart');
        } else {
            return back();
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $shopping_cart_id = $request->id;
        $id_shopping_cart_generate = $request->id_user_generate;

        //Count the products in my cart
        $response = InShoppingCart::deleteInshoppingCartCourse($shopping_cart_id,$id_shopping_cart_generate);

        return response()->json([
            'products_count' => InshoppingCart::productsCount($id_shopping_cart_generate)
        ]);
    }
}
