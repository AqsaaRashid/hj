<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HJ</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Holtwood+One+SC&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&display=swap" rel="stylesheet">
 <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome for icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">




    @include('components.styles')
    <style>
      .cart-drawer {
    position: fixed;
    inset: 0;
    display: none;
    z-index: 9999;
}

.cart-drawer.active {
    display: block;
}

.cart-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0.6);
}

.cart-box {
    position: absolute;
    right: 0;
    top: 0;
    width: 400px;
    height: 100%;
    background: #fff8f5;
    padding: 20px;
    display: flex;
    flex-direction: column;
    animation: slideIn 0.3s ease;
}

@keyframes slideIn {
    from { transform: translateX(100%); }
    to { transform: translateX(0); }
}

.cart-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-family: 'Holtwood One SC', serif !important;
    font-size:28px;

}
.newww{
  color: #BB0000;
}

.cart-items {
    flex: 1;
    overflow-y: auto;
    margin-top: 20px;
}

.cart-footer {
    border-top: 1px solid #ddd;
    padding-top: 15px;
}

.checkout-btn {
    width: 100%;
    background: #BB0000;
    color: white;
    border: none;
    padding: 12px;
    margin-top: 10px;
    cursor: pointer;
}
.cart-close {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #BB0000;
    color: #fff;
    font-size: 20px;
    font-weight: 700;
    border-radius: 50%;
    cursor: pointer;
    transition: all 0.25s ease;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.cart-close:hover {
    background: #9f0000;
    transform: scale(1.08);
}
/* =========================
   RESPONSIVE CART DRAWER
========================= */

@media (max-width: 992px) {

    .cart-box {
        width: 360px;
    }

}

@media (max-width: 768px) {

    .cart-box {
        width: 100%;
        max-width: 100%;
        right: 0;
        border-radius: 20px 20px 0 0;
        height: 85%;
        bottom: 0;
        top: auto;
        animation: slideUp 0.3s ease;
    }

    @keyframes slideUp {
        from { transform: translateY(100%); }
        to { transform: translateY(0); }
    }

    .cart-header h3 {
        font-size: 18px;
    }

    .cart-items {
        margin-top: 15px;
    }

    .checkout-btn {
        padding: 14px;
        font-size: 16px;
    }

    .cart-close {
        width: 36px;
        height: 36px;
        font-size: 18px;
    }

}

@media (max-width: 480px) {

    .cart-box {
        height: 90%;
    }

    .cart-items {
        padding-right: 5px;
    }

    .cart-total {
        font-size: 15px;
    }

}
    </style>
 
</head>
<body>


@yield('content')
<div id="cartDrawer" class="cart-drawer">
    <div class="cart-overlay"></div>

    <div class="cart-box">
        <div class="cart-header">
            <h3>Your <span class="newww">Cart</span></h3>
            <span class="cart-close">&times;</span>
        </div>

        <div class="cart-items"></div>

        <div class="cart-footer">
            <div class="cart-total">
                Total: $<span id="cartTotal">0.00</span>
            </div>

<button class="checkout-btn" onclick="window.location='{{ route('checkout') }}'">
    Proceed to Checkout
</button>        </div>
    </div>
</div>
   
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<!-- CART DRAWER -->
 



<script>
    
const cartDrawer = document.getElementById('cartDrawer');

const cartTrigger = document.querySelector('.cart-trigger');
if (cartTrigger) {
    cartTrigger.addEventListener('click', () => {
        cartDrawer.classList.add('active');
        loadCart();
    });
}

document.querySelector('.cart-close').addEventListener('click', () => {
    cartDrawer.classList.remove('active');
});

document.querySelector('.cart-overlay').addEventListener('click', () => {
    cartDrawer.classList.remove('active');
});
</script>
<script>
function updateCartCountFromServer() {
    fetch("{{ route('cart.get') }}")
        .then(res => res.json())
        .then(data => {
            const count = Object.values(data.cart || {})
                .reduce((sum, item) => sum + item.quantity, 0);

            const badge = document.getElementById('cartCount');
            if (badge) badge.innerText = count;
        });
}
</script>
<script>
function loadCart() {
    fetch("{{ route('cart.get') }}", {
        headers: { "Accept": "application/json" }
    })
    .then(res => res.json())
    .then(data => {
        const itemsWrap = document.querySelector('.cart-items');
        const totalEl = document.getElementById('cartTotal');
        const badge = document.getElementById('cartCount');

        if (!itemsWrap) return;

        const cart = data.cart || {};
        const keys = Object.keys(cart);

        // update total + badge
        if (totalEl) totalEl.innerText = (data.total || 0).toFixed(2);
        if (badge) badge.innerText = data.cartCount ?? 0;

        // empty state
        if (keys.length === 0) {
            itemsWrap.innerHTML = `<p style="margin:0; padding:10px;">Your cart is empty.</p>`;
            return;
        }

        // render items
        itemsWrap.innerHTML = keys.map(id => {
            const item = cart[id];
            const imgUrl = item.image ? `{{ asset('storage') }}/${item.image}` : '';
         return `
<div style="display:flex; gap:12px; padding:12px 0; border-bottom:1px solid #eee;">
    
    <img src="${imgUrl}" style="width:60px; height:60px; object-fit:cover; border-radius:8px;">
    
    <div style="flex:1;">
        
        <div style="display:flex; justify-content:space-between; gap:10px;">
            <strong style="font-size:14px;">${item.name}</strong>

            <button onclick="removeFromCart('${id}')" 
            style="border:none;background:transparent;color:#BB0000;font-weight:700;cursor:pointer;">
            ×
            </button>
        </div>

        <div style="font-size:13px; margin-top:4px;">
        $${Number((item.price + (item.addon_total || 0)) * item.quantity).toFixed(2)}
<span style="font-size:11px;color:#777;">($${Number(item.price + (item.addon_total || 0)).toFixed(2)} each)</span>
    </div>

        ${
            item.addons && item.addons.length
            ? 
           item.addons.map((a,i) => `
<div style="font-size:12px;color:#777;display:flex;justify-content:space-between;">
    <span>+ ${a.name} ($${Number(a.price).toFixed(2)})</span>

    <button onclick="removeAddon('${id}',${i})"
    style="border:none;background:transparent;color:#BB0000;font-weight:700;cursor:pointer;">
    ×
    </button>
</div>
`)
            .join('')
            : ''
        }

        <div style="display:flex; align-items:center; gap:8px; margin-top:8px;">
            
            <button onclick="changeQty('${id}', ${item.quantity - 1})"
            style="width:28px;height:28px;border:none;background:#FFCE12;border-radius:6px;cursor:pointer;">-</button>

            <span style="min-width:20px;text-align:center;">${item.quantity}</span>

            <button onclick="changeQty('${id}', ${item.quantity + 1})"
            style="width:28px;height:28px;border:none;background:#FFCE12;border-radius:6px;cursor:pointer;">+</button>

        </div>

    </div>
</div>
`;
        }).join('');
    })
    .catch(err => console.error("loadCart error:", err));
}

function removeFromCart(productId) {
    fetch("{{ route('cart.remove') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ product_id: productId })
    })
    .then(res => res.json())
    .then(() => loadCart())
    .catch(err => console.error("remove error:", err));
}

function changeQty(productId, qty) {

    if (qty < 1) return;

    fetch("{{ route('cart.update') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
body: JSON.stringify({ product_key: productId, quantity: qty })
    })
    .then(res => res.json())
    .then(() => loadCart())
    .catch(err => console.error("update error:", err));
}
function removeAddon(productKey, addonIndex){

fetch("{{ route('cart.remove-addon') }}",{
method:"POST",
headers:{
"Content-Type":"application/json",
"Accept":"application/json",
"X-CSRF-TOKEN":document.querySelector('meta[name="csrf-token"]').getAttribute('content')
},
body:JSON.stringify({
product_key:productKey,
addon_index:addonIndex
})
})
.then(res=>res.json())
.then(()=>loadCart())

}
</script>
</body>
</html>
