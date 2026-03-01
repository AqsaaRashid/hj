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
<div class="product-card">
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
</section>







