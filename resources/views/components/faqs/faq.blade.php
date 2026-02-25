
<style>

.sectionn{
  display:flex;
  justify-content:space-between;
  padding:50px;
  margin-left:80px;
}

/* LEFT SIDE */
.leftt{
  width:40%;
  position:relative;
  padding-left:30px;
}

/* vertical line */
.leftt::before{
  content:"";
  position:absolute;
  left:0;
  top:0;
  height:96%;
  width:3px;
  background:#cfcfcf;
}
.leftt::after{
  content:"";
  position:absolute;
  left:0;
  top:0;
  height:80px;
  width:3px;
  background:#B5B5B5;
}

.accordion-item{
  margin-bottom:20px;
  border-radius:8px;
}

.accordion-header{
 border-radius: 8px 8px 0 0; /* rounded top corners */

  background:#e7cfcf; /* pink default */
  padding:20px;
  cursor:pointer;
  display:flex;
  align-items:center;
  gap:15px;
  font-weight:600;
  font-size:16px;
}

.accordion-header span{
  font-size:22px;
  font-weight:700;
  color: #BB0000;
}

.accordion-content{
  display:none;
  padding-left:50px;
  padding-bottom:20px;
 border-radius: 0 0 8px 8px; 
  background:#c40000;
  color:#fff;
  font-size:14px;
  
}

.accordion-item.active .accordion-header{
  background:#c40000;
  color: #fff;
}
.accordion-item.active .accordion-header span{
  color: #fff;
}

.accordion-item.active .accordion-content{
  display:block;
}
.shape-wrapper{
  position:relative;
  width:260px;
  aspect-ratio:301 / 275;   /* keeps exact ratio */
  margin:0 auto;
}

/* BOTH SVG FULL SIZE */
.blob-outer,
.blob-inner{
  position:absolute;
  inset:0;
  width:100%;
  height:100%;
}

/* Slightly smaller inner — EVEN spacing */
.blob-inner{
  width:94%;
  height:95%;
  top:2.5%;
  left:2.5%;
}

.question-mark{
  position:absolute;
  top:50%;
  left:50%;
  transform:translate(-50%, -50%);
  font-size:98px;
  font-weight:800;
  color:#fff;
}
/* RIGHT SIDE */
.rightt{
  width:60%;
  text-align:center;
}


.headingg{
  margin-top:25px;
  
}

.headingg h2{
  font-weight:100;
  font-size:32px;
  font-family:'Holtwood One SC', serif;

}

.headingg h2 span{
  color:#c40000;
}

.headingg p{
  font-size:16px;
  margin-top:5px;
  font-weight:bold;
  font-family:'Poppins',sans-serif !important;

}

.chat-area{
  display:flex;
  justify-content:center;
  align-items:center;
  gap:15px;
  margin-top:20px;
}

.angry-img{
  width:95px;
}

.btnn{
  display:inline-flex;
  align-items:center;
  gap:8px;
  background:#ff7a00;
  color:#fff;
  padding:12px 28px;
  border-radius:5px;
  text-decoration:none;
  font-weight:600;
}

/* ============================= */
/* RESPONSIVE */
/* ============================= */

@media (max-width: 1200px){
  .sectionn{
    margin-left:40px;
  }
}

@media (max-width: 992px){
  .sectionn{
    flex-direction:column;
    align-items:center;
    margin-left:0;
    padding:40px 20px;
  }

  .leftt,
  .rightt{
    width:100%;
  }

  .rightt{
    margin-top:60px;
  }

  .shape-wrapper{
    width:220px;
  }

  .question-mark{
    font-size:70px;
  }
}

@media (max-width: 768px){

  .accordion-header{
    font-size:14px;
    padding:16px;
  }

  .accordion-content{
    font-size:13px;
    padding-left:30px;
  }

  .shape-wrapper{
    width:200px;
  }

  .question-mark{
    font-size:60px;
  }

  .headingg h2{
    font-size:26px;
  }

  .headingg p{
    font-size:14px;
  }

  .angry-img{
    width:75px;
  }

  .btnn{
    padding:10px 20px;
    font-size:14px;
  }
}

@media (max-width: 480px){

  .shape-wrapper{
    width:170px;
  }

  .question-mark{
    font-size:50px;
  }

  .chat-area{
    flex-direction:column;
    gap:12px;
  }

  .angry-img{
    width:65px;
  }

  .btnn{
    width:100%;
    justify-content:center;
  }
}
</style>


