
<!-- ===== TOP BAR ===== -->
<div class="top-bar">
  <div class="top-container">
    <div class="top-left">
      <span><i class="fa-solid fa-location-dot"></i> 252 Town Center Lane, Glendale Heights, Illinois 60139</span>
      <span><i class="fa-solid fa-envelope"></i> info@hangryjoesgh.com</span>
      <span><i class="fa-solid fa-phone"></i> (224) 653 8034</span>
    </div>

    <div class="top-right">
      <i class="fa-brands fa-linkedin-in"></i>
      <i class="fa-brands fa-instagram"></i>
      <i class="fa-brands fa-facebook-f"></i>
    </div>
  </div>
</div>

<!-- ===== NAVBAR ===== -->
<div class="navbar">
  <div class="nav-container">

    <!-- Logo -->
    <div class="logo">
      <img src="{{ asset('images/logo.png') }}"  alt="Logo">
    </div>

    <!-- Menu -->
    <ul class="nav-menu">
      <li><a href="{{'/'}}">HOME</a></li>
      <li><a href="{{'about'}}">ABOUT</a></li>
      <li><a href="{{'menu'}}">MENU</a></li>
      <li><a href="#">CONTACT</a></li>
    </ul>

    <!-- Right -->
    <div class="nav-right">
      <div class="icon-btn">
        <i class="fa-solid fa-magnifying-glass"></i>
      </div>

      <div class="icon-btn">
        <i class="fa-solid fa-cart-shopping"></i>
        <div class="cart-count">5</div>
      </div>

      <a href="#" class="order-btn">
        <i class="fa-solid fa-motorcycle"></i> ORDER NOW
      </a>
    </div>

  </div>
  
    <!-- LEFT FIRE -->
    <img src="{{ asset('images/left.png') }}" class="fire fire-left" alt="">

    <!-- RIGHT FIRE (same image, different class) -->
    <img src="{{ asset('images/left.png') }}" class="fire fire-right" alt="">

    <div class="hero-container">

        <div class="hero-content">
            <h5>Hangry Joe’s Glendale Heights</h5>

            <h1>
                WHERE <span>FLAVOR</span><br>
                MEETS FIRE!
            </h1>

            <ul class="hero-list">
                <li>HMS Certified</li>
                <li>Halal, Healthy & Fresh</li>
                <li>Perfect for Every Craving</li>
            </ul>

            <a href="#" class="hero-btn">Explore Menu</a>
        </div>

        <div class="hero-image">
            <img src="{{ asset('images/web.png') }}" alt="">
        </div>

    </div>
</div>