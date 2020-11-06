<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $userDetail;
    public $totalPrice;
    public $data;
    public $productName;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userDetail, $totalPrice,$data,$productName)
    {
        $this->userDetail = $userDetail;
        $this->data = $data;
        $this->totalPrice = $totalPrice;
        $this->productName = $productName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('ajitsubedi2011@gmail.com')->markdown('emails.Order')
            ->with(
                [
                    'data' => $this->data,
                    'userDetail' => $this->userDetail,
                    'totalPrice' => $this->totalPrice,
                    'productName' => $this->productName
                ]
            );
    }
}
