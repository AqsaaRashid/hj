<section class="exclusive" id="savings">
  <div class="exclusive-wrapper">

    <!-- LEFT SIDE -->
    <div class="exclusive-left">

      <span class="sub">Big flavor, better prices.</span>
      <h2>EXCLUSIVE <span>SAVINGS</span></h2>
<div class="scroll-line">
    <div class="scroll-progress"></div>
</div>
      <div class="offers">
    @foreach($offers as $offer)
        <div class="offer-card {{ $offer->is_active ? 'active' : '' }}">
            <h4>{{ $offer->title }}</h4>
            <p>{{ $offer->description }}</p>
        </div>
    @endforeach
</div>
    </div>

    <!-- RIGHT SIDE -->
    <div class="exclusive-right">

      <!-- Smoke Background Image -->
      <img src="{{ asset('images/stars.png') }}" class="smoke-bg" alt="">

      <!-- Bowl Image -->
      <img src="{{ asset('images/meal.png') }}" class="food-img" alt="">

    </div>

  </div>
</section>
<script>
const offers = document.querySelector('.offers');
const progress = document.querySelector('.scroll-progress');
const line = document.querySelector('.scroll-line');

let isDragging = false;

const lineHeight = 150;
const progressHeight = 20;
const maxMove = lineHeight - progressHeight;

function updateProgress() {
    const scrollTop = offers.scrollTop;
    const scrollHeight = offers.scrollHeight - offers.clientHeight;
    const percent = scrollTop / scrollHeight;
    progress.style.transform = `translateY(${percent * maxMove}px)`;
}

offers.addEventListener('scroll', updateProgress);

progress.addEventListener('mousedown', function(e){
    isDragging = true;
    document.body.style.userSelect = "none";
});

document.addEventListener('mouseup', function(){
    isDragging = false;
    document.body.style.userSelect = "auto";
});

document.addEventListener('mousemove', function(e){
    if(!isDragging) return;

    const rect = line.getBoundingClientRect();
    let offsetY = e.clientY - rect.top;

    offsetY = Math.max(0, Math.min(offsetY, maxMove));

    const percent = offsetY / maxMove;
    const scrollHeight = offers.scrollHeight - offers.clientHeight;

    offers.scrollTop = percent * scrollHeight;
});
</script>