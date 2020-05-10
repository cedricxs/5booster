@extends('layout.client')
@section('content')
    <div id="payment">

        <!-- Stripe Elements Placeholder -->
        <div id="card-element"></div>

        <div><label> amount: </label>&nbsp;<span id="amount">{{config('cashier.amount')[$abonnement]}}</span></div>
        <img id="loading" width="20%" height="40%" style="display:none" src="{{asset('img/giphy.gif')}}"/>
        <button id="card-button">
            confirm
        </button>
    </div>
    <script src="https://js.stripe.com/v3/"></script>

    <script>
        const stripe = Stripe("{{config('cashier.key')}}");

        const elements = stripe.elements();
        const cardElement = elements.create('card');

        cardElement.mount('#card-element');

        const cardButton = document.getElementById('card-button');

        const amount = document.getElementById('amount').innerText;
        cardButton.addEventListener('click', async (e) => {
            var loading = document.getElementById('loading');

            loading.setAttribute('style','display:visible')
            const { paymentMethod, error } = await stripe.createPaymentMethod(
                'card', cardElement, {

                }
            );
            console.log(paymentMethod);
            if (error) {
                // 错误信息
            } else {
                console.log('get payment!')
                $.ajax({
                    url : "{{url('/api/abonner')}}",
                    method : "POST",
                    data : {
                        abonnement : '{{$abonnement}}',
                        paymentMethod:paymentMethod,
                    },
                    dataType : 'json',
                    success : function (res) {
                        console.log(res)
                        window.location.href = '{{url('client/payment/succeeded')}}'
                    },
                    error : function (err) {
                        console.log(err)
                        window.location.href = '{{url('client/payment/failed')}}'
                    }
                })
            }
        });
    </script>


    @endsection
