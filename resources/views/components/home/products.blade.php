<section class="products">
  <div class="container">

 <div class="t-head">
      <div class="t-sub">Experience Taste in  Every Bite</div>
      <h2 class="t-title">
        TOP SELLING <span class="t-red">PRODUCTS</span>
      </h2>
    </div>

    <div class="products-grid">

      <!-- CARD -->
@foreach($products as $product)
<div class="product-card"
     data-id="{{ $product->id }}"
     data-name="{{ $product->name }}"
     data-price="{{ $product->price }}"
     data-description="{{ $product->description }}"
     data-image="{{ asset('storage/'.$product->image) }}">
    <img src="{{ asset('storage/'.$product->image) }}" class="product-img">

    <div class="product-content">
        <div class="top-row">
            <h4>{{ $product->name }}</h4>
            <div class="price">${{ number_format($product->price,2) }}</div>
        </div>

        <div class="stars">★★★★★</div>

        <p>{{ $product->description }}</p>
    </div>
</div>
@endforeach

    </div>
<div class="btn-wrapper">
      <a href="{{'menu'}}" class="explore-btn">Explore Menu</a>
    </div>

   

  </div>


  <!-- model -->
   <!-- PRODUCT MODAL -->
<div id="productModal" class="product-modal">
    <div class="modal-overlay"></div>

    <div class="modal-box">

        <span class="modal-close">&times;</span>

        <div class="modal-left">
            <img id="modalImage" src="">
        </div>

        <div class="modal-right">
            <h3 id="modalName"></h3>
            <div class="modal-price" id="modalPrice"></div>
            <p id="modalDescription"></p>

            <div class="quantity-wrapper">
                <button id="decreaseQty">-</button>
                <span id="productQty">1</span>
                <button id="increaseQty">+</button>
            </div>

            <div class="modal-buttons">
                <button class="add-cart-btn">Add to Cart</button>
            </div>
        </div>

    </div>
</div>
<style>
  /* =========================
   PREMIUM PRODUCT MODAL
========================= */

.product-modal {
    position: fixed;
    inset: 0;
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 9999;
}

.product-modal.active {
    display: flex;
}

/* Overlay */
.modal-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0.65);
    backdrop-filter: blur(6px);
}

/* Modal Box */
.modal-box {
    position: relative;
    background: #ffffff;
    width: 900px;
    max-width: 95%;
    border-radius: 18px;
    display: flex;
    overflow: hidden;
    z-index: 2;
    box-shadow: 0 25px 60px rgba(0,0,0,0.25);
    animation: premiumFade 0.35s ease;
}

