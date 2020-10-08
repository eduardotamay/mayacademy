<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    public function scopeLatest($query)
    {
        return $query->orderBy("id","desc");
    }

    // Un curso pertebece a un profesor


    public function paypalItem(){ //Array items
        return \PaypalPayment::item()
                                ->setName($this->name)
                                ->setDescription($this->description)
                                ->setCurrency('USD')
                                ->setQuantity(1)
                                ->setPrice($this->pricing1/100);
    }
}
