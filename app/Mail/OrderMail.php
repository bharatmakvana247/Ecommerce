<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;
    public $cart_total_price;
    public $cart_total;
    public $address;
    public $estimated_date;
    // public $orderdetails;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cart_total, $cart_total_price, $address, $estimated_date)
    {
        $this->estimated_date = $estimated_date;
        $this->address = $address;
        $this->cart_total = $cart_total;
        $this->cart_total_price = $cart_total_price;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mail from Order')->view('emails.order');
    }
}
