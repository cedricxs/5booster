@extends('layout.client')
@section('content')
<input id="card-holder-name" type="text">

<!-- Stripe Elements Placeholder -->
<div id="card-element"></div>

<button id="card-button" data-secret="{{ $intent->client_secret }}">
    Update Payment Method
</button>
<script src="https://js.stripe.com/v3/"></script>

<script>
    const stripe = Stripe("{{config('cashier.key')}}");

    const elements = stripe.elements();
    const cardElement = elements.create('card');

    cardElement.mount('#card-element');
    const cardHolderName = document.getElementById('card-holder-name');
    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;

    cardButton.addEventListener('click', function(ev) {

        stripe.confirmCardSetup(
            clientSecret,
            {
                payment_method: {
                    card: cardElement,
                    billing_details: {
                        name: cardHolderName.value,
                    },
                },
            }
        ).then(function(result) {
            if (result.error) {
                // Display error.message in your UI.
            } else {
                // The setup has succeeded. Display a success message.
                console.log(result)
                {{--$.ajax({--}}
                {{--    url : "{{url('/api/setupIntent')}}",--}}
                {{--    method : "POST",--}}
                {{--    data : {--}}
                {{--        intent:setupIntent,--}}
                {{--    },--}}
                {{--    dataType : 'text',--}}
                {{--    success : function (res) {--}}
                {{--        console.log(res)--}}
                {{--    },--}}
                {{--    error : function (err) {--}}
                {{--        console.log(err)--}}
                {{--    }--}}
                {{--})--}}
            }
        });
    });
</script>
@endsection
