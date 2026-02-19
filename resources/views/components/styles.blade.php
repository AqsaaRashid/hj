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
  max-width:1200px;
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
  gap:58px;
  list-style:none;
  margin-top:-60px;
  margin-left:230px;
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
  margin-left:120px;
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
    margin-left:-25px;
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
/* hero real */

.categories{
  padding:80px 0;
  background:#f3f1ee;
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


/* products */

.products{
  padding: 0;
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

/* what our customers say  real experience*/
.why-choose{
  background:#f3f1ee;
  padding:30px 0 80px;
  text-align:center;
}

.wc-container{
  max-width:1100px;
  margin:auto;
}

/* HEADER */
.wc-sub{
  display:block;
  color:#ff7d01;
  font-size:16px;
  margin-bottom:10px;
  font-weight:400;
}

.wc-header h2{
  font-family:'Holtwood One SC', serif;
  font-size:38px;
  margin:0 0 60px;
  color:#111;
}

.wc-header h2 span{
  color:#bb0000;
}

/* GRID */
.wc-grid{
  display:flex;
  justify-content:space-between;
  align-items:flex-start;
  margin-top:-30px;
}

/* ITEM */
.wc-item{
  width:33.33%;
}

.wc-item img{
  width:260px; /* adjust to match your image proportions */
  height:auto;
  margin-bottom:0px;
}

.wc-item h4{
  font-size:18px;
  font-weight:800;
  color:#111;
}

.wc-item p{
  font-size:16px;
  color: #333333;
  font-weight:800px;
  line-height:1.6;
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

</style>