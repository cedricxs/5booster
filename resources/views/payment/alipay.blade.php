@extends('layout.client')
@section('content')

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe("{{config('cashier.key')}}");
        {{--stripe.createSource({--}}
        {{--    type: 'alipay',--}}
        {{--    amount: '{{$amount}}',--}}
        {{--    currency: '{{$currency}}',--}}
        {{--    redirect: {--}}
        {{--        return_url: '{{$redirect_url}}',--}}
        {{--    },--}}
        {{--    'owner[email]' : '979581491@qq.com'--}}
        {{--}).then(function(result) {--}}
        {{--    console.log(result)--}}
        {{--    window.location.href = result.source.redirect['url']--}}
        {{--    // handle result.error or result.source--}}
        {{--});--}}

        stripe.confirmAlipayPayment('{{$payment_intent->client_secret}}', {
            // Return URL where the customer should be redirected to after payment
            return_url: '{{url('client/payer/alipay_ready')}}',
        }).then((result) => {
            // if (result.error) {
            //     // Inform the customer that there was an error.
            //     console.log(result.error)
            // }
            console.log(result)
        });
    </script>
    @endsection
