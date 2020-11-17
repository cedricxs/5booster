@extends('layout.client')
@section('content')

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe("{{config('cashier.key')}}");
    stripe.createSource({
        type: 'wechat',
        amount: '{{$amount}}',
        currency: '{{$currency}}',
        redirect: {
            return_url: '{{$redirect_url}}',
        },
        'owner[email]' : '979581491@qq.com'
    }).then(function(result) {
        console.log(result)
        window.location.href = result.source.wechat['qr_code_url']
    });
    </script>
@endsection
