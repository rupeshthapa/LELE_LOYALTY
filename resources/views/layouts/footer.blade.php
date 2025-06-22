<!-- FOOTER -->
<footer id="footer" class="footer-black">
    <div class="container">
        <!-- Logo Section -->
        <div class="row logo-section">
            <div class="col-md-12 text-center">
                <img src="{{ asset('storage/customerloyalty.png') }}" alt="Logo" class="footer-logo">
            </div>
        </div>

        <!-- Useful Links Section -->
        <div class="row links-section">
            <div class="col-md-12 text-center">
                <ul class="footer-links">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#feature">Features</a></li>
                    {{-- <li><a href="#pricing">Pricing</a></li> --}}
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="#testimonial">Testimonials</a></li>
                    {{-- <li><a href="{{route('admin.login')}}">Log in as Admin</a></li> --}}
                </ul>
            </div>
        </div>

        <!-- Social Networks Section -->
        <div class="row social-section">
            <div class="col-md-12 text-center">
                <ul class="social-icons">
                    <li><a href="https://www.facebook.com/Leleventurespvtltd/" class="fab fa-facebook"></a></li>
                    <li><a href="https://leleventures.com/" class="fas fa-home"></a></li>
                    <li><a href="https://np.linkedin.com/company/lele-ventures-pvt-ltd" class="fab fa-linkedin"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Copyright Section -->
    <div class="row copyright-section">
        <div class="col-md-12 text-center">
            <p>Copyright &copy; {{ \Carbon\Carbon::now()->format('Y') }} <strong>Lele Ventures Pvt. Ltd.</strong> All
                Rights Reserved</p>
        </div>
    </div>
</footer>



<!-- SCRIPTS -->
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/smoothscroll.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="{{ asset('js/admin/sweetalert2.min.js') }}"></script>

<script>
    AOS.init();
</script>
<script>
    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }


    window.onscroll = function() {
        var button = document.querySelector('.back-to-top-btn');
        if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
            button.style.display = 'block';
        } else {
            button.style.display = 'none';
        }
    };
</script>

<script>
    function showToast(icon, title) {
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: icon,  // 'success', 'error', 'warning', 'info', 'question'
        title: title,
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });
}
</script>
