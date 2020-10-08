<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    // Mass assignament
    protected $fillable = ["status"];

    public function approve()
    {
        $this->updateCustomIDAndStatus();
    }

    public function generateCustomID()
    {
        return md5("$this->id $this->updated_at");   
    }

    public function updateCustomIDAndStatus()
    {
        $this->status = "approve";
        $this->customid = $this->generateCustomID();
        $this->save();
    }

    // Un curso pertenece a muchos usuario [hasmany] [belongstomany]
    public function inShoppingCarts()
    {
        return $this->hasMany('App\InShoppingCart');
    }
    public function courses()
    {
        return $this->belongsToMany('App\Course','in_shopping_carts');
    }

    public function order()
    { 
        return $this->hasOne("App\Order")->first();
    }

    public function total()
    {
        return $this->courses()->sum('pricing1');
    }

    public function subTotal()
    {
        return $this->courses()->sum('pricing2');
    }
                // Descuento
    public function discount()
    {
        $descuento = $this->subTotal() - $this->total();
        return $descuento;
    }

    public function totalUSD()
    {
        return $this->courses()->sum('pricing1')/100;
    }

    public function coursesSize()
    {
        return $this->courses()->count();
    }

    public static function findOrCreateBySessionID($shopping_cart_id)
    {
        if($shopping_cart_id){
            // Buscar el cart de compras con este id
            return ShoppingCart::findBySession($shopping_cart_id);
        }else{
            // Crear un carrito de compras
            return ShoppingCart::createWithoutSession();
        }
    }

    // Buscar el id
    public static function findBySession($shopping_cart_id)
    {
        return ShoppingCart::find($shopping_cart_id);
    }

    // Create id
    public static function createWithoutSession()
    {
        // $shopping_cart = new Cart;

        // $shopping_cart->status = "incompleted";

        // $shopping_cart->save();

        // return $shopping_cart;

        return ShoppingCart::create([
            "status"=>"incompleted"
        ]);
    }
}
