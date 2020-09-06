<?php


namespace App\Service;

use App\Model;
use Illuminate\Support\Facades\DB;

class Order
{
    private $orderItems = [];
    private $shippingAddress;
    private $billingAddress;
    private $invoiceId;
    private $totalPrice;

    public function __construct(array $orderItems,
                                $invoiceId,
                                array $billingAddress,
                                array $shippingAddress,
                                float $totalPrice)
    {
        $this->orderItems = $orderItems;
        $this->shippingAddress = $shippingAddress;
        $this->billingAddress = $billingAddress;
        $this->invoiceId = $invoiceId;
        $this->totalPrice = $totalPrice;
        $this->saveOrder();
    }

    public function saveOrder()
    {
        if (isset($this->shippingAddress['email'])) {
            $order = Order::create([
                'order_number' => $this->invoiceId,
                'shipping_address' => $this->shippingAddress['address'],
                'suburb' => $this->shippingAddress['suburb'],
                'state' => $this->shippingAddress['state'],
                'postal_code' => $this->shippingAddress['postal_code'],
                'total_price' => $this->shippingAddress['total_price'],
            ]);
        } elseif (isset($this->billingAddress['email'])) {
            $order = Order::create([
                'order_number' => $this->invoiceId,
                'shipping_address' => $this->billingAddress['address'],
                'suburb' => $this->billingAddress['suburb'],
                'state' => $this->billingAddress['state'],
                'postal_code' => $this->billingAddress['postal_code'],
                'total_price' => $this->billingAddress['total_price'],
            ]);
        }
        $order->items()->create($this->orderItems);
        return true;
    }

}
