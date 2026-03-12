<link href="https://fonts.googleapis.com/css2?family=Holtwood+One+SC&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<section class="testimonials" id="testimonials">
  <div class="t-container">

    <div class="t-head">
      <div class="t-sub">Real Experiences from Guests</div>
      <h2 class="t-title">
        WHAT OUR <span class="t-red">CUSTOMERS SAY</span>
      </h2>
    </div>

    <div class="t-stage">

      <!-- orange background block -->
      <div class="t-orange"></div>

      <!-- cards row -->
      <div class="t-cards">
        <article class="t-card">
          <div class="t-stars">★★★★★</div>
          <p class="t-text">
            Absolutely loved the vibe! Watching the match live while enjoying the combo was the perfect experience.
            And the free drink made it even better!
          </p>
          <div class="t-footer">
            <div class="t-name">Sabo Masties</div>
            <div class="t-date">January 12, 2026</div>
          </div>
        </article>

        <article class="t-card">
          <div class="t-stars">★★★★★</div>
          <p class="t-text">
            Best place to dine in and catch the game live. The combos are worth it, and the free drink is a great bonus!
            An amazing atmosphere.
          </p>
          <div class="t-footer">
            <div class="t-name">Sam</div>
            <div class="t-date">February 08, 2026</div>
          </div>
        </article>

        <article class="t-card">
          <div class="t-stars">★★★★★</div>
          <p class="t-text">
            Great food, big screen, and an amazing atmosphere. It’s now my go-to place for live matches!
           The combos are worth it, and the service is always fast and friendly.
          </p>
          <div class="t-footer">
            <div class="t-name">Mansur</div>
            <div class="t-date">February 02, 2026</div>
          </div>
        </article>

      </div>

      <!-- nav buttons -->
      <div class="t-nav">
        <button class="t-btn t-btn-left" type="button" aria-label="Previous">
          <i class="bi bi-arrow-left"></i>
        </button>
        <button class="t-btn t-btn-right" type="button" aria-label="Next">
          <i class="bi bi-arrow-right"></i>
        </button>
      </div>

    </div>
  </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function(){

const cards = document.querySelectorAll(".t-card");
const next = document.querySelector(".t-btn-right");
const prev = document.querySelector(".t-btn-left");

const data = [
{
stars:"★★★★★",
text:"Absolutely loved the vibe! Watching the match live while enjoying the combo was the perfect experience. And the free drink made it even better!",
name:"Sabo Masties",
date:"January 12, 2026"
},
{
stars:"★★★★★",
text:"Best place to dine in and catch the game live. The combos are worth it, and the free drink is a great bonus! An amazing atmosphere.",
name:"Sam",
date:"February 08, 2026"
},
{
stars:"★★★★★",
text:"Great food, big screen, and an amazing atmosphere. It’s now my go-to place for live matches! The combos are worth it, and the service is always fast and friendly.",
name:"Mansur",
date:"February 02, 2026"
},
{
stars:"★★★★★",
text:"Amazing chicken and great service. Perfect place to enjoy food with friends while watching live sports.The combos are worth it,love it",
name:"Alex",
date:"March 10, 2026"
},
{
stars:"★★★★★",
text:"Love the crispy chicken sandwiches! The environment is energetic and the staff is always friendly. Perfect place to enjoy food.Everything was amazing",
name:"David",
date:"March 20, 2026"
}
];

let index = 0;

function render(){

cards.forEach((card,i)=>{

let item = data[index + i];
if(!item) return;

card.querySelector(".t-stars").textContent = item.stars;
card.querySelector(".t-text").textContent = item.text;
card.querySelector(".t-name").textContent = item.name;
card.querySelector(".t-date").textContent = item.date;

});

}

next.addEventListener("click", function(){

if(index < data.length - 3){
index++;
render();
}

});

prev.addEventListener("click", function(){

if(index > 0){
index--;
render();
}

});

render();

});
</script>