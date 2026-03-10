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

<!-- PRODUCT MODAL -->
<div id="productModal" class="product-modal">

<div class="modal-overlay"></div>

<div class="modal-box">

<span class="modal-close">x</span>

<div class="modal-inner">

<!-- LEFT SIDE -->
 
<div class="modal-options">

<div class="option-box">

<div class="option-header toggle-section">
<span>Complete with a Drink</span>
<span class="optional">(Optional) ▾</span>
</div>

<div class="option-body">


@foreach($addonGroups->firstWhere('name','Complete with a Drink')->addons ?? [] as $addon)
<div class="drink-item">

<div class="drink-left">

<img src="{{ $addon->image ? asset('storage/'.$addon->image) : asset('images/juice.png') }}">

<div>

<div class="drink-name">{{ $addon->name }}</div>

@if($addon->price)
<div class="drink-size">(+${{ number_format($addon->price,2) }})</div>
@endif

</div>

</div>

@if($addon->has_flavors)
<button type="button" class="drink-btn flavor-btn"
data-addon="{{ $addon->id }}"
data-price="{{ $addon->price }}">

Select Flavor ▾

</button>

<div class="flavor-dropdown" style="display:none">

@foreach($addon->flavors as $flavor)

<div class="flavor-item"
data-price="{{ $addon->price }}">

{{ $flavor->flavor }}

</div>

@endforeach

</div>

@else
<button type="button" class="drink-btn add-addon"
data-price="{{ $addon->price }}">
Add
</button>

@endif

</div>

@endforeach
</div>
</div>

<div class="option-collapse toggle-section">
Perfect Pairings
<span class="optional">(Optional) ▾</span>
</div>

<div class="option-body">
@foreach($addonGroups->firstWhere('name','Perfect Pairings')->addons ?? [] as $addon)

<div class="drink-item">

<div class="drink-left">

<img src="{{ $addon->image ? asset('storage/'.$addon->image) : asset('images/juice.png') }}">

<div>

<div class="drink-name">{{ $addon->name }}</div>

@if($addon->price)
<div class="drink-size">(+${{ number_format($addon->price,2) }})</div>
@endif

</div>

</div>

<button class="drink-btn add-addon"
data-price="{{ $addon->price }}">
Add
</button>

</div>

@endforeach
</div>


<div class="option-collapse toggle-section">Add some Dip
<span class="optional">(Optional) ▾</span>
</div>
<div class="option-body">
@foreach($addonGroups->firstWhere('name','Add some Dip')->addons ?? [] as $addon)

<div class="drink-item">

<div class="drink-left">

<img src="{{ $addon->image ? asset('storage/'.$addon->image) : asset('images/juice.png') }}">

<div>

<div class="drink-name">{{ $addon->name }}</div>

@if($addon->price)
<div class="drink-size">(+${{ number_format($addon->price,2) }})</div>
@endif

</div>

</div>

<button class="drink-btn add-addon"
data-price="{{ $addon->price }}">
Add
</button>

</div>

@endforeach
</div>
</div>


<!-- RIGHT SIDE -->
<div class="modal-product">

<img id="modalImage" class="modal-product-img">

<h2 id="modalName"></h2>

<p id="modalDescription"></p>

<div class="quantity-wrapper">
<button id="decreaseQty">-</button>
<span id="productQty">1</span>
<button id="increaseQty">+</button>
</div>

<div class="bucket-wrapper">

<div class="bucket-price" id="bucketPrice">$0.00</div>

<button class="add-cart-btn">
Add to Bucket
<span class="bucket-arrow">›</span>
</button>

</div>

</div>

</div>
</div>
</div>

<style>
  .product-modal{
position:fixed;
inset:0;
display:none;
align-items:center;
justify-content:center;
z-index:9999;
}

.product-modal.active{
display:flex;
}

.modal-overlay{
position:absolute;
inset:0;
background:rgba(0,0,0,0.65);
backdrop-filter:blur(5px);
}

.modal-box{
background: #FFF8F5;
width:900px;
max-width:96%;
border-radius:12px;
padding:28px;
position:relative;
box-shadow:0 30px 80px rgba(0,0,0,0.3);
}

.modal-inner{
display:flex;
gap:35px;

}

/* LEFT PANEL */

