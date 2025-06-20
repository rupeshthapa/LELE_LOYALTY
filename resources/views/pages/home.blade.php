
<section id="home" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="home-info">
          <div class="image-container">
            <img id="slide-image" src="{{ asset('admin/dist/assets/img/customerloyalty.png') }}" alt="Customer Loyalty" class="slide-image" height="160rem">
          </div>
          <h1>"Grow your business with <br> customer loyalty"</h1>
          <div class="home-text">
            <span>Join our exclusive loyalty program today and watch your business thrive. Partner with Lele Loyalty to enhance customer retention, reward your loyal members and VIPs, and provide them with exclusive perks. With our easy-to-use Loyalty App, you can drive higher revenue and achieve long-term success by building a loyal customer base.</span>
          </div>
          <button class="section-btn" onclick="scrollToSection()">Reach Us</button>
          <script>
            function scrollToSection() {
              document.getElementById('contact').scrollIntoView({ behavior: 'smooth' });
            }
          </script>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  function checkElementPosition() {
    const element = document.querySelector('#nav-img'); 
    const rect = element.getBoundingClientRect(); 
    
    if (rect.top <= 0 && rect.bottom >= 0) {
      element.classList.add("animate");
    }
  }

  window.addEventListener('scroll', checkElementPosition);

  const targetImage = document.querySelectorAll('.slide-image');
  const options = {
    threshold: 0.2,
  };
  const observer = new IntersectionObserver(callback, options);

  function callback(entries, observer) {
    entries.forEach(entry => {
      let displayImage = document.querySelector('#nav-img');
      if (entry.isIntersecting) {
        displayImage.style.display = 'none';
      } else {
        if (window.innerWidth < 700) {
    displayImage.style.display = 'none';
  } else {
    displayImage.style.display = 'block';
  }
      }
    });
  }

  targetImage.forEach(function(target) {
    observer.observe(target);
  });
</script>


