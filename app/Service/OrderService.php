<?php

namespace App\Service;

use App\Model;
use App\Model\Order;
use Illuminate\Support\Facades\DB;

class OrderService
{
    public $orderItems = [];
    private $shippingAddress;
    private $billingAddress;
    public $invoiceId;
    public $totalPrice;

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
        DB::beginTransaction();
        try {
            if (isset($this->shippingAddress['email'])) {
                //dd($this->shippingAddress['postal_code']);
                $order = Order::create([
                    'order_number' => $this->invoiceId,
                    'shipping_address' => $this->shippingAddress['address'],
                    'sub_urb' => $this->shippingAddress['suburb'],
                    'state' => $this->shippingAddress['state'],
                    'order_status' =>'pending',
                    'postal_code' => $this->shippingAddress['postal_code'],
                    'total_price' => $this->totalPrice,
                ]);
            } elseif (isset($this->billingAddress['email'])) {
                $order = Order::create([
                    'order_number' => $this->invoiceId,
                    'shipping_address' => $this->billingAddress['address'],
                    'sub_urb' => $this->billingAddress['suburb'],
                    'state' => $this->billingAddress['state'],
                    'order_status' =>'pending',
                    'postal_code' => $this->billingAddress['postal_code'],
                    'total_price' => $this->totalPrice,
                ]);
            }
            //dd($this->orderItems);
            foreach ($this->orderItems as $orderItem) {
                //dd($orderItem);
                $order->items()->create($orderItem);
                //dd($order);
            }
            //dd($order);

            DB::commit();
           // $order->save();
            return $order;
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }
    }

}
