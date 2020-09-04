@component('mail::message')

Your order has been Confirmed.

@component('mail::button', ['url' => ''])
Buy More
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