@keyframes premiumFade {
    from {
        transform: translateY(20px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

/* Left Image Section */
.modal-left {
    width: 50%;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px;
    overflow: hidden;
}

/* Red gradient layer */
.modal-left::before {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, #BB0000, #8c0000);
    z-index: 1;
}

/* Background image layer */
.modal-left::after {
    content: "";
    position: absolute;
    inset: 0;
    background: url('/images/stars.png') center/cover no-repeat;
    z-index: 2;
    height:720px;
}

/* Keep product image above layers */
.modal-left img {
    position: relative;
    z-index: 3;
    width: 100%;
    max-width: 320px;
    object-fit: contain;
    transition: transform 0.3s ease;
}
.modal-left img:hover {
    transform: scale(1.05);
}

/* Right Content */
.modal-right {
    width: 50%;
    padding: 45px 40px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.modal-right h3 {
    font-family: 'Holtwood One SC', serif;
    font-size: 28px;
    margin-bottom: 10px;
}

.modal-price {
    font-size: 28px;
     font-family: 'Holtwood One SC', serif;

    color: #BB0000;
    font-weight: 100;
    margin: 12px 0 18px;
}

.modal-right p {
    color: #555;
    line-height: 1.6;
    font-size: 15px;
}

/* Quantity */
.quantity-wrapper {
    display: flex;
    align-items: center;
    gap: 15px;
    margin: 25px 0;
}

.quantity-wrapper button {
    width: 40px;
    height: 40px;
    border: none;
    background: #FFCE12;
    font-size: 18px;
    font-weight: 700;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.2s ease;
    color:#fff;
}

.quantity-wrapper button:hover {
    background: #f5b800;
    transform: scale(1.05);
}

#productQty {
    font-size: 18px;
    font-weight: 600;
}

/* Add to Cart Button */
.add-cart-btn {
    background: linear-gradient(135deg, #FFCE12, #f5b800);
    border: none;
    padding: 14px 28px;
    font-weight: 700;
    border-radius: 12px;
    cursor: pointer;
    font-size: 16px;
    transition: all 0.25s ease;
    box-shadow: 0 8px 18px rgba(0,0,0,0.15);
    color: #fff;
}

.add-cart-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 25px rgba(0,0,0,0.25);
}

/* Close Button */
.modal-close {
    position: absolute;
    top: 18px;
    right: 18px;
    width: 38px;
    height: 38px;
    background: #BB0000;
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.25s ease;
    box-shadow: 0 6px 16px rgba(0,0,0,0.2);
}

.modal-close:hover {
    background: #900000;
    transform: scale(1.08);
}
/* =========================
   RESPONSIVE MODAL
========================= */

@media (max-width: 992px) {

    .modal-box {
        width: 95%;
        flex-direction: column;
        border-radius: 20px;
    }

    .modal-left,
    .modal-right {
        width: 100%;
    }

    .modal-left {
        padding: 30px 20px;
        min-height: 250px;
    }

    .modal-left img {
        max-width: 220px;
    }

    .modal-right {
        padding: 30px 25px;
    }

    .modal-right h3 {
        font-size: 22px;
    }

    .modal-price {
        font-size: 22px;
    }

    .add-cart-btn {
        width: 100%;
    }

    .quantity-wrapper {
        justify-content: center;
    }

}


/* Extra Small Devices (Phones) */
@media (max-width: 576px) {

    .modal-box {
        width: 95%;
        max-height: 90vh;
        overflow-y: auto;
    }

    .modal-left {
        padding: 25px 15px;
        min-height: 200px;
    }

    .modal-left img {
        max-width: 180px;
    }

    .modal-right {
        padding: 25px 20px;
    }

    .modal-right h3 {
        font-size: 20px;
        text-align: center;
    }

    .modal-price {
        font-size: 20px;
        text-align: center;
    }

    .modal-right p {
        font-size: 14px;
        text-align: center;
    }

    .quantity-wrapper {
        justify-content: center;
        gap: 12px;
    }

    .quantity-wrapper button {
        width: 36px;
        height: 36px;
    }

    .modal-close {
        width: 34px;
        height: 34px;
        font-size: 16px;
    }
}
</style>
</section>
<script>
const modal = document.getElementById('productModal');
const modalName = document.getElementById('modalName');
const modalPrice = document.getElementById('modalPrice');
const modalDescription = document.getElementById('modalDescription');
const modalImage = document.getElementById('modalImage');
const qtyDisplay = document.getElementById('productQty');

let quantity = 1;
let selectedProductId = null;

document.querySelectorAll('.product-card').forEach(card => {

    card.addEventListener('click', function() {

        selectedProductId = this.dataset.id;

        modalName.innerText = this.dataset.name;
        modalPrice.innerText = "$" + this.dataset.price;
        modalDescription.innerText = this.dataset.description;
        modalImage.src = this.dataset.image;

        quantity = 1;
        qtyDisplay.innerText = quantity;

        modal.classList.add('active');
    });

});

// Close modal
document.querySelector('.modal-close').addEventListener('click', () => {
    modal.classList.remove('active');
});

document.querySelector('.modal-overlay').addEventListener('click', () => {
    modal.classList.remove('active');
});

// Quantity controls
document.getElementById('increaseQty').addEventListener('click', () => {
    quantity++;
    qtyDisplay.innerText = quantity;
});

document.getElementById('decreaseQty').addEventListener('click', () => {
    if(quantity > 1){
        quantity--;
        qtyDisplay.innerText = quantity;
    }
});


</script>
<script>
document.querySelector('.add-cart-btn').addEventListener('click', async function (e) {
    e.stopPropagation();

    if (!selectedProductId) return;

    try {
        const res = await fetch("{{ route('cart.add') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                product_id: selectedProductId,
                quantity: quantity
            })
        });

        const data = await res.json();

        if (data.success) {

    modal.classList.remove('active');

    // open cart drawer
    const cartDrawer = document.getElementById('cartDrawer');
    if (cartDrawer) cartDrawer.classList.add('active');

    // refresh cart items
    if (typeof loadCart === "function") loadCart();

    // update cart count
    const badge = document.getElementById('cartCount');
    if (badge && data.cartCount !== undefined) {
        badge.innerText = data.cartCount;
    }
}

    } catch (error) {
        console.error("Fetch error:", error);
    }
});
</script>