<div class="sectionn">

  <!-- LEFT -->
  <div class="leftt">

    <div class="accordion-item active">
      <div class="accordion-header">
        <span>+</span>
        Does Hangry Joe’s offer Online Ordering?
      </div>
      <div class="accordion-content">
        You bet your feathers we do! Ordering your <br>
        Hangry Joe’s fix is as easy as cluckin pie. Just<br>
         place your order for pickup at the nearest<br> Hangry Joe’s location.
      </div>
    </div>

    <div class="accordion-item">
      <div class="accordion-header">
        <span>+</span>
        What Does Aangry Hot mean?
      </div>
      <div class="accordion-content">
        Answer content here...
      </div>
    </div>

    <div class="accordion-item">
      <div class="accordion-header">
        <span>+</span>
        Are you hiring at Hangry Joes?
      </div>
      <div class="accordion-content">
        Answer content here...
      </div>
    </div>

    <div class="accordion-item">
      <div class="accordion-header">
        <span>+</span>
        Do you have gluten free option?
      </div>
      <div class="accordion-content">
        Answer content here...
      </div>
    </div>

  </div>

  <!-- RIGHT -->
  <div class="rightt">

  <div class="shape-wrapper">

  <!-- OUTER VECTOR -->
  <svg class="blob-outer" viewBox="0 0 301 275" xmlns="http://www.w3.org/2000/svg">
    <path d="M162.761 10.3529C122.271 -8.69811 96.0229 19.404 88.3543 38.0966L87.0666 42.3515C89.8272 79.2244 52.3332 92.6769 32.3949 94.0852C1.72059 100.538 1.46497 131.982 6.32173 145.554C14.1567 167.447 21.9145 182.811 23.576 189.724C21.7356 224.446 25.3654 238.76 27.4103 241.577C49.4958 281.523 88.7589 272.304 105.63 262.702C135.077 240.271 158.799 242.089 166.978 245.802C196.426 266.697 222.959 268.079 232.545 266.159C282.237 249.566 273.444 209.569 262.836 191.645C249.646 156.616 268.331 121.996 279.323 109.065C309.997 62.0518 293.893 33.6545 282.007 25.3325C269.737 10.5833 233.695 24.6924 213.757 34.1667C199.57 38.3917 170.685 18.2908 162.761 10.3529Z"
      stroke="#BB0000"
      stroke-width="8"
      fill="none"/>
  </svg>

  <!-- INNER VECTOR -->
  <svg class="blob-inner" viewBox="0 0 282 257" xmlns="http://www.w3.org/2000/svg">
    <path d="M152.8 6.115C113.83 -12.2225 88.5681 14.8271 81.1875 32.8196L79.948 36.9151C82.6051 72.407 46.5186 85.3557 27.3289 86.7113C-2.19383 92.9224 -2.43986 123.189 2.23457 136.252C9.7754 157.325 17.2419 172.114 18.8411 178.768C17.0697 212.19 20.5632 225.968 22.5314 228.679C43.7878 267.129 81.5769 258.256 97.8143 249.013C126.156 227.422 148.987 229.172 156.86 232.746C185.202 252.858 210.739 254.189 219.965 252.34C267.791 236.369 259.328 197.87 249.118 180.617C236.423 146.9 254.408 113.577 264.987 101.13C294.509 55.8776 279.01 28.5439 267.57 20.5336C255.761 6.33681 221.072 19.9174 201.882 29.0369C188.228 33.1037 160.427 13.7556 152.8 6.115Z"
      fill="#BB0000"/>
  </svg>

  <span class="question-mark">?</span>

</div>

    <div class="headingg">
      <h2>ANY <span>QUESTION?</span></h2>
      <p>You can ask anything you want to know Feedback</p>
    </div>

   <div class="chat-area">
    <img src="{{ asset('images/logo.png') }}" class="angry-img">

    <a href="#" class="btnn">
        <i class="bi bi-chat-dots"></i> Chat with Us
    </a>
</div>
  </div>

</div>

<script>
document.querySelectorAll(".accordion-header").forEach(header=>{
  header.addEventListener("click", function(){
    this.parentElement.classList.toggle("active");
  });
});
</script>

