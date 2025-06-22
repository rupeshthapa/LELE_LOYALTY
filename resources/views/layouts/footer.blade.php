<!-- FOOTER -->
<footer id="footer" class="footer-black" style="padding-bottom: 0;">
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
<script src="{{ asset('js/links/jquery.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // For animation on scroll
    AOS.init();

    // For navbar image which comes from home to the navbar
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



    //   For sending contact details
    $(document).ready(function() {

        $('#contact-form').on('submit', function(e) {

            e.preventDefault();

            $('#validation-name, #validation-organization_name, #validation-email, #validation-phone_number, #validation-address, #validation-country, #validation-message')
                .text('').hide();
            $('#name, #organization_name, #email, #phone_number, #address, #country, #message')
                .removeClass('is-invalid');

            let formData = new FormData(this);

            $.ajax({
                url: "{{ route('customer.contact.store') }}",
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,

                success: function(response) {
                    showToast('success', response.message);

                    $('#contact-form')[0].reset();
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        if (errors.name) {
                            $('#validation-name').text(errors.name[0]).show();
                            $('#name').addClass('is-invalid');
                        }
                        if (errors.organization_name) {
                            $('#validation-organization_name').text(errors
                                .organization_name[0]).show();
                            $('#organization_name').addClass('is-invalid');
                        }
                        if (errors.email) {
                            $('#validation-email').text(errors.email[0]).show();
                            $('#email').addClass('is-invalid');
                        }
                        if (errors.phone_number) {
                            $('#validation-phone_number').text(errors.phone_number[0])
                            .show();
                            $('#phone_number').addClass('is-invalid');
                        }
                        if (errors.address) {
                            $('#validation-address').text(errors.address[0]).show();
                            $('#address').addClass('is-invalid');
                        }
                        if (errors.country) {
                            $('#validation-country').text(errors.country[0]).show();
                            $('#country').addClass('is-invalid');
                        }
                        if (errors.message) {
                            $('#validation-message').text(errors.message[0]).show();
                            $('#message').addClass('is-invalid');
                        }
                    } else {
                        showToast('error', xhr.responseJSON?.message ||
                            'An error occurred.');
                    }
                }
            });

        });

    });

    // For scrolling to the top of the page
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

    // For toast message from sweetalert
    function showToast(icon, title) {
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: icon, // 'success', 'error', 'warning', 'info', 'question'
            title: title,
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            },
            customClass: {
            title: 'swal-custom-font'
        }
        });
    }
</script>
