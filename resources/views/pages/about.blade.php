<section id="about" data-stellar-background-ratio="0.5">
    <div class="container">
        @php $alternate = 0; @endphp

        @foreach ($abouts as $index => $about)
            <div class="row mb-5">
                @if ($alternate === 0)
                    <div class="col-md-6 col-12 offset-md-3">
                        <div class="section-title">
                            <h1 style="margin: 1rem">{{ $about->title }}</h1>
                        </div>
                    </div>

                    <div data-aos="fade-up" data-aos-duration="4000"
                        class="col-md-6 col-12 loyalty d-flex justify-content-center align-items-center">
                        <img src="{{ asset('storage/' . $about->image) }}" alt="About Image" class="img-fluid" />
                    </div>

                    <div data-aos="fade-up" class="col-md-6 about-section">
                        <p>{{ $about->description }}</p>

                        @if ($index === 0)
                            <ul class="project-list">
                                @foreach ($projects as $project)
                                    <li class="project-item d-flex align-items-center mb-3">
                                        @if ($project->url)
                                            <a href="{{ $project->url }}" target="_blank">
                                                <img src="{{ asset('storage/' . $project->logo) }}"
                                                    alt="{{ $project->name }} Logo" class="me-3"
                                                    style="width:50px; height:auto;" />
                                            </a>
                                        @else
                                            <img src="{{ asset('storage/' . $project->logo) }}"
                                                alt="{{ $project->name }} Logo" class="me-3"
                                                style="width:50px; height:auto;" />
                                        @endif

                                        <div>
                                            <span class="project-name">{{ $project->description }}</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    @php $alternate = 1; @endphp
                @else
                    <div class="col-md-6 col-12 offset-md-3">
                        <div class="section-title">
                            <h1 style="margin: 10px; text-align:center">{{ $about->title }}</h1>
                        </div>
                    </div>

                    <div data-aos="fade-up" class="col-md-6 about-section">
                        <p>{{ $about->description }}</p>
                    </div>

                    <div data-aos="fade-up" data-aos-duration="4000"
                        class="col-md-6 col-12 loyalty d-flex justify-content-center align-items-center">
                        <img src="{{ asset('storage/' . $about->image) }}" alt="About Image" class="img-fluid" />
                    </div>

                    @php $alternate = 0; @endphp
                @endif
            </div>
        @endforeach
    </div>
</section>
