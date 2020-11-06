<?php

namespace App\Service;

use App\Model;
use App\Model\Order;
use App\Model\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderService
{
    private $orderItems = [];
    private $shippingAddress;
    private $billingAddress;
    private $invoiceId;
    private $totalPrice;
    private $paymentType;

    public function __construct(array $orderItems,
                                $invoiceId,
                                array $billingAddress,
                                array $shippingAddress,
                                float $totalPrice,
                                string $paymentType)
    {
        $this->orderItems = $orderItems;
        $this->shippingAddress = $shippingAddress;
        $this->billingAddress = $billingAddress;
        $this->invoiceId = $invoiceId;
        $this->totalPrice = $totalPrice;
        $this->paymentType = $paymentType;
        $this->saveOrder();
    }

    public function saveOrder()
    {
        DB::beginTransaction();
        try {
            if (isset($this->shippingAddress['email'])) {
                $order = Order::create([
                    'order_number' => $this->invoiceId,
                    'shipping_address' => $this->shippingAddress['address'],
                    'first_name' => $this->shippingAddress['first_name'],
                    'last_name' => $this->shippingAddress['last_name'],
                    'email' => $this->shippingAddress['email'],
                    'contact_number' => $this->shippingAddress['contact_number'],
                    'sub_urb' => $this->shippingAddress['suburb'],
                    'state' => $this->shippingAddress['state'],
                    'order_status' => 'pending',
                    'postal_code' => $this->shippingAddress['postal_code'],
                    'total_price' => $this->totalPrice,
                    'registered_user' => Auth::user()->id ?? 0,
                ]);
            } elseif (isset($this->billingAddress['email'])) {
                $order = Order::create([
                    'order_number' => $this->invoiceId,
                    'shipping_address' => $this->billingAddress['address'],
                    'first_name' => $this->billingAddress['first_name'],
                    'last_name' => $this->billingAddress['last_name'],
                    'email' => $this->billingAddress['email'],
                    'contact_number' => $this->billingAddress['contact_number'],
                    'sub_urb' => $this->billingAddress['suburb'],
                    'state' => $this->billingAddress['state'],
                    'order_status' => 'pending',
                    'postal_code' => $this->billingAddress['postal_code'],
                    'total_price' => $this->totalPrice,
                    'registered_user' => Auth::user()->id ?? 0,
                ]);
            }
            $result = $order;
            foreach ($this->orderItems as $orderItem) {
                $order->items()->create($orderItem);
            }

            DB::commit();
            return $result;
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }
    }

}
