@extends('components.layout')

@section('content')

<div class="checkout-wrapper py-3">

    <div class="container">

        <!-- HEADER -->
        <div class="text-center mb-4">
                        <p class="checkout-sub">Complete your order safely & quickly</p>

            <h2 class="fw-bold checkout-heading"><span class="hh">Secure </span>Checkout</h2>
        </div>

        <div class="row g-4">

            <!-- LEFT SIDE -->
            <div class="col-lg-6">

                <div class="checkout-card">

                    <h5 class="section-title">Customer Information</h5>

                    <input type="text" id="customerName" class="form-control premium-input mb-3" placeholder="Full Name">
                    <input type="email" id="customerEmail" class="form-control premium-input mb-3" placeholder="Email Address">
                    <input type="text" id="customerPhone" class="form-control premium-input mb-4" placeholder="Phone Number">

                    <h5 class="section-title mt-3">Delivery Address</h5>

                    <input type="text" id="street" class="form-control premium-input mb-3" placeholder="Street Address">
                    <input type="text" id="city" class="form-control premium-input mb-3" placeholder="City">
                    <input type="text" id="zip" class="form-control premium-input" placeholder="Zip Code">

                </div>

            </div>

            <!-- RIGHT SIDE -->
            <div class="col-lg-6">

                <div class="checkout-card">

                    <h5 class="section-title">Order Summary</h5>

                    @foreach($cart as $item)
                        <div class="order-item">
<div>
    <div>{{ $item['name'] }} × {{ $item['quantity'] }}</div>

    @if(isset($item['addons']))
        @foreach($item['addons'] as $addon)
            <small style="color:#777">
                + {{ $addon['name'] }} (${{ number_format($addon['price'],2) }})
            </small><br>
        @endforeach
    @endif
</div>
                        @php
$addonTotal = 0;

if(isset($item['addons'])){
    foreach($item['addons'] as $addon){
        $addonTotal += $addon['price'];
    }
}

$itemTotal = ($item['price'] + $addonTotal) * $item['quantity'];
@endphp

<span>${{ number_format($itemTotal, 2) }}</span>                        </div>
                    @endforeach

                    <div class="summary-divider"></div>

                    <div class="summary-row">
                        <span>Subtotal</span>
                        <span>$<span id="subtotalAmount">{{ number_format($subtotal, 2) }}</span></span>
                    </div>

                    <div class="summary-row discount-row">
                        <span>Discount</span>
                        <span>- $<span id="discountAmount">{{ number_format($discount, 2) }}</span></span>
                    </div>

                    <div class="summary-total">
                        <span>Total</span>
                        <span>$<span id="totalAmount">{{ number_format($total, 2) }}</span></span>
                    </div>

                    {{-- PROMO --}}
                    @if($promoEligible)

                        <div class="promo-section mt-3">
                            <input type="text"
                                   id="promoInput"
                                   class="form-control promo-input"
                                   placeholder="Enter Promo Code">

                          <div class=" mt-3">
    <button onclick="applyPromo()"
            class="btn promo-btn">
        Apply Promo
    </button>
</div>
                        </div>

                    @else

                        @if($nextMinimum)
                            <div class="promo-lock mt-3">
                                Spend <strong>${{ number_format($nextMinimum - $subtotal, 2) }}</strong>
                                more to unlock rewards 🔥
                            </div>
                        @endif

                    @endif

                 <div class="mt-4 text-end">
    <button class="btn checkout-btn"
            onclick="goToPayment()">
        Next →
    </button>
</div>

                </div>

            </div>

        </div>

        

    </div>
</div>


<style>
.checkout-wrapper{
    background:#ffffff;
}

/* HEADINGS */
.checkout-heading{
    color:#BB0000;
    margin-bottom:5px;
    animation:fadeDown 0.6s ease forwards;
}

.checkout-sub{
    color: #FF7D01 !important;
    margin-bottom:0;
    font-size:16px;
    animation:fadeDown 0.8s ease forwards;
}

/* CARD */
.checkout-card{
    background:#ffffff;
    border-radius:18px;
    padding:28px;
    box-shadow:0 10px 30px rgba(0,0,0,0.06);
    border:1px solid #f0f0f0;
    opacity:0;
    transform:translateY(20px);
    animation:fadeUp 0.7s ease forwards;
}

.checkout-card:nth-child(2){
    animation-delay:0.2s;
}

/* SECTION TITLE */
.section-title{
    font-weight:600;
    margin-bottom:15px;
    color:#BB0000;
}

/* INPUTS */
.premium-input{
    border-radius:10px;
    padding:11px 14px;
    border:1px solid #ddd;
    transition:all 0.25s ease;
}

.premium-input:focus{
    border-color:#FF7D01;
    box-shadow:0 0 0 3px rgba(255,125,1,0.15);
    transform:scale(1.02);
}

/* ORDER */
.order-item{
    display:flex;
    justify-content:space-between;
    padding:6px 0;
    font-size:14px;
    transition:all 0.2s ease;
}

.order-item:hover{
    transform:translateX(4px);
}

/* DIVIDER */
.summary-divider{
    height:1px;
    background:#eee;
    margin:18px 0;
}

/* SUMMARY */
.summary-row{
    display:flex;
    justify-content:space-between;
    font-size:14px;
}

.discount-row{
    color:#BB0000;
}

