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
								{{$userDetail->date}}
							</span>

                        <span style="display:inline;">
								<br>
                            @if($userDetail->order->order_number)
                                Transaction ID: <a href="" target="_BLANK">
									{{$userDetail->order->order_number}}&nbsp;</a>
                            @endif
							</span>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-12">
                        <span
                            style="color:#333333 !important;font-weight:bold;font-size: 14px;font-family: arial,helvetica,sans-serif;">Dear {{$userDetail->user->first_name}},</span>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-12" style="font-size: 14px;font-weight: bold; color: #fe6c6f">
                        You bought products with total amount of {{$orderitem->order->total_price}} AUD from Ekata Convenience Store
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
                                    {{ $userDetail->order->sub_urb}}<br/>
                                    {{ $userDetail->order->state}}<br/>
                                    {{ $userDetail->order->shipping_address}}<br/>
                                    Australia<br/>
                                </p>
                            </div>
                        </div>
                    </div>
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


