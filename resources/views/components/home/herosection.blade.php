
<section class="categories">
  <div class="container">

    <div class="categories-header">
      <div>
        <span class="sub-title">Explore our Best Categories</span>
        <h2>OUR <span>CATEGORIES</span></h2>
      </div>

      <div class="arrows">
        <div class="arrow arrow-light">
          <i class="bi bi-arrow-left"></i>
        </div>
        <div class="arrow arrow-dark">
          <i class="bi bi-arrow-right"></i>
        </div>
      </div>
    </div>

<div class="categories-grid" id="categoriesGrid">
  @foreach($categories as $index => $category)
  <div class="category-card {{ $index >= 4 ? 'hidden-category' : '' }}"
     data-index="{{ $index }}"
     data-category="{{ strtolower(trim($category->name)) }}">
    <div class="icon">
      <i class="{{ $category->icon_class }}"></i>
    </div>
    <div>
      <h4>{{ strtoupper($category->name) }}</h4>
      <p>{{ $category->menu_items_count }} Items</p>
    </div>
  </div>
  @endforeach
</div>

  </div>
</section>
<script>
let currentIndex = 0;
let visibleItems = 4;

const cards = document.querySelectorAll('.category-card');
const totalItems = cards.length;

function updateCategories() {
    cards.forEach((card, index) => {
        if (index >= currentIndex && index < currentIndex + visibleItems) {
            card.classList.remove('hidden-category');
        } else {
            card.classList.add('hidden-category');
        }
    });
}

document.querySelector('.arrow-dark').addEventListener('click', function() {
    if (currentIndex + visibleItems < totalItems) {
        currentIndex += visibleItems;
        updateCategories();
    }
});

document.querySelector('.arrow-light').addEventListener('click', function() {
    if (currentIndex - visibleItems >= 0) {
        currentIndex -= visibleItems;
        updateCategories();
    }
});
</script>
<script>
document.querySelectorAll('.category-card').forEach(card => {

    card.addEventListener('click', function() {

        let selectedCategory = this.getAttribute('data-category');

        // If we are NOT on /menu → go to menu
        if (!window.location.pathname.includes('/menu')) {
            window.location.href = "/menu?category=" + selectedCategory;
            return;
        }

        // If we ARE on menu → filter only
        window.history.pushState({}, '', '/menu?category=' + selectedCategory);

        let products = document.querySelectorAll('.product-card');

        products.forEach(product => {
            let category = product.getAttribute('data-category');

            if(category === selectedCategory) {
                product.classList.remove('hidden-product');
            } else {
                product.classList.add('hidden-product');
            }
        });

    });

});
</script>
<style>
  .hidden-category {
  display: none !important;
}
</style>