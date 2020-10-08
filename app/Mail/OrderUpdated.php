<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $products;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        //Pasar a la vista $order
        $this->order = $order;
        $this->products = $order->shopping_cart->courses()->get();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Recibo actualizado | MAYACADEMY")
                    ->view('mailers.order_updated');
    }
}
