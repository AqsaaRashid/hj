<link href="https://fonts.googleapis.com/css2?family=Holtwood+One+SC&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>


/* POPUP OVERLAY */
.chat-popup-overlay{
  position:fixed;
  top:0;
  left:0;
  width:100%;
  height:100%;
  background:rgba(0,0,0,0.5);
  display:none;
  justify-content:center;
  align-items:center;
  z-index:9999;
}

.chat-popup-box{
  width:360px;
  background:#f4efed;
  border-radius:10px;
  overflow:hidden;
  font-family:'Poppins', sans-serif;
}

/* HEADER */
.chat-popup-header{
    font-family:'Holtwood One SC', serif;

  background: #BB0000;
  padding:18px;
  display:flex;
  justify-content:space-between;
  align-items:center;
}

.header-left{
  display:flex;
  align-items:center;
  gap:22px;
}

.header-logo{
  width:55px;
}

.chat-popup-header h3{
  margin:0;
  color:#fff;
  font-weight:100;
  font-size:17px;
}

.chat-popup-header h3 span{
  color: #F6C507;
}

.close-popup{
  color:#fff;
  margin-top:-16px !important;
  gap:20px;
  font-size:29px;
  cursor:pointer;
}

/* BODY */
.chat-popup-body{
  padding-top:20px;
  padding-right:50px;
  margin-bottom:-37px;

}

/* MESSAGE BLOCK */
.chat-message-wrapper{
  display:flex;
  align-items:flex-start;
  gap:12px;
  margin-bottom:20px;
}

.small-logo{
  width:60px;
  font-weight:bolder;
}

.chat-message{
  background: #F8DFDD;
  padding:15px;
  border-radius:10px;
  font-size:14px;
  flex:1;
}

/* OPTIONS OUTER BORDER BOX */
.chat-options-box{
  border:1px solid #ddd;
  padding:15px;
  max-width:280px;
  border-radius:6px;
  margin-left:70px;
  background:#f8f6f5;
}

/* INDIVIDUAL OPTION */
.chat-option{
  display:flex;
  align-items:center;
  gap:12px;
  padding:5px;
  border:1px solid #ddd;
  border-radius:4px;
  background:#fff;
  margin-bottom:12px;
  font-weight:500;
  cursor:pointer;
}

.chat-option:last-child{
  margin-bottom:0;
}

.chat-option i{
  color: #BB0000;
  font-size:18px;
}

/* POWERED BY */
.chat-powered{
  text-align:center;
  font-size:12px;
  margin-top:55px;     /* pushed more down */
  color:#666;
  display:flex;        /* same row */
  justify-content:center;
  align-items:center;
  gap:6px;
  margin-left:75px;
}

.powered-img{
  width:100px;
  margin-left:2px;
  vertical-align:middle;
}
/* ================= POPUP RESPONSIVE ================= */

@media (max-width: 768px){

  .chat-popup-box{
    width:90%;
    max-width:360px;
  }

  .chat-popup-body{
    padding:20px;
    margin-bottom:0;
  }

  .chat-options-box{
    margin:20px auto 0 auto;  /* center properly */
    max-width:100%;
  }

  .chat-powered{
    margin-left:0;
    margin-top:30px;
    flex-wrap:wrap;
  }

}

@media (max-width: 480px){

  .chat-popup-box{
    width:95%;
    border-radius:12px;
  }

  .header-logo{
    width:45px;
  }

  .chat-popup-header h3{
    font-size:15px;
  }

  .close-popup{
    font-size:24px;
  }

  .small-logo{
    width:45px;
  }

  .chat-message{
    font-size:13px;
    padding:12px;
  }

  .chat-option{
    font-size:14px;
    padding:8px;
  }

  .powered-img{
    width:80px;
  }

}
.map-logo{
  position: fixed;
  bottom: 20px;
  right: 20px;
}
  </style>
