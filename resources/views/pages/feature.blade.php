<section id="feature" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h1>What is Lele Loyalty Program?</h1>
                    <p style="text-align: justify">Lele Loyalty is a customer rewards program designed to enhance your
                        shopping experience. With Lele Loyalty, every time you make a purchase, you earn points that can
                        be redeemed for discounts, special offers, or exclusive products. The more you shop, the more
                        rewards you receive, making each purchase more valuable. Members of Lele Loyalty also enjoy
                        access to early promotions, birthday surprises, and personalized deals. It's our way of saying
                        thank you for choosing Lele and keeping you connected with the latest trends and benefits.
                        Key features of Loyalty program includes:
                    </p>
                </div>

                <div class="row">
                    @foreach ($loyalties as $loyalty)
                        <div data-aos="zoom-in" data-aos-duration="4000" class="col-md-6 col-sm-12">
                            <div class="text-container">
                                <h3>{{ $loyalty->title }}</h3>
                                <p>{{ $loyalty->description }}</p>
                            </div>
                            <div data-aos="zoom-in" data-aos-duration="4000" class="object-flex-container">
                                <img src="{{ asset('storage/' . $loyalty->image) }}" alt="{{ $loyalty->title }} Image">
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="section-title margin-top">
                    <h1>Who should implement Lele Loyalty program?</h1>
                    <p>Lele Loyalty can be adopted by businesses and organizations across various sectors to enhance
                        customer engagement and retention. Some examples include:</p>
                </div>
                <div data-aos="zoom-in" class="margin-bottom">
                    <div class="container feature-container">

                        @foreach ($sectors as $sector)
                            <div data-aos="zoom-in" class="example ">
                                <img src="{{ asset('storage/' . $sector->image) }}" alt="{{ $sector->title }} Image">
                                <p>{{ $sector->title }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>



            </div>

            <div class="container">
                <div class="section-title margin-bottom">
                    <h1>Why Your Business Should Implement a Lele Loyalty Program?</h1>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="d-flex flex-wrap gap-4">

                        @foreach ($reasons as $reason)
                            <div data-aos="zoom-in" data-aos-duration="1000" class="point-item col-12 col-md-6 card ">
                                <img src="{{ asset('storage/' . $reason->icon) }}" alt="{{ $reason->title }} Image">
                                <strong>{{ $reason->title }}</strong>
                                <p>{{ $reason->description }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


        <div>
            <div class="section-title secondary-title">
                <h1>How does Lele Loyalty work?</h1>
            </div>
        </div>

        <div class="upper-step">

            @php
                $alternate = 0;
            @endphp

            @foreach ($workflows as $workflow)
                @if ($alternate == 0)
                    <div class="step" id="step1">
                        <div data-aos="fade-right" data-aos-duration="3000">
                            <h1>{{ $workflow->step }}</h1>
                            <h3>{{ $workflow->title }}</h3>
                            <p>{{ $workflow->description }}</p>
                        </div>
                        <div data-aos="fade-left" data-aos-duration="3000">
                            <img src="{{ asset('storage/' . $workflow->image) }}" alt="{{ $workflow->title }} Image">
                        </div>
                    </div>
                    @php
                        $alternate = 1;
                    @endphp
                @else
                    <div class="step" id="step2">
                        <div data-aos="fade-right" data-aos-duration="3000">
                            <img src="{{ asset('storage/' . $workflow->image) }}" alt="{{ $workflow->title }} Image">
                        </div>
                        <div data-aos="fade-left" data-aos-duration="3000">
                            <h1>{{ $workflow->step }}</h1>
                            <h3>{{ $workflow->title }}</h3>
                            <p>{{ $workflow->description }}</p>
                        </div>
                    </div>
                    @php
                        $alternate = 0;
                    @endphp
                @endif
            @endforeach
        </div>

        <div class="section-title" style="text-align: center; margin-bottom: 30px; margin-top:5rem;">
            <h1 style="font-weight: 800; font-size: 30px; color: #333;">Why Choosing LELE Loyalty ?</h1>
            <p style="font-size: 16px; color: #555;">Lele Loyalty has strong backend with many features like:</p>
        </div>
        <div class="col-12"
            style="padding: 20px; border: 1px solid #ddd; border-radius: 8px; background-color: #ffffff;">
            <section id="features">
                <div class="container">
                    <div class="row" id="features-list">
                        @foreach ($features as $feature)
                            <div class="col-12 col-md-4 feature-item">
                                <div data-aos="zoom-in" data-aos-duration="4000" class="{{ $feature->class }} feature">
                                    <img src="{{ asset('storage/' . $feature->image) }}"
                                        class="{{ $feature->image_class }}" alt="{{ $feature->title }} Image"
                                        style="width: 60px; height: 60px;">
                                    <h3 style="font-weight: 600;">{{ $feature->title }}</h3>
                                    <p style="color: #555; font-size: 14px;">{{ $feature->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