/* TOTAL */
.summary-total{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-top:14px;

    font-family: 'Holtwood One SC', serif !important;
    font-size:18px;
    letter-spacing:1px;
    text-transform:uppercase;
    color:#BB0000;

    border-top:2px solid #FF7D01;
    padding-top:14px;

    animation: totalPulse 2.5s infinite ease-in-out;
}

/* remove old pulse if applied */
.summary-total span:last-child{
    color:#BB0000;
}
.summary-total{
    border-top:2px solid #FF7D01;
    padding-top:14px;
}

/* PROMO */
.promo-section{
    background:#fff8f2;
    padding:12px;
    border-radius:12px;
    border:1px solid #ffe3cf;
    animation:fadeIn 0.5s ease forwards;
}


/* LOCK */
.promo-lock{
    background:#FFCE12;
    padding:12px;
    border-radius:10px;
    font-size:13px;
    font-weight:500;
    animation:glowPulse 2s infinite ease-in-out;
}
.hh{
    color : #000000;
}
/* PROMO BUTTON */
.promo-btn{
    background:#FF7D01;
    border:none;
    color:#fff;
    font-weight:600;
    padding:10px 28px;
    border-radius:4px;
    letter-spacing:0.5px;
    transition:all 0.2s ease;
    align-items:start;
}

.promo-btn:hover{
    background:#FF7D01;
    color:#fff;
    transform:translateY(-2px);
}

.promo-btn:active{
    transform:scale(0.95);
}


/* CHECKOUT BUTTON */
.checkout-btn{
    background:#BB0000;
    border:none;
    color:#fff;
    font-family: 'Holtwood One SC', serif !important;
    text-transform:uppercase;
    letter-spacing:1px;
    border-radius:4px;
    transition:all 0.2s ease;
    width:120px;
   
}

.checkout-btn:hover{
    background:#BB0000;
    color:#fff;
    transform:translateY(-3px);
}

.checkout-btn:active{
    transform:scale(0.94);
}

/* ANIMATIONS */

@keyframes fadeUp{
    to{
        opacity:1;
        transform:translateY(0);
    }
}

@keyframes fadeDown{
    from{
        opacity:0;
        transform:translateY(-15px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

@keyframes fadeIn{
    from{ opacity:0; }
    to{ opacity:1; }
}

@keyframes pulseTotal{
    0%{ transform:scale(1); }
    50%{ transform:scale(1.05); }
    100%{ transform:scale(1); }
}

@keyframes glowPulse{
    0%{ box-shadow:0 0 0 rgba(255,206,18,0.5); }
    50%{ box-shadow:0 0 15px rgba(255,206,18,0.5); }
    100%{ box-shadow:0 0 0 rgba(255,206,18,0.5); }
}
@keyframes totalPulse{
    0%{
        transform:scale(1);
        text-shadow:0 0 0 rgba(187,0,0,0.3);
    }
    50%{
        transform:scale(1.05);
        text-shadow:0 0 12px rgba(187,0,0,0.4);
    }
    100%{
        transform:scale(1);
        text-shadow:0 0 0 rgba(187,0,0,0.3);
    }
}
/* PRIMARY HEADINGS */
.checkout-heading{
    font-family: 'Holtwood One SC', serif !important;
    color:#BB0000;
    font-size:28px;
    letter-spacing:1px;
    text-transform:uppercase;
    margin-bottom:6px;
}

/* SUBTEXT */
.checkout-sub{
    font-size:16px;
    color:#555;
    font-weight:100;
}

/* SECTION TITLES */
.section-title{
    font-family: 'Holtwood One SC', serif !important;
    font-size:18px;
    letter-spacing:0.5px;
    color: #000000;
    margin-bottom:18px;
    text-transform:uppercase;
    font-weight:100px !important;
}

.section-title{
    position:relative;
    display:inline-block;
}

.section-title::after{
    content:'';
    position:absolute;
    left:0;
    bottom:-6px;
    width:60px;
    height:3px;
    background:#FF7D01;
    border-radius:4px;
}
</style>


<script>
function applyPromo() {

    fetch("{{ route('promo.apply') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({
            promo_code: document.getElementById('promoInput').value
        })
    })
    .then(res => res.json())
    .then(data => {
        if(data.success){
            location.reload();
        } else {
            alert(data.message);
        }
    });
}


</script>
<script src="https://js.stripe.com/v3/"></script>

<script>

let stripe = Stripe("{{ env('STRIPE_KEY') }}");

async function goToPayment(){

try{

// 1️⃣ Save customer info
const response = await fetch("{{ route('checkout.next') }}", {
    method: "POST",
    headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": "{{ csrf_token() }}"
    },
    body: JSON.stringify({
        name: document.getElementById('customerName').value,
        email: document.getElementById('customerEmail').value,
        phone: document.getElementById('customerPhone').value,
        street: document.getElementById('street').value,
        city: document.getElementById('city').value,
        zip: document.getElementById('zip').value
    })
});

const data = await response.json();

if(!data.success){
    alert(data.message);
    return;
}


// 2️⃣ Create order
const orderResponse = await fetch("{{ route('place.order') }}",{
    method:"POST",
    headers:{
        "Content-Type":"application/json",
        "X-CSRF-TOKEN":"{{ csrf_token() }}"
    }
});

const order = await orderResponse.json();

if(!order.success){
    alert(order.message);
    return;
}


// 3️⃣ Create Stripe session
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


// 4️⃣ Redirect to Stripe
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