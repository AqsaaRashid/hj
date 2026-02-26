<style>
*{
  margin:0;
  padding:0;
  box-sizing:border-box;
}

body{
  font-family:'Poppins',sans-serif;
  background: #f3f1ee !important;
}

/* ===== TOP BAR ===== */
.top-bar{
  background: #BB0000;
  color:#fff;
  font-size:13px;
  padding:8px 0;
}

.top-container{
  max-width:1200px;
  margin:auto;
  display:flex;
  justify-content:space-between;
  align-items:center;
}

.top-left{
  display:flex;
  gap:25px;
  align-items:center;
}

.top-left span{
  display:flex;
  align-items:center;
  gap:6px;
}

.top-right{
  display:flex;
  gap:5px;
}

.top-right i{
  cursor:pointer;
  border :2px solid #fff;
  color: #BB0000;
  width:25px;
  height:25px;
  border-radius:50%;
  background-color: #fff;
  padding: 5px;
}

/* ===== NAVBAR ===== */
.navbar{
  background:linear-gradient(to bottom,#111,#000);
  padding:18px 0;
  z-index: 5;
  overflow: hidden !important;

}

.nav-container{
  display:flex;
  margin-top:-20px;
  align-items:center;
  justify-content:space-between;
  
}

/* Logo */
.logo img{
  height:150px;
  margin-left:10px;
}

/* Center Menu */
.nav-menu{
  display:flex;
  gap:48px;
  list-style:none;
  margin-top:-60px;
  margin-left:200px;
}

.nav-menu li a{
  text-decoration:none;
  color: #FFF8F5;
  font-weight:300;
  letter-spacing:0.5px;
  transition:0.3s;
}

.nav-menu li a:hover{
  color: #BB0000;
}

/* Right Section */
.nav-right{
  display:flex;
  align-items:center;
  gap:20px;
  margin-left:115px;
  margin-top:-70px;
}
.navv-right{
  display:flex;
  align-items:center;
  gap:20px;
  margin-left:130px;
  margin-top:-70px;
}


.icon-btn{
  color:#fff;
  font-size:12px;
  cursor:pointer;
  position:relative;
  border:2px solid #fff;   /* ← FIXED */
  border-radius:50%;
  width:35px;
  height:35px;
  display:flex;
  align-items:center;
  justify-content:center;
}


.cart-count{
  position:absolute;
  top:-8px;
  right:-10px;
  background:#BB0000;
  color:#fff;
  font-size:11px;
  width:18px;
  height:18px;
  border-radius:50%;
  display:flex;
  align-items:center;
  justify-content:center;
  font-weight:600;
}

/* Order Button */
.order-btn{
  background:#FF7D01;
  color:#fff;
  padding:7px 20px;
  border-radius:6px;
  text-decoration:none;
  font-weight:600;
  display:flex;
  align-items:center;
  gap:8px;
  transition:0.3s;
  white-space:nowrap;   /* ← prevents line break */
}


.order-btn:hover{
  background:#e66900;
}


/* heroooo */
.hero{
    position:relative;
    background: #000000;
    padding:160px 0 140px;
    overflow:hidden;
    margin-top:-170px;
}

/* Container */
.hero-container{
    max-width:1200px;
    margin:auto;
    display:flex;
    align-items:center;
    justify-content:space-between;
    position:relative;
    z-index:2;
    margin-top:-60px;
    overflow: hidden !important;
}

/* LEFT TEXT */
.hero-content{
    max-width:700px;
    color:#fff;
}

.hero-content h5{
    font-size:20px;
    font-weight:400;
    margin-bottom:20px;
    color:#ccc;
}

.hero-content h1{
    font-size:58px;
    font-family: 'Holtwood One SC', serif !important;
    line-height:1.05;
    font-weight:100;
    color:#fff;
}

.hero-content h1 span{
    color:#f7b500;
}

.hero-list{
    margin-top:30px;
    list-style:none;
}

.hero-list li{
    margin-bottom:18px;
    font-size:18px;
    padding-left:30px;
    position:relative;
    margin-left:2px;
}

.hero-list li::before{
    content:"✔";
    position:absolute;
    left:0;
    color: #000;
    border:2px solid #FFCE12;
    background: #FFCE12;
    width:25px;
    height:25px;
    border-radius:50%;
    font-weight:bold;

}

/* BUTTON */
.hero-btn{
    display:inline-block;
    margin-top:35px;
    background:#FF7D01;
    color:#fff;
    padding:7px 35px;
    border-radius:4px;
    text-decoration:none;
    font-weight:600;
    margin-left:10px;
}

/* RIGHT MAIN IMAGE */
.hero-image img{
    width:600px;
    filter:drop-shadow(0 30px 40px rgba(0,0,0,0.5));
}

/* SHARED FIRE STYLE */
.fire{
    position:absolute;
    width:929.5px;
    height:929.5px;
    opacity:0.6;
    z-index:1;
}

/* LEFT FIRE STYLE */
.fire-left{
    top:34px;
    left:-570px;
    transform:rotate(-51.21deg);
}

/* RIGHT FIRE STYLE */
.fire-right{
    top:-177px;
    left:995px;
    transform:rotate(97.49deg);
    overflow-x: hidden !important;
}


/* responsivness */
/* ============================= */
/* RESPONSIVE NAV + HERO FIX */
/* ============================= */

/* Large Tablets */
@media (max-width: 1200px){

  .nav-container{
    padding:0 20px;
    margin:0px !important;
  }

  .nav-menu{
    margin-left:0;
    margin-top:0;
    gap:30px;
  }

  .nav-right{
    margin-left:0;
    margin-top:0;
  }

  .hero-container{
    padding:0 20px;
    margin-left:0px !important;
  }

  .hero-image img{
    width:450px;
  }

}

/* Tablets */
@media (max-width: 992px){

  .top-container{
    flex-direction:column;
    gap:8px;
    text-align:center;
  }

  .top-left{
    flex-direction:column;
    gap:5px;
  }

  .nav-container{
    flex-direction:column;
    gap:15px;
    margin-top:0;

  }

  .logo img{
    height:110px;
  }

  .nav-menu{
    margin:0;
    gap:25px;
  }

  .nav-right{
    margin:0;
  }

  .hero-container{
    flex-direction:column;
    text-align:center;
    gap:40px;
    margin-left:160px !important;

  }

  .hero-content{
    max-width:100%;
  }

  .hero-content h1{
    font-size:45px;
  }

  .hero-list li{
    margin-left:0;
  }

  .hero-image img{
    width:380px;
  }

  .fire-left,
  .fire-right{
    display:none;
  }

}

/* Mobile */
@media (max-width: 768px){

  .nav-menu{
    flex-wrap:wrap;
    justify-content:center;
    gap:18px;
  }

  .nav-menu li a{
    font-size:14px;
  }

  .order-btn{
    padding:6px 14px;
    font-size:13px;
  }

  .hero{
    padding:120px 0 100px;
  }

  .hero-content h5{
    font-size:16px;
  }

  .hero-content h1{
    font-size:34px;
    line-height:1.2;
  }

  .hero-list li{
    font-size:15px;
  }

  .hero-btn{
    padding:8px 25px;
    font-size:14px;
  }

  .hero-image img{
    width:300px;
  }

}

/* Small Phones */
@media (max-width: 480px){

  .top-bar{
    font-size:11px;
  }

  .logo img{
    height:90px;
  }

  .nav-menu{
    gap:12px;
  }

  .hero-content h1{
    font-size:28px;
  }

  .hero-image img{
    width:240px;
  }

}
/* ================= MOBILE NAV FIX ================= */

@media (max-width: 768px){

  .navbar{
    padding:15px 0;
  }

  .nav-container{
    flex-direction:column;
    align-items:center;
    margin-top:0;
    gap:15px;
  }

  .logo img{
    height:90px;
    margin:0;
  }

  .nav-menu{
    margin:0;
    flex-wrap:wrap;
    justify-content:center;
    gap:18px;
  }

  .nav-menu li a{
    font-size:14px;
  }

  .nav-right{
    margin:0;
    gap:15px;
  }

  .icon-btn{
    width:32px;
    height:32px;
  }

  .order-btn{
    padding:6px 16px;
    font-size:13px;
  }

}
/* ================= MOBILE HERO FIX ================= */

@media (max-width: 768px){

  .hero-container{
    flex-direction:column;
    text-align:center;
    gap:40px;
    margin-top:20px;
    margin-left:40px !important;

  }

  .hero-content h5{
    font-size:16px;
  }

  .hero-content h1{
    font-size:32px;
    line-height:1.2;
  }

  .hero-list{
    padding:0;
  }

  .hero-list li{
    font-size:16px;
    margin-left:0;
    padding-left:35px;
  }

  .hero-image img{
    width:280px;
  }

  .fire-left,
  .fire-right{
    display:none;
  }

}
@media (max-width: 480px){

  .hero-content h1{
    font-size:26px;
  }

  .hero-image img{
    width:230px;
  }

}

/* ===================================== */
/* REMOVE NEGATIVE MARGINS ON RESPONSIVE */
/* ===================================== */

/* Tablet & Below */
@media (max-width: 992px){

  .nav-container{
    margin-top:0 !important;
  }

  .nav-menu{
    margin-top:0 !important;
    margin-left:0 !important;
  }

  .nav-right{
    margin-top:0 !important;
    margin-left:0 !important;
  }

  .hero-container{
    margin-top:0 !important;
  }

}

/* Mobile */
@media (max-width: 768px){

  .nav-container{
    flex-direction:column;
    align-items:center;
    gap:15px;
  }

  .nav-menu{
    justify-content:center;
  }

  .hero-container{
    flex-direction:column;
    gap:40px;
     text-align:center !important;
    margin-left:80px;
  }

}
/* FIX BROKEN LAPTOP RANGE */
@media (max-width: 1200px){

  .nav-container{
    margin-top:0 !important;
  }

  .nav-menu{
    margin-top:0 !important;
    margin-left:0 !important;
  }

  .nav-right{
    margin-top:0 !important;
    margin-left:0 !important;
  }

  .hero-container{
    margin-top:0 !important;
     text-align:center !important;
    margin-left:80px;
  }

}
/* ===================== */
/* STABILIZE NAV STRUCTURE */
/* ===================== */

/* DESKTOP LOCK */
@media (min-width:1201px){

  .nav-container{
    display:flex;
    align-items:center;
    justify-content:space-between;
  }

}
/* FIX BROKEN WIDTH ZONE (LAPTOP / SMALL DESKTOP) */
@media (max-width:1200px){

  .nav-container{
    margin-top:0 !important;
    padding:0 20px;
  }

  .nav-menu{
    margin:0 !important;
    gap:30px;
  }

  .nav-right{
    margin:0 !important;
  }

  .hero-container{
    margin-top:0 !important;
    padding:80px 20px 0;
     text-align:center !important;
    margin-left:80px;
  }

}
@media (max-width:992px){

  .nav-container{
    flex-direction:column;
    gap:20px;
  }

  .nav-menu{
    justify-content:center;
  }

  .hero-container{
    flex-direction:column;
    text-align:center !important;
    margin-left:80px;
    gap:40px;
  }

  .fire-left,
  .fire-right{
    display:none;
  }

}

/* hero real */

.categories{
  max-width:1150px;
  padding:80px 0 !important;
  background:#f3f1ee;
  margin-left:55px;
}

.categories-header{
  display:flex;
  justify-content:space-between;
  align-items:center;
  margin-bottom:40px;
}

.sub-title{
  color: #FF7D01;
  font-weight:400;
}

.categories-header h2{
  font-size:38px;
  font-weight:100;
  font-family: 'Holtwood One SC', serif !important;

}

.categories-header h2 span{
  color: #BB0000;
}

.categories-grid{
  display:grid;
  grid-template-columns:repeat(4,1fr);
  gap:25px;
}

.category-card{
  background: #BB0000;
  padding:20px;
  border-radius:4px;
  display:flex;
  align-items:center;
  gap:15px;
  color:#fff;
  cursor:pointer;
  transition:0.3s ease;
}

.category-card:hover{
  background: #FF7D01;
}

/* ICON CIRCLE */
.category-card .icon{
  width:50px;
  height:50px;
  border-radius:50%;
  background: #FFF8F54D;
  display:flex;
  align-items:center;
  justify-content:center;
}

.category-card .icon i{
  font-size:26px;
  color:#fff;
}

.category-card h4{
  margin:0;
  font-weight:700;
}

.category-card p{
  margin:0;
  font-size:14px;
  opacity:0.9;
}
.arrows{
  display:flex;
  gap:10px;
}

.arrow{
  width:40px;
  height:40px;
  border-radius:50%;
  display:flex;
  align-items:center;
  justify-content:center;
  cursor:pointer;
  transition:0.3s ease;
}

/* LEFT ARROW */
.arrow-light{
  background:#fff;
  border:1px solid #BB0000;
}

.arrow-light i{
  color: #BB0000;
  font-size:20px;
}

/* RIGHT ARROW */
.arrow-dark{
  background: #BB0000;
}

.arrow-dark i{
  color:#fff;
  font-size:20px;
}
/* ============================= */
/* RESPONSIVE - CATEGORIES */
/* ============================= */

/* Large Laptop (3 columns) */
@media (max-width:1200px){
  .categories{
    margin-left:0px !important;

  }
  .categories-grid{
    grid-template-columns:repeat(3,1fr);
  }
}

/* Tablet (2 columns) */
@media (max-width:992px){

  .categories-header{
    flex-direction:column;
    align-items:flex-start;
    gap:20px;
  }

  .categories-grid{
    grid-template-columns:repeat(2,1fr);
  }

}

/* Mobile (1 column) */
@media (max-width:576px){

  .categories{
    padding:60px 15px;
    margin-left:0px !important;

  }

  .categories-header{
    align-items:center;
    text-align:center;
  }

  .categories-grid{
    grid-template-columns:1fr;
  }

  .category-card{
    padding:18px;
  }

  .category-card .icon{
    width:45px;
    height:45px;
  }

}

/* reson */
.reasons{
  max-width: 1000px !important;
  padding:100px 0;
  margin-left:140px;
  background: #f3f1ee;
  margin-top:-70px;
}

.reasons-wrapper{
  display:flex;
  align-items:center;
  justify-content:space-between;
}






.reasons-right{
  width:50%;
  margin-left:20px;
}

.reasons-right h2{
  font-size:38px;
  font-weight:100;
    font-family: 'Holtwood One SC', serif !important;

}

.reasons-right h2 span{
  color:#BB0000;
}
.reasons-left{
  position:relative;
  width:50%;
  display:flex;
  justify-content:center;
  align-items:center;
}

.main-man{
  width:600px;   /* adjust based on your exact image */
  position:relative;
  z-index:2;
}

.shape-icon{
  position:absolute;
  width:99px;
  top:80px;   /* adjust to match your screenshot */
  left:-40px;
  z-index:3;
}

.features{
  display:grid;
  grid-template-columns:repeat(2,1fr);
  gap:25px;
  margin-top:30px;
}

.feature{
  display:flex;
  gap:15px;
  align-items:flex-start;
}

.feature img{
  width:40px;
}
/* Feature heading */
.feature h5{
  margin:0;
  font-weight:800;   /* make bold */
  font-size:19px;    /* adjust if needed */
}

/* Feature text */
.feature p{
  margin:4px 0 0;
  font-size:16px;    /* smaller text */
  color: #000000;
  line-height:1.4;
}


.yellow-btn{
  display:inline-block;
  margin-top:30px;
  background: #FFCE12;
  padding:12px 30px;
  border-radius:6px;
  color:#fff;
  text-decoration:none;
}

/* ================================= */
/* RESPONSIVE - REASONS SECTION */
/* ================================= */

/* Fix laptop width zone */
@media (max-width:1200px){

  .reasons{
    margin-left:0 !important;
    padding:80px 20px;
  }

  .main-man{
    width:450px;
  }

}

/* Tablet */
@media (max-width:992px){

  .reasons-wrapper{
    flex-direction:column;
    gap:50px;
  }

  .reasons-left,
  .reasons-right{
    width:100%;
  }

  .reasons-right{
    margin-left:0;
    text-align:center;
  }

  .features{
    grid-template-columns:1fr;
  }

  .main-man{
    width:380px;
  }

  .shape-icon{
    left:0;
  }

}

/* Mobile */
@media (max-width:576px){

  .reasons{
    padding:60px 15px;
    margin-top:0 !important;
  }

  .reasons-right h2{
    font-size:28px;
  }

  .description{
    font-size:14px;
  }

  .main-man{
    width:280px;
  }

  .shape-icon{
    width:70px;
    top:40px;
  }

  .feature{
    text-align:left;
  }

}

/* products */

.products{
  padding: 0;
  margin-left:55px;
  max-width:1150px;
  background:#f3f1ee;
  margin-top:-30px !important;
}

.section-title{
  text-align:center;
  margin-bottom:50px;
}

.section-title span{
  color:#ff7d01;
  font-weight:400;
}

.section-title h2{
  font-size:38px;
  font-weight:100;
  font-family: 'Holtwood One SC', serif !important;

}

.section-title h2 span{
  color:#BB0000;
}

.products-grid{
  display:grid;
  grid-template-columns:repeat(2,1fr);
  gap:20px;
}

/* CARD */
.product-card{
  background:#e9d8d3;
  padding:10px;
  border-radius:8px;
  display:flex;
  gap:20px;
  align-items:center;
  transition:0.3s ease;
  cursor:pointer;
}

.product-img{
  width:100px;
}

/* CONTENT */
.product-content{
  flex:1;
}

.top-row{
  display:flex;
  justify-content:space-between;
  align-items:center;
}

.product-content h4{
  margin:0;
  font-weight:900;
  font-size:17px !important;
}

.price{
  font-size:22px;
  font-weight:200;
  color:#BB0000;
  font-family: 'Holtwood One SC', serif !important;
  margin-right:25px;

}

.stars{
  color:#ffb400;
  font-size:14px;
  margin-top:-8px;

}

.product-content p{
  margin-top:10px;
  font-size:16px;
  color:#000;
}

/* 🔥 HOVER LIKE SECOND CARD */
.product-card:hover{
  background:#BB0000;
}

.product-card:hover h4,
.product-card:hover p{
  color:#fff;
}

.product-card:hover .price{
  color:#ffb400;
}
.product-card:hover{
  transform:translateY(-3px);
}
.explore-btn{
  display:inline-block;
  background:#ff7d01;
  color:#fff;
  padding:14px 40px;
  border-radius:6px;
  text-decoration:none;
  font-weight:600;
  transition:0.3s ease;
}

.explore-btn:hover{
  background:#e66f00;
}
.btn-wrapper{
  text-align:center;
  margin-top:40px;
  margin-bottom:2px;
}
/* ================================= */
/* RESPONSIVE - PRODUCTS SECTION */
/* ================================= */

/* Fix negative margin on smaller screens */
@media (max-width:1200px){
  .products{
    margin-top:0 !important;
    padding:40px 20px;
    margin-left:0px !important;

  }
}

/* Tablet */
@media (max-width:992px){

  .products-grid{
    grid-template-columns:1fr;  /* 1 column */
  }

  .product-card{
    flex-direction:row;
    align-items:center;
  }

}

/* Mobile */
@media (max-width:576px){

  .section-title h2{
    font-size:28px;
  }

  .product-card{
    flex-direction:column;   /* stack image + content */
    text-align:center;
    gap:15px;
    padding:20px;
  }

  .product-img{
    width:80px;
  }

  .top-row{
    flex-direction:column;
    gap:5px;
  }

  .price{
    margin-right:0;
  }

  .product-content p{
    font-size:14px;
  }

  .explore-btn{
    padding:12px 30px;
  }

}

/* savings */

.exclusive{
  padding:80px 0;
  background:#f3f1ee;
}

.exclusive-wrapper{
  width:1100px;      /* from your layout screenshot */
  height:290px;
  margin:auto;
  display:flex;
  border-radius:8px;
  overflow:hidden;
}

/* LEFT SIDE */
.exclusive-left{
  width:60%;
  background:#e9d8d3;
  padding:30px;
  position:relative;
}

/* Vertical Line */
.exclusive-left::before{
  content:"";
  position:absolute;
  left:50px;
  top:110px;
  width:4px;
  height:160px;
  background:#ccc;
}
.exclusive-left{
  position:relative;
}


/* Main grey vertical line */
.exclusive-left::before{
  content:"";
  position:absolute;
  left:50px;
  top:120px;
  width:4px;
  height:140px;
  background: #D9D9D9;
  border-radius:20px;
}

/* Top colored highlight */
.exclusive-left::after{
  content:"";
  position:absolute;
  left:50px;
  top:120px;
  width:4px;
  height:20px;        /* small top section */
  background: #B5B5B5; /* your orange */
  border-radius:20px;
}

.sub{
  color:#ff7d01;
  font-weight:400;
  margin-left:20px;


}

.exclusive-left h2{
    margin-left:20px;
  font-family: 'Holtwood One SC', serif !important;

  font-size:38px;
  font-weight:100;
  margin-bottom:20px;
}

.exclusive-left h2 span{
  color:#BB0000;
}

.offers{
  margin-left:42px;
  margin-top:-10px;
  display:flex;
  flex-direction:column;
  gap:10px;
}

/* Offer Cards */
.offer-card{
  padding:10px 10px;
  border-radius:8px;
  background:#f1ece9;
  transition:0.3s ease;
  cursor:pointer;
  max-width:420px;
}

.offer-card h4{
  margin:0 0 5px;
  font-weight:100;
  text-transform:uppercase;
    font-family: 'Holtwood One SC', serif !important;
font-size:20px !important;
  color: #FF7D01;
}

.offer-card p{
  margin:0;
}

.offer-card.active,
.offer-card:hover{
  background: #FFCE12;
}

.offer-card.active h4,
.offer-card:hover h4{
  color: #BB0000;
}

/* RIGHT SIDE */
.exclusive-right{
  width:40%;
  position:relative;
  background: #BB0000;   /* exact color from screenshot */
  border-top-right-radius:5px;
  border-bottom-right-radius:5px;
  overflow:hidden;
}

/* Smoke Layer */
.smoke-bg{
  position:relative;
  top:8%;
  left:0;
  width:100%;
  max-height:600px;
  object-fit:cover;
  opacity:0.9;
  z-index:1;
}

/* Bowl Image */
.food-img{
  position:absolute;
  width:525px;   /* exact from your screenshot */
  height:490px;
  left:45%;
  top:55%;
  transform:translate(-40%,-60%);
  z-index:2;
}
/* ================================= */
/* RESPONSIVE - EXCLUSIVE SECTION */
/* ================================= */

/* Fix large screen shrink zone */
@media (max-width:1200px){

  .exclusive-wrapper{
    width:100%;
    padding:0 20px;
  }

}

/* Tablet */
@media (max-width:992px){

  .exclusive-wrapper{
    flex-direction:column;
    height:auto;
  }

  .exclusive-left,
  .exclusive-right{
    width:100%;
  }

  .exclusive-left{
    padding:40px 30px;
  }

  .exclusive-right{
    height:350px;
    border-radius:0 0 8px 8px;
  }

  .food-img{
    width:350px;
    height:auto;
    left:50%;
    top:50%;
    transform:translate(-50%,-50%);
  }

  .smoke-bg{
    top:0;
  }

}

/* Mobile */
@media (max-width:576px){

  .exclusive{
    padding:60px 15px;
  }

  .exclusive-left h2{
    font-size:26px;
  }

  .offers{
    margin-left:0;
  }

  .exclusive-left::before,
  .exclusive-left::after{
    left:20px;
  }

  .food-img{
    width:260px;
  }

}

/* testimonials */

.testimonials{
  background:#f3f1ee; /* light beige */
  padding:20px 0 90px;
}

.t-container{
  max-width:1200px;
  margin:0 auto;
  padding:0 20px;
}

.t-head{
  text-align:center;
  margin-bottom:35px;
}

.t-sub{
  color:#ff7d01;
  font-weight:400;
  font-size:16px;
  margin-bottom:10px;
}

.t-title{
  font-family:"Holtwood One SC", serif;
  font-size:38px;
  line-height:1.1;
  margin:0;
  color:#111;
  letter-spacing:0.5px;
}

.t-title .t-red{
  color:#bb0000;
}

/* stage area */
.t-stage{
  position:relative;
  height:500px; /* controls the whole block height like screenshot */
  margin-top:-50px;
}

/* orange rectangle behind cards */
.t-orange{
  position:absolute;
  left:50%;
  transform:translateX(-50%);
  top:55px;
  width:860px;
  height:410px;
  background: #ff7d01;
  border-radius:2px;
  z-index:0;
}

/* cards row */
.t-cards{
  position:absolute;
  top:120px;                 /* cards sit inside orange block area */
  left:50%;
  transform:translateX(-50%);
  width:100%;
  max-width:1000px;
  display:flex;
  justify-content:space-between;
  gap:10px;
  z-index:2;
}

.t-card{
  width:310px;
  background:#fff;
  padding:28px 26px 22px;
  border-radius:2px;
  box-shadow:none;          /* screenshot looks flat */
}

.t-stars{
  color:#ffb400;
  letter-spacing:2px;
  font-size:14px;
  margin-bottom:14px;
}

.t-text{
  color:#333;
  font-size:13px;
  line-height:1.7;
  margin:0 0 22px;
}

.t-footer{
  margin-top:18px;
}

.t-name{
  font-weight:700;
  color:#222;
  font-size:13px;
  margin-bottom:4px;
}

.t-date{
  color:#888;
  font-size:11px;
}

/* nav at bottom center */
.t-nav{
  position:absolute;
  left:50%;
  transform:translateX(-50%);
  bottom:78px;
  background:#fff;
  border-radius:2px;
  padding:10px 12px;
  display:flex;
  gap:8px;
  z-index:3;
}

.t-btn{
  width:44px;
  height:34px;
  border:none;
  border-radius:2px;
  display:flex;
  align-items:center;
  justify-content:center;
  cursor:pointer;
}

.t-btn-left{
  background:#fff;
}

.t-btn-left i{
  color:#999;
  font-size:16px;
}

.t-btn-right{
  background:#111;
}

.t-btn-right i{
  color:#fff;
  font-size:16px;
}

/* responsive (keeps same vibe) */
@media (max-width:1100px){
  .t-orange{ width:90%; }
  .t-cards{ max-width:900px; }
  .t-card{ width:290px; }
}
@media (max-width:900px){
  .t-stage{ height:auto; }
  .t-orange{ position:relative; top:0; transform:none; left:auto; width:100%; height:260px; margin:30px 0 0; }
  .t-cards{ position:relative; top:-210px; transform:none; left:auto; flex-direction:column; align-items:center; }
  .t-nav{ position:relative; left:auto; transform:none; bottom:auto; margin:-170px auto 0; width:max-content; }
}
/* ================================= */
/* RESPONSIVE FIX – TESTIMONIALS */
/* ================================= */

/* Large screens safe scaling */
@media (max-width:1200px){
  .t-orange{
    width:95%;
  }

  .t-cards{
    max-width:95%;
  }
}

/* Tablet */
@media (max-width:992px){

  .t-stage{
    height:auto;
    margin-top:0;
  }

  .t-orange{
    position:relative;
    top:0;
    left:0;
    transform:none;
    width:100%;
    height:280px;
    margin-top:30px;
  }

  .t-cards{
    position:relative;
    top:-200px;
    left:0;
    transform:none;
    flex-direction:column;
    align-items:center;
    gap:20px;
  }

  .t-card{
    width:90%;
    max-width:500px;
  }

  .t-nav{
    position:relative;
    left:0;
    transform:none;
    bottom:auto;
    margin:-150px auto 0;
    width:max-content;
  }
}

/* Mobile */
@media (max-width:576px){

  .t-title{
    font-size:26px;
  }

  .t-sub{
    font-size:14px;
  }

  .t-orange{
    height:220px;
  }

  .t-cards{
    top:-160px;
  }

  .t-card{
    padding:20px;
  }

  .t-text{
    font-size:12px;
  }

  .t-nav{
    margin:-120px auto 0;
  }
}

/* moments */

.featured{
  background:#f3f1ee;
  padding-bottom:60px ;
  margin-top:-40px;
}

.f-container{
  max-width:1200px;
  margin:auto;
  display:flex;
  align-items:flex-start;
  justify-content:space-between;
  gap:60px;
}

/* LEFT SIDE */
.f-left{
  width:40%;
  padding-top:40px;
  margin-left:50px;
}

.f-sub{
  color:#ff7d01;
  font-size:16px;
  font-weight:400;
  display:block;
  margin-bottom:10px;
}

.f-title{
  font-family:'Holtwood One SC', serif;
  font-size:40px;
  line-height:1.1;
  color:#111;
  margin:0;
}

.f-title span{
  color:#bb0000;
}

/* RIGHT SIDE */
.f-right{
  width:60%;
  display:flex;
  gap:15px;
}

.f-img{
  width:38.33%;
  height:260px;              /* equal height */
  overflow:hidden;
  box-shadow:0 10px 20px rgba(0,0,0,0.08);
}

.f-img img{
  width:100%;
  height:100%;
  object-fit:cover;
  display:block;
}
/* ================================= */
/* RESPONSIVE – FEATURED SECTION */
/* ================================= */

/* Remove risky negative margin on smaller screens */
@media (max-width:1200px){
  .featured{
    margin-top:0;
  }
}

/* Tablet */
@media (max-width:992px){

  .f-container{
    flex-direction:column;
    gap:40px;
  }

  .f-left,
  .f-right{
    width:100%;
  }

  .f-left{
    margin-left:0;
    padding-top:0;
    text-align:center;
  }

  .f-title{
    font-size:32px;
  }

  .f-right{
    justify-content:center;
  }

  .f-img{
    height:220px;
  }

}

/* Mobile */
@media (max-width:576px){

  .f-title{
    font-size:26px;
  }

  .f-sub{
    font-size:14px;
  }

  .f-right{
    flex-direction:column;
    gap:20px;
  }

  .f-img{
    width:100%;
    height:220px;
  }

}

/* footer */

.contact-section{
  background:#f3f1ee;
}

/* BLACK + MAP SPLIT */
.contact-wrapper{
  display:flex;
  width:100%;
  max-width:1400px;
  margin:auto;
  height:420px;
}

/* LEFT BLACK SIDE */
.contact-left{
  width:50%;
  background:#000;
  color:#fff;
  padding:60px 50px;
  display:flex;
  flex-direction:column;
  justify-content:center;
}

.contact-sub{
  color:#ff7d01;
  font-weight:600;
  margin-bottom:10px;
}

.contact-number{
  font-size:38px;
  font-weight:800;
  margin-bottom:35px;
}

.contact-info{
  display:flex;
  flex-direction:column;
  gap:25px;
}

.info-block{
  display:flex;
  gap:15px;
  align-items:flex-start;
}

.info-block i{
  font-size:24px;
  color:#bb0000;
}

.info-block p{
  margin:2px 0;
  font-size:14px;
  color:#ccc;
}

/* SOCIAL ICONS */
.socials{
  margin-top:30px;
  display:flex;
  gap:15px;
}

.socials a{
  width:35px;
  height:35px;
  border-radius:50%;
  background:#fff;
  display:flex;
  align-items:center;
  justify-content:center;
  color:#bb0000;
  font-size:16px;
  transition:0.3s;
}

.socials a:hover{
  background:#bb0000;
  color:#fff;
}

/* MAP SIDE */
.contact-map{
  width:50%;
}

.contact-map iframe{
  width:100%;
  height:100%;
  border:none;
}


/* RED STRIP */
.cta-strip{
  background:#bb0000;
  color:#fff;
  display:flex;
  justify-content:space-between;
  align-items:start !important;
  padding:10px 120px;
}

.cta-strip h3{
  font-family:'Holtwood One SC', serif;
  font-size:34px;
  margin-left:-75px !important;
}

.cta-btn{
  border:1px solid #fff;
  padding:8px 50px;
  border-radius:4px;
  color:#fff;
  text-decoration:none;
  transition:0.3s;
  margin-right:90px !important;
}

.cta-btn:hover{
  background:#fff;
  color:#bb0000;
}


/* FOOTER BOTTOM */
.footer-bottom{
  background:#e9e5e1;
  padding:0px 0;
}

.footer-container{
  max-width:1200px;
  margin:auto;
  display:flex;
  justify-content:space-between;
  align-items:center;
}
.footer-container p{
  margin-left:15px;
}

.footer-links{
  display:flex;
  gap:30px;
}

.footer-links a{
  color:#333;
  text-decoration:none;
  font-size:14px;
}
.app-buttons {
  display: flex;
  gap: 12px;
  margin-right: 20px !important; /* keep existing margin */
}

.app-btn img {
  height: 40px;
  width: auto;
  display: block;
  object-fit: contain;
}
.contact-map {
  position: relative; /* ensure positioning context */
}

.map-logo {
  position: absolute;
  bottom:-15px;
  right: 0px;
  width: 150px;    /* adjust size as needed */
  height:150px;
  border-radius: 50%;
  overflow: hidden;
  cursor: pointer;
  z-index: 10;
  display: flex;
  justify-content: center;
  align-items: center;
}

.map-logo img {
  width: 70%;
  height: 70%;
  object-fit: contain;
}
/* ================================= */
/* RESPONSIVE – CONTACT SECTION */
/* ================================= */

/* Remove fixed height below large screens */
@media (max-width:1200px){
  .contact-wrapper{
    height:auto;
  }
}

/* Tablet */
@media (max-width:992px){

  .contact-wrapper{
    flex-direction:column;
  }

  .contact-left,
  .contact-map{
    width:100%;
  }

  .contact-left{
    padding:50px 30px;
  }

  .contact-map{
    height:350px;
  }

  .cta-strip{
    flex-direction:column;
    align-items:center !important;
    gap:20px;
    padding:30px 20px;
    text-align:center;
  }

  .cta-strip h3{
    margin-left:0 !important;
    font-size:26px;
  }

  .cta-btn{
    margin-right:0 !important;
  }

  .footer-container{
    flex-direction:column;
    gap:15px;
    padding:20px;
    text-align:center;
  }

}

/* Mobile */
@media (max-width:576px){

  .contact-number{
    font-size:28px;
  }

  .contact-left{
    padding:40px 20px;
  }

  .info-block{
    flex-direction:column;
    gap:8px;
  }

  .socials{
    justify-content:center;
  }

  .footer-links{
    flex-wrap:wrap;
    justify-content:center;
    gap:15px;
  }

}

/* aboutuapage */
.firee{
    position:absolute;
    width:929.5px;
    height:929.5px;
    opacity:0.6;
    z-index:1;
}

/* LEFT FIRE STYLE */
.firee-left{

    top:-214px;
    left:-530px;
    transform:rotate(-152.21deg);
}
.firee{
    pointer-events:none;   /* 🔥 THIS FIXES IT */
}

/* RIGHT FIRE STYLE */
.firee-right{
    top:-187px;
    left:885px;
    transform:rotate(97.49deg);
    overflow-x: hidden !important;
}

.breadcrumb{
    font-size:18px;
    color: #FFF8F5;
    margin-left:140px;
    margin-bottom:50px;
}

.breadcrumb a{
    color:#FFF8F5;
    text-decoration:none;
    transition:0.3s;
}

.breadcrumb a:hover{
    color: #fff;
}

.breadcrumb span{
    margin:0 2px;
}

.breadcrumb .current{
    color:#fff;
}
/* ================================= */
/* RESPONSIVE – ABOUT HERO FIRE + BREADCRUMB */
/* ================================= */

/* Large screens scaling */
@media (max-width:1200px){

  .firee{
    width:700px;
    height:700px;
  }

  .firee-left{
    left:-420px;
  }

  .firee-right{
    left:auto;
    right:-420px;
  }

  .breadcrumb{
    margin-left:80px;
  }

}

/* Tablet */
@media (max-width:992px){

  .firee{
    width:500px;
    height:500px;
    opacity:0.4;
  }

  .firee-left{
    top:-150px;
    left:-300px;
  }

  .firee-right{
    top:-150px;
    right:-300px;
    left:auto;
  }

  .breadcrumb{
    margin-left:0;
    text-align:center;
    font-size:16px;
  }

}

/* Mobile */
@media (max-width:576px){

  .firee{
    width:350px;
    height:350px;
    opacity:0.3;
  }

  .firee-left{
    top:-100px;
    left:-200px;
  }

  .firee-right{
    top:-120px;
    right:-200px;
  }

  .breadcrumb{
    font-size:14px;
    margin-bottom:30px;
  }

}

/* happycustomers */

.happy-customers{
  background:#f3f1ee;
  padding:40px 0;
  margin-left:300px;
  margin-top:-80px;
}

.hc-container{
  max-width:1200px;
  margin:auto;
  display:flex;
  align-items:center;
  gap:20px;
}

/* CIRCULAR IMAGES */
.hc-images{
  display:flex;
  align-items:center;
}

.hc-images img{
  width:90px;
  height:90px;
  border-radius:50%;
  object-fit:cover;
  border:3px solid #fff;
  box-shadow:0 5px 15px rgba(0,0,0,0.08);
}

/* Overlap Effect */
.hc-images img:nth-child(2){
  margin-left:-25px;
}

.hc-images img:nth-child(3){
  margin-left:-25px;
}

/* TEXT SIDE */
.hc-content h2{
  font-family:'Holtwood One SC', serif;
  font-size:30px;
  color:#111;
}

.hc-content h2 span{
  color:#bb0000;
}

/* RATING */
.hc-rating{
  display:flex;
  align-items:center;
  gap:8px;
}

.hc-rating i{
  color:#ffb400;
  font-size:18px;
}

.rating-number{
  font-size:18px;
  font-weight:600;
  color:#111;
}

.rating-count{
  font-size:16px;
  color:#888;
}

/* ================================= */
/* RESPONSIVE – HAPPY CUSTOMERS */
/* ================================= */

/* Remove dangerous margins on smaller screens */
@media (max-width:1200px){
  .happy-customers{
    margin-left:0;
    margin-top:0;
    padding:60px 20px;
  }
}

/* Tablet */
@media (max-width:992px){

  .hc-container{
    flex-direction:column;
    text-align:center;
    gap:30px;
  }

  .hc-images{
    justify-content:center;
  }

  .hc-content h2{
    font-size:26px;
  }

}

/* Mobile */
@media (max-width:576px){

  .hc-images img{
    width:70px;
    height:70px;
  }

  .hc-images img:nth-child(2),
  .hc-images img:nth-child(3){
    margin-left:-18px;
  }

  .hc-content h2{
    font-size:22px;
  }

  .rating-number{
    font-size:16px;
  }

  .rating-count{
    font-size:14px;
  }

}

/* what our customers say  real experience*/

.whyy-choose{
  background:#f3f1ee;
  padding:30px 0 80px;
  text-align:center;
}

.wcc-container{
  max-width:1100px;
  margin:auto;
}

/* HEADER */
.wcc-sub{
  display:block;
  color:#ff7d01;
  font-size:16px;
  margin-bottom:10px;
  font-weight:400;
}

.wcc-header h2{
  font-family:'Holtwood One SC', serif;
  font-size:38px;
  margin:0 0 60px;
  color:#111;
}

.wcc-header h2 span{
  color:#bb0000;
}

/* GRID */
.wcc-grid{
  display:flex;
  justify-content:space-between;
  align-items:flex-start;
  margin-top:-30px;
  margin-left:40px;
}

/* ITEM */
.wcc-item{
  width:33.33%;
}

.wcc-item img{
  width:260px; /* adjust to match your image proportions */
  height:auto;
  margin-bottom:0px;
}

.wcc-item h4{
  font-size:18px;
  font-weight:800;
  color:#111;
}

.wcc-item p{
  font-size:16px;
  color: #333333;
  font-weight:800px;
  line-height:1.6;
}

/* ================================= */
/* RESPONSIVE – WHY CHOOSE SECTION */
/* ================================= */

/* Remove negative margin below desktop */
@media (max-width:1200px){
  .wcc-grid{
    margin-top:0;
  }
}

/* Tablet */
@media (max-width:992px){

  .wcc-grid{
    flex-wrap:wrap;
    gap:40px;
    justify-content:center;
  }

  .wcc-item{
    width:45%;
  }

  .wcc-item img{
    width:200px;
  }

  .wcc-header h2{
    font-size:30px;
  }

}

/* Mobile */
@media (max-width:576px){

  .wcc-grid{
    flex-direction:column;
    gap:40px;
  }

  .wcc-item{
    width:100%;
  }

  .wcc-item img{
    width:180px;
  }

  .wcc-header h2{
    font-size:24px;
  }

  .wcc-sub{
    font-size:14px;
  }

  .wcc-item h4{
    font-size:16px;
  }

  .wcc-item p{
    font-size:14px;
  }

}

/* video section */

.video-section{
  background:#f3f1ee;     /* same beige background */
  padding:20px 0;
  display:flex;
  justify-content:center;
  margin-top:-50px;
}

.video-wrapper{
  position:relative;
  width:950px;          /* match screenshot width */
  height:400px;          /* adjust to your image ratio */
  overflow:hidden;
}

.video-bg{
  width:100%;
  height:100%;
  object-fit:cover;
  display:block;
}

/* dark subtle overlay */
.video-overlay{
  position:absolute;
  top:0;
  left:0;
  width:100%;
  height:100%;
  background: rgba(0,0,0,0.6);  /* #000000 at 60% */
}


/* PLAY BUTTON */
.play-btn{
  position:absolute;
  top:50%;
  left:50%;
  transform:translate(-50%, -50%);
  width:70px;
  height:70px;
  background:#fff;
  border-radius:50%;
  display:flex;
  align-items:center;
  justify-content:center;
  cursor:pointer;
  transition:0.3s ease;
  z-index:2;
}

.play-btn:hover{
  transform:translate(-50%, -50%) scale(1.05);
}

/* red triangle */
.triangle{
  width:0;
  height:0;
  border-left:18px solid #bb0000;
  border-top:12px solid transparent;
  border-bottom:12px solid transparent;
  margin-left:4px;
}
/* ================================= */
/* RESPONSIVE – VIDEO SECTION */
/* ================================= */

/* Fluid width below large desktop */
@media (max-width:1200px){

  .video-section{
    margin-top:0;
    padding:40px 20px;
  }

  .video-wrapper{
    width:100%;
    max-width:950px;
  }

}

/* Tablet */
@media (max-width:992px){

  .video-wrapper{
    height:auto;
    aspect-ratio: 16 / 9;   /* keeps perfect ratio */
  }

  .play-btn{
    width:60px;
    height:60px;
  }

  .triangle{
    border-left:15px solid #bb0000;
    border-top:10px solid transparent;
    border-bottom:10px solid transparent;
  }

}

/* Mobile */
@media (max-width:576px){

  .video-wrapper{
    aspect-ratio: 16 / 9;
  }

  .play-btn{
    width:50px;
    height:50px;
  }

  .triangle{
    border-left:12px solid #bb0000;
    border-top:8px solid transparent;
    border-bottom:8px solid transparent;
  }

}

/* menuuu */

.breaddcrumb{
    font-size:18px;
    color: #FFF8F5;
    margin-left:60px;
    margin-bottom:50px;
}

.breaddcrumb a{
    color:#FFF8F5;
    text-decoration:none;
    transition:0.3s;
}

.breaddcrumb a:hover{
    color: #fff;
}

.breaddcrumb span{
    margin:0 2px;
}

.breaddcrumb .current{
    color:#fff;
}

/* ================================= */
/* RESPONSIVE – ABOUT HERO FIRE + BREADCRUMB */
/* ================================= */

/* Large screens scaling */
@media (max-width:1200px){


  .breaddcrumb{
    margin-left:80px;
  }

}

/* Tablet */
@media (max-width:992px){



  .breaddcrumb{
    margin-left:0;
    text-align:center;
    font-size:16px;
  }

}

/* Mobile */
@media (max-width:576px){

 
  .breaddcrumb{
    font-size:14px;
    margin-bottom:30px;
  }

}

/* products */
.productss-nav{
    display:flex;
    justify-content:center;
    gap:20px;
    margin-top:30px;
    margin-bottom:40px;
}

/* BOTH BUTTON BASE */
.productss-nav a{
    padding:8px 30px;
    border-radius:4px;
    font-weight:600;
    text-decoration:none;
    font-size:16px;
    display:flex;
    align-items:center;
    gap:5px;
    transition:0.3s ease;
}

/* LEFT YELLOW BUTTON */
.btn-sides{
    background:#F6C507;
    color:#fff;
    padding:8px 36px !important; 

}

.btn-sides:hover{
    background:#e6b800;
}

/* RIGHT ORANGE BUTTON */
.btn-combos{
    background: #FF7D01;
    color:#fff;
}

.btn-combos:hover{
    background:#e66f00;
}

/* ARROWS */
.arroww-left,
.arroww-right{
    font-size:22px;
    width:20px;
}
/* policy */
.breadddcrumb{
    font-size:18px;
    color: #FFF8F5;
    margin-left:230px;
    margin-bottom:50px;
}

.breadddcrumb a{
    color:#FFF8F5;
    text-decoration:none;
    transition:0.3s;
}

.breadddcrumb a:hover{
    color: #fff;
}

.breadddcrumb span{
    margin:0 2px;
}

.breadddcrumb .current{
    color:#fff;
}

/* ================================= */
/* RESPONSIVE – ABOUT HERO FIRE + BREADCRUMB */
/* ================================= */

/* Large screens scaling */
@media (max-width:1200px){


  .breadddcrumb{
    margin-left:80px;
  }

}

/* Tablet */
@media (max-width:992px){



  .breadddcrumb{
    margin-left:0;
    text-align:center;
    font-size:16px;
  }

}

/* Mobile */
@media (max-width:576px){

 
  .breadddcrumb{
    font-size:14px;
    margin-bottom:30px;
  }

}
/* contactus */

.breaddddcrumb{
    font-size:18px;
    color: #FFF8F5;
    margin-left:120px;
    margin-bottom:50px;
}

.breaddddcrumb a{
    color:#FFF8F5;
    text-decoration:none;
    transition:0.3s;
}

.breaddddcrumb a:hover{
    color: #fff;
}

.breaddddcrumb span{
    margin:0 2px;
}

.breaddddcrumb .current{
    color:#fff;
}

/* ================================= */
/* RESPONSIVE – ABOUT HERO FIRE + BREADCRUMB */
/* ================================= */

/* Large screens scaling */
@media (max-width:1200px){


  .breaddddcrumb{
    margin-left:80px;
  }

}

/* Tablet */
@media (max-width:992px){



  .breaddddcrumb{
    margin-left:0;
    text-align:center;
    font-size:16px;
  }

}

/* Mobile */
@media (max-width:576px){

 
  .breaddddcrumb{
    font-size:14px;
    margin-bottom:30px;
  }

}
/* contactblade.. */

/* MAIN WRAPPER */
.contactt-wrapper{
    width:1100px;
    background: #e4ceca;  /* FULL PINK */
    margin-left:80px;
    padding-left:10px;
    margin-top:60px;
    margin-bottom:60px;
    border-radius:12px;

}

.contactt-inner{
    max-width:1100px;
    margin:0 auto;
    display:flex;
    border-radius:12px;
    overflow:hidden;
    box-shadow:0 20px 60px rgba(0,0,0,0.08);
}

/* LEFT SIDE */
.contactt-left{
    width:42%;
    background: #BB0000;
    color: #fff;
    padding:40px 40px;
    display:flex;
    border-radius:12px;
    flex-direction:column;
    margin-top:5px;
    margin-bottom:5px;

    justify-content:space-between;
}

.contactt-left h3{
    font-family:'Holtwood One SC', serif;
    font-size:22px;
    margin-bottom:10px;
}

.contactt-left p{
    font-size:14px;
    opacity:0.9;
    margin-bottom:40px;
    color:#C9C9C9;
}

.contactt-info{
    display:flex;
    flex-direction:column;
    gap:35px;
        color:#C9C9C9;

}

.contactt-info div{
    display:flex;
    gap:15px;
    align-items:flex-start;
    font-size:15px;
        color:#C9C9C9;

}

.contactt-info i{

    font-size:18px;
    margin-top:3px;
    color: #fff
}
.neww{
  margin-top:110px;
}

.social{
    margin-top:90px;
    display:flex;
    gap:15px;
}

.social i{
    background:#fff;
    color:#c40000;
    width:35px;
    height:35px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:14px;
    cursor:pointer;
}

/* RIGHT SIDE */
.contactt-right{
    width:58%;
    padding:50px 60px;
}
.form-row{
    display:flex;
    gap:40px;
    margin-bottom:30px;
}

.form-group{
    width:100%;
    display:flex;
    flex-direction:column;
}

.form-group label{
    font-size:12px;
    margin-bottom:8px;
    color:#555;
}

.form-group input{
    border:none;
    border-bottom:2px solid #999;
    background:transparent;
    padding:8px 0;
    font-size:14px;
    outline:none;
}

.subject{
    margin-bottom:30px;
}

.subject label{
    font-size:13px;
    margin-bottom:10px;
    display:block;
}

.subject-options{
    display:flex;
    gap:20px;
    font-size:14px;
    color:#444;
}

.subject-options input{
    margin-right:5px;
}
.subject-options input[type="radio"]{
    accent-color: #000;   /* black radio */
    width:14px;
    height:14px;
}
.message{
    margin-bottom:40px;
}

.message textarea{
    width:100%;
    border:none;
    border-bottom:2px solid #999;
    background:transparent;
    resize:none;
    padding:8px 0 2px 0;   /* less bottom padding */
    height:40px;
    outline:none;
    font-size:14px;
}

/* BUTTON */
.send-btn{
    background:#FF7D01;
    color:#fff;
    border:none;
    padding:14px 40px;
    border-radius:6px;
    font-size:14px;
    cursor:pointer;
    float:right;
}

.send-btn:hover{
    opacity:0.9;
}

/* RESPONSIVE */
@media(max-width:992px){
    .contactt-wrapper{
        flex-direction:column;
    }
    .contactt-left,
    .contactt-right{
        width:100%;
    }
    .form-row{
        flex-direction:column;
        gap:20px;
    }
}
@media (max-width:1200px){
    .contactt-wrapper{
        width:95%;
        margin-left:auto;
        margin-right:auto;
    }
}
@media(max-width:992px){

    .contactt-wrapper{
        width:95%;
        margin:60px auto;
        padding-left:0;
    }

    .contactt-inner{
        flex-direction:column;
    }

    .contactt-left,
    .contactt-right{
        width:100%;
    }

    .contactt-left{
        border-radius:12px 12px 0 0;
    }

    .contactt-right{
        border-radius:0 0 12px 12px;
        padding:40px 30px;
    }

    .form-row{
        flex-direction:column;
        gap:20px;
    }

    .social{
        margin-top:40px;
    }
}
@media(max-width:576px){

    .contactt-wrapper{
        width:92%;
        margin:40px auto;
    }

    .contactt-left{
        padding:30px 25px;
    }

    .contactt-right{
        padding:30px 25px;
    }

    .subject-options{
        flex-direction:column;
        gap:10px;
    }

    .send-btn{
        width:100%;
        float:none;
    }
}

/* faqs */


.breeaddcrumb{
    font-size:18px;
    color: #FFF8F5;
    margin-left:40px;
    margin-bottom:50px;
    margin-top:10px;
}

.breeaddcrumb a{
    color:#FFF8F5;
    text-decoration:none;
    transition:0.3s;
}

.breeaddcrumb a:hover{
    color: #fff;
}

.breeaddcrumb span{
    margin:0 2px;
}

.breeaddcrumb .current{
    color:#fff;
}
@media (max-width:1200px){


 .breeaddcrumb{
    margin-left:80px;
  }

}

/* Tablet */
@media (max-width:992px){



.breeaddcrumb{
    margin-left:0;
    text-align:center;
    font-size:16px;
  }

}

/* Mobile */
@media (max-width:576px){

 
  .breeaddcrumb{
    font-size:14px;
    margin-bottom:30px;
  }

}

/* ... */

</style>
