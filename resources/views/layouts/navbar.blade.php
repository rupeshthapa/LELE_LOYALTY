<style>
.animate {
  animation: example 0.2s linear 0s forwards;
}

@keyframes example {
  0% {
    transform: translate(500px, 100px); 
  }
  100% {
    transform: translate(0px, 0px);
  }
}

  </style>
  
    <!-- PRE LOADER -->
    <section class="preloader">
        <div class="spinner">
            <span class="spinner-rotate"></span>
        </div>
    </section>

    
    
    <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">

                <a href="/" class="navbar-brand">
                    <img src="{{asset('admin/dist/assets/img/customerloyalty.png')}}" alt="LELE LOYALTY">
                </a>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" >
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav" style="margin-top:10px; display:inline">
                    <li> <a href="/" class="navbar-logo">
                        <img src="{{asset('admin/dist/assets/img/customerloyalty.png')}}" alt="LELE LOYALTY" id="nav-img">
                    </a></li>
                    <li><a href="#home" class="smoothScroll">Home</a></li>
                    <li><a href="#about" class="smoothScroll">About Us</a></li>
                    <li><a href="#feature" class="smoothScroll">Features</a></li>
                    <li><a href="#contact" class="smoothScroll">Contact</a></li>
                    <li><a href="#testimonial" class="smoothScroll">Testimonials</a></li>
                </ul>
            </div>
        </div>
    </section>
    