.modal-options{
width:50%;
margin-left:40px;
margin-top:30px;
}

.option-box{
background: #BB00001A;
border-radius:8px;
overflow:visible;
}

.option-header{
background:#c40000;
color:#fff;
padding:14px 16px;
font-weight:700;
display:flex;
justify-content:space-between;
}

.optional{
font-weight:400;
font-size:13px;
}

.drink-item{
display:flex;
justify-content:space-between;
align-items:center;
padding:6px 16px;
background:#fbeeee;
}

.drink-left{
display:flex;
gap:10px;
align-items:center;
}

.drink-left img{
width:24px;
}

.drink-name{
font-weight:600;
font-size:14px;
}

.drink-size{
font-size:12px;
color:#777;
}

.drink-btn{
background:#c40000;
border:none;
color:#fff;
padding:8px 14px;
border-radius:6px;
font-size:13px;
cursor:pointer;
}

.option-collapse{
margin-top:7px;
background:#c40000;
color:#fff;
padding:14px 16px;
border-radius:8px;
display:flex;
justify-content:space-between;
font-weight:600;
}

/* RIGHT PANEL */

.modal-product{
width:58%;
text-align:center;
padding:0 20px;
}

.modal-product-img{
width:230px;
margin:auto;
display:block;
}

.modal-product h2{
font-family:'Holtwood One SC';
font-size:42px;
margin-top:14px;
}

.modal-product p{
color:#444;
margin-top:8px;
font-size:15px;
}

/* QUANTITY */

.quantity-wrapper{
display:flex;
justify-content:center;
align-items:center;
gap:14px;
margin:22px 0;
}

.quantity-wrapper button{
width:42px;
height:42px;
border:1px solid #BB0000;
background:#fff;
font-size:20px;
border-radius:6px;
cursor:pointer;
}

#productQty{
font-weight:700;
}

/* ADD TO BUCKET */

.bucket-wrapper{
display:flex;
justify-content:center;
margin-top:10px;
}

.bucket-price{
background: #BB0000;
color:#fff;
padding:14px 22px;
font-weight:700;
border-radius:8px 0 0 8px;
}

.add-cart-btn{
background:#BB0000;
border:none;
color:#fff;
padding:14px 26px;
font-weight:700;
display:flex;
align-items:center;
gap:10px;
cursor:pointer;
border-radius:0 8px 8px 0;
}

.bucket-arrow{
width:28px;
height:28px;
background:#fff;
color:#c40000;
border-radius:50%;
display:flex;
align-items:center;
justify-content:center;
font-weight:700;
}

/* CLOSE BUTTON */

.modal-close{
position:absolute;
top:14px;
right:14px;
background:#c40000;
color:#fff;
width:32px;
height:32px;
border-radius:4px;
display:flex;
align-items:center;
justify-content:center;
cursor:pointer;
}
.flavor-dropdown{
background:#fff;
border:1px solid #ddd;
margin-top:4px;
}

.flavor-item{
padding:6px 10px;
cursor:pointer;
font-size:13px;
}

.flavor-item:hover{
background:#f4f4f4;
}


.drink-item{
position:relative;
}

.flavor-dropdown{
position:absolute;
right:16px;
top:100%;
width:180px;
background:#fff;
border:1px solid #ddd;
border-radius:6px;
margin-top:6px;
z-index:10;
}
.drink-item{
position:relative;
z-index:1;
}

.drink-item.open{
z-index:20;
}

.flavor-dropdown{
position:absolute;
right:16px;
top:calc(100% + -15px);
width:120px;
background:#fff;
border:1px solid #ddd;
border-radius:6px;
z-index:30;
box-shadow:0 8px 18px rgba(0,0,0,0.12);
}
.option-body{
display:none;
}

.option-box.active .option-body{
display:block;
}

.section.active + .option-body{
display:block;
}
</style>
</section>

<script>
    let selectedAddons = [];
const modal = document.getElementById('productModal');
const modalName = document.getElementById('modalName');
const modalDescription = document.getElementById('modalDescription');
const modalImage = document.getElementById('modalImage');
const qtyDisplay = document.getElementById('productQty');
const priceDisplay = document.getElementById('bucketPrice');

let quantity = 1;
let selectedProductId = null;
let productPrice = 0;

