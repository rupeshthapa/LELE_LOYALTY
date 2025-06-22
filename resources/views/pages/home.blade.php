<section id="home" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="home-info">
                    <div class="image-container">
                        <img id="slide-image" src="{{ asset('storage/customerloyalty.png') }}" alt="Customer Loyalty"
                            class="slide-image" height="160rem">
                    </div>
                    <h1>"Grow your business with <br> customer loyalty"</h1>
                    <div class="home-text">
                        <span>Join our exclusive loyalty program today and watch your business thrive. Partner with Lele
                            Loyalty to enhance customer retention, reward your loyal members and VIPs, and provide them
                            with exclusive perks. With our easy-to-use Loyalty App, you can drive higher revenue and
                            achieve long-term success by building a loyal customer base.</span>
                    </div>
                    <button class="section-btn" onclick="scrollToSection()">Reach Us</button>
                    <script>
                        function scrollToSection() {
                            document.getElementById('contact').scrollIntoView({
                                behavior: 'smooth'
                            });
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</section>
