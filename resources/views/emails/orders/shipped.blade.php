@component('mail::message')
    # Introduction

    Thank you {{ $order->status }}.

    @component('mail::button', ['url' => ''])
        Track Order #{{ $order->id }}
    @endcomponent

    Thanks,
    {{ config('app.name') }}
@endcomponent