/* OPEN MODAL WHEN PRODUCT CLICKED */

document.querySelectorAll('.product-card').forEach(card => {

card.addEventListener('click', function(){

/* RESET ADDONS WHEN MODAL OPENS */
selectedAddons = [];
addonTotal = 0;

selectedProductId = this.dataset.id;

modalName.innerText = this.dataset.name;
modalDescription.innerText = this.dataset.description;
modalImage.src = this.dataset.image;

productPrice = parseFloat(this.dataset.price);

quantity = 1;
qtyDisplay.innerText = quantity;

updatePrice();

modal.classList.add('active');
// Open first section when modal opens
const firstBody = document.querySelector('.modal-options .option-body');
if (firstBody) {
    document.querySelectorAll('.option-body').forEach(el => el.style.display = 'none');
    firstBody.style.display = 'block';
}

});

});


/* CLOSE MODAL */

document.querySelector('.modal-close').onclick = ()=>{
modal.classList.remove('active');
}

document.querySelector('.modal-overlay').onclick = ()=>{
modal.classList.remove('active');
}


/* UPDATE PRICE FUNCTION */



/* QUANTITY CONTROLS */

document.getElementById('increaseQty').onclick = ()=>{
quantity++;
qtyDisplay.innerText = quantity;
updatePrice();
}

document.getElementById('decreaseQty').onclick = ()=>{
if(quantity > 1){
quantity--;
qtyDisplay.innerText = quantity;
updatePrice();
}
}


/* ADD TO CART */

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
quantity: quantity,
addons: selectedAddons
})
});

const data = await res.json();

if (data.success) {

modal.classList.remove('active');

const cartDrawer = document.getElementById('cartDrawer');
if (cartDrawer) cartDrawer.classList.add('active');

if (typeof loadCart === "function") loadCart();

const badge = document.getElementById('cartCount');
if (badge && data.cartCount !== undefined) {
badge.innerText = data.cartCount;
}

}

} catch (error) {
console.error("Fetch error:", error);
}

});
let addonTotal = 0;

/* OPEN FLAVOR DROPDOWN */
document.addEventListener('click', function(e){

const btn = e.target.closest('.flavor-btn');

if(btn){

e.preventDefault();
e.stopPropagation();

document.querySelectorAll('.flavor-dropdown').forEach(drop => {
    if(drop !== btn.closest('.drink-item').querySelector('.flavor-dropdown')){
        drop.style.display = 'none';
    }
});

document.querySelectorAll('.drink-item').forEach(item => {
    if(item !== btn.closest('.drink-item')){
        item.classList.remove('open');
    }
});

const parent = btn.closest('.drink-item');
const dropdown = parent.querySelector('.flavor-dropdown');

parent.classList.toggle('open');

dropdown.style.display =
dropdown.style.display === 'block'
? 'none'
: 'block';

}

});

/* SELECT FLAVOR */

document.addEventListener('click',function(e){

if(e.target.classList.contains('flavor-item')){

e.stopPropagation();


const price = parseFloat(e.target.dataset.price);

const addonName = e.target.closest('.drink-item')
.querySelector('.drink-name').innerText;

selectedAddons.push({
name: addonName,
price: price
});

addonTotal += price;
updatePrice();

}

});


/* ADD ADDON */

/* ADD ADDON */

document.addEventListener('click',function(e){

if(e.target.classList.contains('add-addon')){

const price = parseFloat(e.target.dataset.price);

const addonName = e.target.closest('.drink-item')
.querySelector('.drink-name').innerText;

selectedAddons.push({
name: addonName,
price: price
});

addonTotal += price;
updatePrice();

}

});

/* MODIFY ORIGINAL PRICE FUNCTION */

function updatePrice(){

const total = (productPrice + addonTotal) * quantity;

priceDisplay.innerText = "$" + total.toFixed(2);

}


document.querySelectorAll('.toggle-section').forEach(section => {

section.addEventListener('click', function(){

const body = this.nextElementSibling;

/* CLOSE ALL OTHER SECTIONS */
document.querySelectorAll('.option-body').forEach(el => {
if(el !== body){
el.style.display = "none";
}
});

/* TOGGLE CURRENT */
body.style.display =
body.style.display === "block"
? "none"
: "block";

});

});
</script>