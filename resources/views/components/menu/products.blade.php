<section class="products" style="margin-top:40px !important; margin-bottom:-40px;">
  <div class="container">

 

    <div class="products-grid">

      <!-- CARD -->

    @foreach($products as $product)
<div class="product-card"
     data-category="{{ strtolower(trim($product->category->name)) }}">

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
<div class="productss-nav">
    <a href="#" class="btn-sides" data-filter="sides">
        <span class="arroww-left">←</span> Sides
    </a>

    <a href="#" class="btn-combos" data-filter="combos">
        Combos <span class="arroww-right">→</span>
    </a>
</div>

   

  </div>
</section>
<script>
document.querySelectorAll('[data-filter]').forEach(button => {

    button.addEventListener('click', function(e) {
        e.preventDefault();

        let filterValue = this.getAttribute('data-filter');
        let products = document.querySelectorAll('.product-card');

        products.forEach(product => {
            let category = product.getAttribute('data-category');

            if(category === filterValue) {
                product.classList.remove('hidden-product');
            } else {
                product.classList.add('hidden-product');
            }
        });
    });

});
</script>
<script>
window.addEventListener('categorySelected', function(event) {

    let selectedCategory = event.detail.category;
    let products = document.querySelectorAll('.product-card');

    products.forEach(product => {
        let productCategory = product.getAttribute('data-category');

        if(productCategory === selectedCategory) {
            product.classList.remove('hidden-product');
        } else {
            product.classList.add('hidden-product');
        }
    });

});
</script>
<script>
function filterProducts(selectedCategory) {

    let products = document.querySelectorAll('.product-card');

    products.forEach(product => {
        let productCategory = product.getAttribute('data-category');

        if(selectedCategory === "all" || productCategory === selectedCategory) {
            product.classList.remove('hidden-product');
        } else {
            product.classList.add('hidden-product');
        }
    });
}

window.addEventListener('categorySelected', function(event) {
    filterProducts(event.detail.category);
});

// 🔥 Auto-filter from URL on page load
document.addEventListener('DOMContentLoaded', function() {

    let params = new URLSearchParams(window.location.search);
    let categoryFromUrl = params.get('category');

    if(categoryFromUrl) {
        filterProducts(categoryFromUrl);
    }

});
</script>
<style>
  .hidden-product {
  display: none !important;
}
  </style>