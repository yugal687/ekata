<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=">
    <title></title>
    <style>
        body {
            background-color: #ebebeb;
        }

        .mail-container {
            margin-top: 20px;
            margin-bottom: 20px;
            background-color: #fff;
        }

        p {
            font-size: 14px;
            line-height: 1.5em;
        }

        table {
            font-size: 14px;
        }
    </style>
</head>

<body>
<div class="container-fluid">
    <div class="row d-flex justify-content-center">

        <div class="col-lg-8 col-md-10 col-sm-12">
            <main class="mail-container px-3 py-3">
                <div class="row">
                    <div class="col-auto mr-auto">Ekata Convenience Store</div>
                    <div class="col-auto">

							<span style="display:inline;">
								{{$orderitem[0]->date}}
							</span>

                        <span style="display:inline;">
								<br>
                            @if($orderitem[0]->order->order_number)
                                Transaction ID: <a href="" target="_BLANK">
									{{$orderitem[0]->order->order_number}}&nbsp;</a>
                            @endif
							</span>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-12">
                        <span
                            style="color:#333333 !important;font-weight:bold;font-size: 14px;font-family: arial,helvetica,sans-serif;">Dear {{$orderitem[0]->user->first_name}},</span>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-12" style="font-size: 14px;font-weight: bold; color: #fe6c6f">
                        You bought products with total amount of {{$orderitem[0]->order->total_price}} AUD from Ekata Convenience Store
                    </div>
                    <div class="col-12">
                        <p>
                            Thanks for using PayPal. You can now send any items. To view the transaction details, log in
                            to your PayPal account.
                        </p>
                    </div>

                    <div class="col-12 my-4">
                        <p style="color: #50bfff; font-weight: bold;">Seller Protection – Eligible</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-12 font-weight-bold">
                                <p>Seller</p>
                            </div>
                            <div class="col-12">
                                <p>
                                    Ekata Convenience Store<br/>
                                    ekata@gmail.com
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-12 font-weight-bold">
                                <p>Shipping Address</p>
                            </div>
                            <div class="col-12">
                                <p>
                                    {{ $orderitem[0]->order->sub_urb}}<br/>
                                    {{ $orderitem[0]->order->state}}<br/>
                                    {{ $orderitem[0]->order->shipping_address}}<br/>
                                    Australia<br/>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <table class="table table-borderless">
                        <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Unit Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orderitem as $items)
                            <tr>
                                <td>{{$items->product->product_name}}</td>
                                <td>${{$items->price}}</td>
                                <td>{{$items->quantity}}</td>
                                <td>${{$items->order->total_price}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                    </table>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p>Sincerely,<br/>
                            Ekata Convenience Store</p>
                    </div>
                </div>
            </main>
        </div>

    </div>
</div>
</body>

</html>


