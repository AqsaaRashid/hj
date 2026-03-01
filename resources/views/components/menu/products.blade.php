<section class="products" style="margin-top:40px !important; margin-bottom:-40px;">
  <div class="container">

 

    <div class="products-grid">

      <!-- CARD -->

    @foreach($products as $product)
<div class="product-card"
     data-category="{{ strtolower($product->category->name) }}">

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
<style>
  .hidden-product {
  display: none !important;
}
  </style>