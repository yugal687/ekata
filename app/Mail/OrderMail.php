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

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userDetail, $totalPrice)
    {
        $this->userDetail = $userDetail;
        $this->totalPrice = $totalPrice;
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
                    'userDetail' => $this->userDetail,
                    'totalPrice' => $this->totalPrice
                ]
            );
    }
}
