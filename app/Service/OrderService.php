<?php

namespace App\Service;

use App\Model;
use App\Model\Order;
use Illuminate\Support\Facades\DB;

class OrderService
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
                'total_price' => $this->totalPrice,
            ]);
        } elseif (isset($this->billingAddress['email'])) {
            $order = Order::create([
                'order_number' => $this->invoiceId,
                'shipping_address' => $this->billingAddress['address'],
                'suburb' => $this->billingAddress['suburb'],
                'state' => $this->billingAddress['state'],
                'postal_code' => $this->billingAddress['postal_code'],
                'total_price' => $this->totalPrice,
            ]);
        }
        $order->items()->create($this->orderItems);
        return $order;
    }

}