<section class="contact-section">

  <!-- TOP BLACK + MAP SPLIT -->
  <div class="contact-wrapper">

    <!-- LEFT BLACK SIDE -->
    <div class="contact-left">

      <span class="contact-sub">Ring for Cravings</span>
      <h2 class="contact-number">(224) 653 8034</h2>

      <div class="contact-info">

        <div class="info-block">
          <i class="bi bi-clock"></i>
          <div>
            <p>Mon–Wed: 11:00 AM – 9:00 PM</p>
            <p>Thurs & Sun: 11:00 AM – 10:00 PM</p>
            <p>Fri & Sat: 11:00 AM – 10:00 PM</p>
          </div>
        </div>

        <div class="info-block">
          <i class="bi bi-geo-alt"></i>
          <div>
            <p>252 Town Center Lane,</p>
            <p>Glendale Heights,</p>
            <p>Illinois 60139</p>
          </div>
        </div>

      </div>

      <div class="socials">
        <a href="https://www.linkedin.com/company/111384229/"><i class="bi bi-linkedin"></i></a>
        <a href="https://www.instagram.com/hangryjoes_gh/"><i class="bi bi-instagram"></i></a>
        <a href="https://www.facebook.com/HangryJoesGlendaleHeights"><i class="bi bi-facebook"></i></a>
      </div>

    </div>

    <!-- RIGHT MAP SIDE -->
    <div class="contact-map">
      <iframe 
        src="https://www.google.com/maps?q=Hangry+Joe's+Hot+Chicken+%26+Wings+Glendale+Heights&output=embed"
        loading="lazy">
      </iframe>
  <a href="javascript:void(0)" class="map-logo" id="openChatPopupMap">
  <img src="{{ asset('images/logoo.png') }}" alt="Hangry Joe's Logo" />
</a>
    </div>

  </div>


  <!-- RED CTA STRIP -->
  <div class="cta-strip">
    <h3>CRAVINGS CAN’T WAIT.</h3>
   <div class="app-buttons">
  <a href="#" class="app-btn google-play" aria-label="Get it on Google Play">
    <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Google Play Store" />
  </a>
  <a href="#" class="app-btn app-store" aria-label="Download on the App Store">
<img src="https://developer.apple.com/assets/elements/badges/download-on-the-app-store.svg" alt="Download on the App Store" />  </a>
</div>
  </div>


  <!-- FOOTER BOTTOM -->
  <div class="footer-bottom">
    <div class="footer-container">
      <p>All Rights Reserved @hangryjoe’s</p>

      <div class="footer-links">
        <a href="{{'menu'}}">Menu</a>
        <a href="#savings">Offers</a>
        <a href="{{'privacy'}}">Privacy Policy</a>
        <a href="#testimonials">Testimonials</a>
      </div>
    </div>
  </div>

<!-- CHAT POPUP -->
<div id="chatPopup" class="chat-popup-overlay">

  <div class="chat-popup-box">

    <!-- HEADER -->
    <div class="chat-popup-header">
      <div class="header-left">
        <img src="{{ asset('images/logoo.png') }}" class="header-logo">
        <h3>HAVE A <span>QUESTION?</span></h3>
      </div>
      <span class="close-popup" id="closeChatPopup">⌄</span>
    </div>

    <!-- BODY -->
    <div class="chat-popup-body">

      <!-- MESSAGE WITH SMALL LOGO -->
      <div class="chat-message-wrapper">
        <img src="{{ asset('images/logoo.png') }}" class="small-logo">
        <div class="chat-message">
          Choose a chat option to get <br>started.
        </div>
      </div>

      <!-- OPTIONS BOX -->
      <div class="chat-options-box">

        <div class="chat-option">
          <i class="bi bi-chat"></i>
          Chat via SMS/Email
        </div>

        <div class="chat-option">
          <i class="bi bi-chat-dots"></i>
          Chat via Live Chat
        </div>

      </div>

      <!-- POWERED BY IMAGE -->
      <div class="chat-powered">
        Powered by
        <img src="{{ asset('images/powered.png') }}" class="powered-img">
      </div>

    </div>

  </div>

</div>
</section>
<script>
const openBtn = document.getElementById("openChatPopup");       // (may or may not exist)
const openMapBtn = document.getElementById("openChatPopupMap"); // (exists in footer)
const popup = document.getElementById("chatPopup");
const closeBtn = document.getElementById("closeChatPopup");

function openPopup(){
  popup.style.display = "flex";
}

if(openBtn){
  openBtn.addEventListener("click", openPopup);
}

if(openMapBtn){
  openMapBtn.addEventListener("click", openPopup);
}

closeBtn.addEventListener("click", function(){
  popup.style.display = "none";
});

window.addEventListener("click", function(e){
  if(e.target === popup){
    popup.style.display = "none";
  }
});
</script>
