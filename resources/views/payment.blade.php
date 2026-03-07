@extends('components.layout')

@section('content')

<div class="container py-5">

    <div class="text-center mb-4">
        <h2 class="fw-bold">Secure Payment</h2>
        <p class="text-muted">Pay securely using your credit or debit card</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm p-4 text-center">

                <img src="/images/hangry-logo.png" width="120" class="mb-3">

                <h5 class="mb-4">Complete Your Order</h5>

                <button onclick="payWithStripe()" class="btn btn-dark w-100">
                    Pay Securely
                </button>

            </div>

        </div>
    </div>

</div>

<script src="https://js.stripe.com/v3/"></script>

<script>

let stripe = Stripe("{{ env('STRIPE_KEY') }}");

async function payWithStripe(){

try{

const response = await fetch("{{ route('place.order') }}",{
method:"POST",
headers:{
"Content-Type":"application/json",
"X-CSRF-TOKEN":"{{ csrf_token() }}"
}
});

const order = await response.json();

if(!order.success){
alert(order.message);
return;
}

// create stripe checkout
const stripeResponse = await fetch("{{ route('stripe.checkout') }}",{
method:"POST",
headers:{
"Content-Type":"application/json",
"X-CSRF-TOKEN":"{{ csrf_token() }}"
},
body: JSON.stringify({
order_id: order.order_id
})
});

const session = await stripeResponse.json();

stripe.redirectToCheckout({
sessionId: session.id
});

}catch(e){
console.log(e);
alert("Payment error. Check console.");
}

}

</script>
@endsection