<section id="contact" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row" style="margin-bottom: 3rem">
            <div class="col-md-12 margin-bottom">
                <div class="section-title">
                    <h1>Contact Us</h1>
                    <p>We'd love to hear from you! Reach out to us for any questions.</p>
                </div>
                <div class="col-md-12" >
                    <form id="contact-form" role="form" method="post">
    @csrf
    
    <div id="response-message" style="display: none;"></div>

    <div data-aos="fade-up" class="col-md-12 col-sm-12" style="position: relative;">
        <input 
            type="text" 
            class="form-control" 
            id="name" 
            placeholder="Full name" 
            name="name" 
            style="padding: 15px 20px;"
        >
        <span class="asterisk">*</span>
        <div class="validation-message" id="validation-name"></div>
    </div>  
    <style>                                       
        .asterisk {
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%); 
            color: red;
            font-size: 14px; 
        }                       
    </style>

    <div data-aos="fade-up" class="col-md-12 col-sm-12" style="position: relative;">
        <input 
            type="text" 
            class="form-control" 
            id="organization_name" 
            placeholder="Organization/Business Name" 
            name="organization_name"  
            style="padding: 15px 20px;"
        >
        <span class="asterisk">*</span>
        <div class="validation-message" id="validation-organization_name"></div>
    </div>

    <div data-aos="fade-up" class="col-md-6 col-sm-12" style="position: relative;">
        <input 
            type="email" 
            class="form-control" 
            id="email" 
            placeholder="Email" 
            name="email" 
            style="padding: 15px 20px; margin-left: -15px ;"
        >
        <span class="asterisk">*</span>
        <div class="validation-message" id="validation-email"></div>
    </div>

    <div data-aos="fade-up" class="col-md-6 col-sm-12" style="position: relative;">
        <input 
            type="number" 
            class="form-control" 
            id="phone_number" 
            placeholder="Phone" 
            name="phone_number" 
            style="padding: 15px 20px; margin-left: 15px;"
        >
        <div class="validation-message" id="validation-phone_number"></div>
    </div>

    <div data-aos="fade-up" class="col-md-6 col-sm-12" style="position: relative;">
        <input 
            type="text" 
            class="form-control" 
            id="address" 
            placeholder="Address" 
            name="address" 
            style="padding: 15px 20px; margin-left: -15px;"
        >
        <span class="asterisk">*</span>
        <div class="validation-message" id="validation-address"></div>
    </div>

    <div data-aos="fade-up" class="col-md-6 col-sm-12" style="position: relative;">
        <input 
            type="text" 
            class="form-control" 
            id="country" 
            placeholder="Country" 
            name="country" 
            style="padding: 15px 20px; margin-left: 15px;"
        >
        <div class="validation-message" id="validation-country"></div>
    </div>

    <div data-aos="fade-up" class="col-md-12 col-sm-12" style="position: relative;">
        <textarea 
            class="form-control" 
            rows="5" 
            placeholder="Your message" 
            name="message" 
            id="message" 
            style="padding: 15px 20px;"
        ></textarea>
        <span class="asterisk-second">*</span>
        <div class="validation-message" id="validation-message"></div>
    </div>
    <style>                                       
        .asterisk-second {
            position: absolute;
            top: 20%;
            right: 20px;
            transform: translateY(-50%); 
            color: red;
            font-size: 14px; 
        }                      
    </style>

    <div data-aos="fade-up" class="col-md-12 col-sm-12">
        <button type="submit" class="full-btn margin-bottom">
            Send Message
        </button>
    </div>
</form>

                </div>
                <div class="col-md-12 margin-bottom map" data-aos="fade-up" >
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1766.6908255124085!2d85.30694930580192!3d27.67459903156601!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19245992f6a1%3A0x542cc876f5233a67!2sLele%20Ventures%20Pvt%20Ltd%2C%20Head%20office.!5e0!3m2!1sen!2snp!4v1735292745149!5m2!1sen!2snp" width="100%" height="455px" style="border:0; padding:15px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            
        </div>
        <div class="horizontal-divs">
            @foreach ($offices as $office )
                <div data-aos="zoom-in" class="horizontal-div">
                    <i class="{{$office->icon}}"></i>
                    <h3>{{$office->title}}</h3>
                    <P>
                        @php
                            $data=$office->description;
                            $array=(explode("/n",$data));
                            $string=(implode('</br>',$array));
                            echo ($string);
                        @endphp
                    </P>
                </div>
            @endforeach
        </div>
        
    </div>
</section>

@push('scripts')
<script src="{{asset('js/links/jquery.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    $(document).ready(function(){

        $('#contact-form').on('submit', function(e){

            e.preventDefault();

            $('#validation-name, #validation-organization-name, #validation-email, #validation-phone_number, #validation-address, #validation-country, #validation-message').text('').hide();
            $('#name, #organization_name, #email, #phone_number, #address, #country, #message').removeClass('is-invalid');

            let formData = new FormData(this);

            $.ajax({
                url: "{{ route('customer.contact.store') }}",
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,

                success:function(response){
                    toastr.success(response.message);

                    $('#contact-form')[0].reset();
                },
                error: function(xhr){
                    if(xhr.status === 422){
                        let errors = xhr.responseJSON.errors;
                        if(errors.name){
                            $('#validation-name').text(errors.name[0]).show();
                            $('#name').addClass('is-invalid');
                        }
                        if(errors.organization_name){
                            $('#validation-organization-name').text(errors.organization_name[0]).show();
                            $('#organization_name').addClass('is-invalid');
                        }
                        if(errors.email){
                            $('#validation-email').text(errors.email[0]).show();
                            $('#email').addClass('is-invalid');
                        }
                        if(errors.phone_number){
                            $('#validation-phone_number').text(errors.phone_number[0]).show();
                            $('#phone_number').addClass('is-invalid');
                        }
                        if(errors.address){
                            $('#validation-address').text(errors.address[0]).show();
                            $('#address').addClass('is-invalid');
                        }
                        if(errors.country){
                            $('#validation-country').text(errors.country[0]).show();
                            $('#country').addClass('is-invalid');
                        }
                        if(errors.message){
                            $('#validation-message').text(errors.message[0]).show();
                            $('#message').addClass('is-invalid');
                            }
                    }
                    else{
                        toastr.error('Something went wrong!');
                    }
                }
            });

        });

    });
</script>
<script>
    toastr.options = {
        "positionClass": "toast-top-right",
        "closeButton": true,
        "progressBar": true,
        "timeOut": "5000",
        "extendedTimeOut": "1000"
    }

    @if (session('success'))
        toastr.success("{{ session('success') }}")
    @endif

    @if (session('error'))
        toastr.error("{{ session('error') }}")
    @endif
</script>
@endpush