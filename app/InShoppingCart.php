<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InShoppingCart extends Model
{
    //// Mass assignament
    protected $fillable = ['id','course_id','shopping_cart_id'];

    // Contal cuantos productos hay en el carrito
    public static function productsCount($shopping_cart_id)
    {
        return InShoppingCart::where("shopping_cart_id",$shopping_cart_id)
                        ->count();
    }
    public static function deleteInshoppingCartCourse($shopping_cart_id,$id_shopping_cart_generate)
    {
        return InShoppingCart::where("course_id",$shopping_cart_id)
                        ->where("shopping_cart_id",$id_shopping_cart_generate)
                        ->delete();
    }
}
