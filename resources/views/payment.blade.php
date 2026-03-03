@extends('components.layout')

@section('content')

<div class="container py-5">

    <div class="text-center mb-4">
        <h2 class="fw-bold">Select Payment Method</h2>
        <p class="text-muted">Choose how you'd like to pay</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm p-4">

                <div class="form-check mb-3">
                    <input class="form-check-input"
                           type="radio"
                           name="paymentMethod"
                           value="cod"
                           id="cod"
                           checked>
                    <label class="form-check-label" for="cod">
                        Cash on Delivery
                    </label>
                </div>

                <div class="form-check mb-4">
                    <input class="form-check-input"
                           type="radio"
                           name="paymentMethod"
                           value="stripe"
                           id="stripe">
                    <label class="form-check-label" for="stripe">
                        Pay Online (Stripe)
                    </label>
                </div>

                <button onclick="placeOrder()"
                        class="btn btn-dark w-100">
                    Place Order
                </button>

            </div>

        </div>
    </div>

</div>

<script>
function placeOrder(){

    let method = document.querySelector('input[name="paymentMethod"]:checked').value;

    fetch("{{ route('checkout.placeOrder') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({
            payment_method: method
        })
    })
    .then(res => res.json())
    .then(data => {
        if(data.success){
            alert("Order Placed Successfully!");
            window.location.href = "{{ route('home') }}";
        } else {
            alert(data.message);
        }
    });

}
</script>

@endsection