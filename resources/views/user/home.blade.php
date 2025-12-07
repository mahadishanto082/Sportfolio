@extends('layouts.website')

@section('content')
<style>
    /* Responsive CSS - Add this at the beginning of your content section */
    @media (max-width: 767.98px) {
        /* Banner fixes */
        .title-heading-banner {
            font-size: 24px !important;
            text-align: center;
            line-height: 1.3;
        }
        
        .banner-content p {
            font-size: 16px;
            text-align: center;
        }
        
        .banner-heading {
            flex-direction: column;
        }
        
        .banner-reviewer {
            justify-content: center;
            margin-top: 20px;
        }
        
        .banner-reviewer .avatar {
            width: 40px !important;
            height: 40px !important;
        }
        
        /* Expertise section */
        .expertise-title {
            text-align: center;
        }
        
        .expertise-list h5 {
            text-align: center;
            margin-top: 20px;
        }
        
        .check-list {
            padding-left: 20px !important;
            margin-left: 0 !important;
        }
        
        .check-list li {
            white-space: normal !important;
            text-align: left;
            margin-bottom: 8px;
        }
        
        /* Why Choose Us */
        .chooseus-card-container {
            width: 100%;
            margin-bottom: 30px;
        }
        
        .chooseus-card-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .card-chooseus {
            width: 100% !important;
            max-width: 300px;
            margin: 0 auto 15px !important;
            min-height: auto !important;
        }
        
        .chooseus-content-container {
            width: 100%;
        }
        
        .chooseus-content-container h2,
        .chooseus-content-container p {
            text-align: center;
        }
        
        /* Services */
        .card-service {
            margin-bottom: 20px;
            padding: 15px;
        }
        
        .service-title h4 {
            font-size: 18px;
        }
        
        /* Portfolio */
        .portfolio-image {
            height: 150px !important;
        }
        
        .card-portfolio {
            margin-bottom: 20px;
        }
        
        /* Technology */
        .card-blog {
            margin-bottom: 20px;
        }
        
        .blog-image {
            height: 80px !important;
        }
        
        /* General fixes */
        .title-heading {
            font-size: 28px !important;
            text-align: center;
            line-height: 1.3;
        }
        
        .sub-heading {
            justify-content: center;
            display: flex;
        }
        
        .hero-container {
            padding-left: 15px;
            padding-right: 15px;
        }
        
        /* Button fixes */
        .btn {
            padding: 10px 20px;
            font-size: 14px;
            width: 100%;
            max-width: 250px;
            margin: 0 auto;
        }
        
        .d-flex.flex-md-row {
            flex-direction: column !important;
        }
        
        /* Grid fixes */
        .row-cols-md-3 > .col,
        .row-cols-md-2 > .col {
            width: 100% !important;
            flex: 0 0 100% !important;
            max-width: 100% !important;
        }
        
        /* Image fixes */
        img {
            max-width: 100%;
            height: auto;
        }
        
        /* Spacing fixes */
        .gspace-2 > * {
            margin-bottom: 15px;
        }
        
        .gspace-3 > * {
            margin-bottom: 20px;
        }
        
        .gspace-5 > * {
            margin-bottom: 30px;
        }
    }
    
    /* Tablet fixes */
    @media (min-width: 768px) and (max-width: 991.98px) {
        .title-heading-banner {
            font-size: 32px !important;
        }
        
        .title-heading {
            font-size: 32px !important;
        }
        
        .card-chooseus {
            width: 180px !important;
            min-height: 200px !important;
        }
        
        .btn {
            padding: 12px 24px;
        }
    }
    
    /* Extra small devices */
    @media (max-width: 575.98px) {
        .title-heading-banner {
            font-size: 22px !important;
        }
        
        .title-heading {
            font-size: 24px !important;
        }
        
        .card-chooseus {
            width: 100% !important;
            min-height: 180px !important;
            padding: 15px !important;
        }
        
        .section {
            padding: 30px 0 !important;
        }
    }
</style>
@php
    $title = DB::table('titlepages')->first();
    $service = DB::table('services')->first();
    $choose = DB::table('abouts')->first();
    $packages = DB::table('packages')->first();
    $portfolios = DB::table('portfolios')->first();
    $technologies = DB::table('techs')->where('status', 'Active')->get();
    
    $chooseIcons = ['image/Icon-2.png', 'image/icon-1.png', 'image/Icon-3.png', 'image/icon-4.png', 'image/icon-5.png'];
    $packageIcons = ['./image/Icon-5.png', './image/Icon-6.png', './image/Icon-4.png', './image/digital-marketing-icons-F4LJ4W8.png'];
    $cleanSemiDescription = trim($choose->semi_description, " .t\n\r\t\v\0");
    $semiItems = array_filter(array_map('trim', explode('.', $cleanSemiDescription)));
    
    // Also clean the main description
    $cleanDescription = trim($choose->description, " .t\n\r\t\v\0");
    $descriptionItems = array_filter(array_map('trim', explode('.', $cleanDescription)));
@endphp

<main>
    <!-- Banner Section -->
    <div class="section-banner">
        <div class="banner-video-container keep-dark animate-box animated animate__animated" data-animate="animate__fadeInUp">
            <div id="banner-video-background"></div>
            <div class="hero-container position-relative">
                <div class="d-flex flex-column gspace-2">
                    <h1 class="title-heading-banner animate-box animated animate__animated" data-animate="animate__fadeInLeft" style="font-size: 40px;">
                        {{ $title->short_title }}
                    </h1>
                    <div class="banner-heading">
                        <div class="banner-video-content order-xl-1 order-2 animate-box animated animate__animated" data-animate="animate__fadeInUp">
                            <div class="d-flex flex-column flex-xl-row text-xl-start text-center align-items-center gspace-5">
                                <button class="request-loader" data-video="https://www.youtube.com/embed/VhBl3dHT5SY?autoplay=1">
                                    <i class="fa-solid fa-play"></i>
                                </button>
                                <p>{{ $title->content }}</p>
                            </div>
                        </div>
                        <div class="banner-content order-xl-2 order-1 animate-box animated animate__animated" data-animate="animate__fadeInRight">
                            <p>{{ $title->caption }}</p>
                            <div class="d-flex flex-md-row flex-column justify-content-center justify-content-xl-start align-self-center align-self-xl-start gspace-3">
                                <a href="./about.html" class="btn btn-accent">
                                    <div class="btn-title">
                                        <span>Get Started</span>
                                    </div>
                                    <div class="icon-circle">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </div>
                                </a>
                                <div class="banner-reviewer">
                                    <div class="d-flex flex-row align-items-center">
                                        <img src="./image/dummy-img-400x400.jpg" alt="Reviewer" class="avatar">
                                        <img src="./image/dummy-img-400x400.jpg" alt="Reviewer" class="avatar">
                                        <img src="./image/dummy-img-400x400.jpg" alt="Reviewer" class="avatar">
                                    </div>
                                    <div class="detail">
                                        <span>2.7k Positive</span>
                                        <span>Reviews</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Expertise Section -->
    <div class="section">
        <div class="hero-container">
            <div class="d-flex flex-column flex-xl-row gspace-5">
                <div class="expertise-img-layout">
                    <div class="image-container expertise-img">
                        <img src="{{ asset('storage/' . $service->icon) }}" alt="Logo" height="1600" width="1600">
                        <div class="expertise-layout">
                            <div class="d-flex flex-column">
                                <div class="card-expertise-wrapper"></div>
                                <div class="expertise-spacer"></div>
                            </div>
                            <div class="expertise-spacer"></div>
                        </div>
                    </div>
                </div>
                <div class="expertise-title">
                    <div class="sub-heading animate-box animated animate__animated" data-animate="animate__fadeInRight">
                        <i class="fa-regular fa-circle-dot"></i>
                        <span>Our Expertise</span>
                    </div>
                    <h2 class="title-heading animate-box animated animate__animated" data-animate="animate__fadeInRight">
                        {{ $service->name }}
                    </h2>
                    <div class="d-flex flex-column flex-md-row">
                        <div class="expertise-list">
                            <h5>What We Do Best</h5>
                            <ul class="check-list" style="list-style: none; padding: 0; margin: 0;">
                                @foreach (explode('.', $service->description) as $description)
                                    @if (trim($description) !== '')
                                        <li style="white-space: nowrap;">{{ trim($description) }}.</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Video Modal -->
    <div class="section p-0">
        <div id="modal-overlay" class="modal-overlay">
            <span class="my-close"><i class="fa-solid fa-xmark"></i></span>
            <div class="my-modal">
                <iframe id="my-video-frame" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <!-- Why Choose Us Section -->
    <div class="section">
        <div class="hero-container">
            @php
                $semiItems = array_filter(array_map('trim', explode('.', $choose->semi_description)));
            @endphp

            <div class="d-flex flex-column flex-xl-row gspace-5">
                <!-- Left Side: Cards -->
                <div class="chooseus-card-container flex-grow-1">
                    <h2>{{ $choose->sub_title }}</h2>
                    <div class="d-flex flex-wrap gap-3 justify-content-center">
                        @foreach($semiItems as $index => $semi_description)
                            <div class="card card-chooseus animate-box animate__animated text-center p-3" 
                                 data-animate="animate__fadeInLeft" 
                                 style="width: 220px; min-height: 250px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                <div class="chooseus-icon-wrapper mb-3">
                                    <div class="chooseus-icon-layout">
                                        <div class="chooseus-icon">
                                            <img src="{{ asset($chooseIcons[$index] ?? 'default-icon.png') }}" 
                                                 alt="Why Choose Us Icon" 
                                                 class="img-fluid" 
                                                 style="width:60px; height:60px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body d-flex flex-column justify-content-center align-items-center p-0">
                                    <p class="mb-0" style="font-weight: 500; font-size: 16px;">
                                        {{ $semi_description }}.
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Right Side: Content -->
                <div class="chooseus-content-container flex-grow-1">
                    <div class="d-flex flex-column gspace-5">
                        <div class="d-flex flex-column gspace-2">
                            <div class="sub-heading animate-box animate__animated" data-animate="animate__fadeInDown">
                                <i class="fa-regular fa-circle-dot"></i>
                                <span>{{ $choose->title }}</span>
                            </div>
                            <h2 class="title-heading animate-box animate__animated" data-animate="animate__fadeInDown">
                                Your Success is Our Mission
                            </h2>
                            <div class="d-flex flex-column flex-md-row">
                                <div class="expertise-list">
                                    <ul class="check-list" style="list-style: none; padding: 0; margin: 0; margin-left: -90px;">
                                        @foreach (explode('.', $choose->description) as $description)
                                            @if (trim($description) !== '')
                                                <li style="white-space: nowrap;">{{ trim($description) }}.</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="image-container">
                            <img src="{{ asset('storage/' . $choose->image) }}" alt="Logo" height="600" width="800">
                            <div class="card-chooseus-cta-layout">
                                <div class="chooseus-cta-spacer"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-4 text-center animate-box animate__animated" data-animate="animate__fadeInUp">
                <a href="{{ route('pages.about') }}">Learn More About Us</a>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div class="section">
        <div class="hero-container">
            <div class="d-flex flex-column justify-content-center text-center gspace-5">
                <div class="d-flex flex-column justify-content-center text-center gspace-2">
                    <div class="sub-heading align-self-center animate-box animated animate__animated" data-animate="animate__fadeInDown">
                        <i class="fa-regular fa-circle-dot"></i>
                        <span>Our Core Services</span>
                    </div>
                    <h2 class="title-heading heading-container heading-container-medium animate-box animated animate__animated" data-animate="animate__fadeInDown">
                        Digital Solutions That Drive Real Results
                    </h2>
                </div>
                
                <div class="card-service-wrapper">
                    <div class="row row-cols-xl-3 row-cols-md-2 row-cols-1 grid-spacer-2">
                        @php
                            $names = explode('.', $packages->name);
                            $features = explode('.', $packages->features);
                        @endphp

                        @foreach($names as $index => $namePart)
                            @if(trim($namePart) !== '')
                                <div class="col">
                                    <div class="card card-service animate-box animated slow animate__animated" data-animate="animate__fadeInLeft">
                                        <div class="d-flex flex-row justify-content-between gspace-2 gspace-md-3 align-items-center">
                                            <div>
                                                <div class="service-icon-wrapper">
                                                    <div class="service-icon">
                                                        <img src="{{ $packageIcons[$index] ?? './image/default.png' }}" alt="Service Icon" class="img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="service-title">
                                                <h4>{{ trim($namePart) }}</h4>
                                            </div>
                                        </div>
                                        <p>{{ trim($features[$index] ?? '') }}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    
                    <div class="mt-4 animate-box animate__animated" data-animate="animate__fadeInUp">
                        <a href="{{ route('pages.services') }}">Learn More About Our Services</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Section -->
    @if($portfolios)
    <div class="section">
        <div class="hero-container">
            <div class="d-flex flex-column gspace-5">
                <div class="row row-cols-xl-2 row-cols-1 grid-spacer-5 m-0">
                    <div class="col col-xl-8 ps-0 pe-0">
                        <div class="d-flex flex-column gspace-2 animate-box animated fast animate__animated" data-animate="animate__fadeInLeft">
                            <div class="sub-heading">
                                <i class="fa-solid fa-diagram-project"></i>
                                <span>Our Portfolio</span>
                            </div>
                            <h2 class="title-heading">Recent Projects</h2>
                        </div>
                    </div>
                    <div class="col col-xl-4 ps-0 pe-0">
                        <div class="d-flex flex-column gspace-2 justify-content-end h-100 animate-box animated animate__animated" data-animate="animate__fadeInRight">
                            <p>{{ $portfolios->caption ?? '' }}</p>
                            <div class="link-wrapper">
                                <a href= "{{ route("pages.projects") }}" >Explore More</a>
                                <i class="fa-solid fa-circle-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>

                @php
                    $portfolioItems = isset($portfolios->description) ? array_filter(array_map('trim', explode('.', $portfolios->description))) : [];
                    $portfolioImages = isset($portfolios->images) ? explode(',', $portfolios->images) : [];
                @endphp

                <div class="row row-cols-md-3 row-cols-sm-2 row-cols-1 grid-spacer-3">
                    @foreach($portfolioItems as $index => $item)
                        @if(trim($item) !== '')
                            <div class="col">
                                <div class="card card-portfolio animate-box animated animate__animated" data-animate="animate__fadeInUp">
                                    <div class="portfolio-image d-flex justify-content-center align-items-center p-2" style="height: 200px; overflow: hidden;">
                                        <img src="{{ isset($portfolioImages[$index]) ? asset('storage/' . trim($portfolioImages[$index])) : asset('storage/default-image.png') }}" 
                                             alt="Portfolio Image" 
                                             style="max-height: 100%; max-width: 100%; object-fit: cover;">
                                    </div>
                                    <div class="card-body">
                                        <a href="#" class="portfolio-link">{{ $item }}</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Technology Section -->
    <div class="section">
        <div class="hero-container">
            <div class="d-flex flex-column gspace-5">
                <div class="row row-cols-xl-2 row-cols-1 grid-spacer-5 m-0">
                    <div class="col col-xl-8 ps-0 pe-0">
                        <div class="d-flex flex-column gspace-2 animate-box animated fast animate__animated" data-animate="animate__fadeInLeft">
                            <div class="sub-heading">
                                <i class="fa-solid fa-microchip"></i>
                                <span>Technology We Used</span>
                            </div>
                            <h2 class="title-heading">Our Core Tech Stack</h2>
                        </div>
                    </div>
                    <div class="col col-xl-4 ps-0 pe-0">
                        <div class="d-flex flex-column gspace-2 justify-content-end h-100 animate-box animated animate__animated" data-animate="animate__fadeInRight">
                            <p>We used modern and scalable technologies to build a secure, efficient, and user-friendly platform.</p>
                            <div class="link-wrapper">
                                <a href="#">Explore More</a>
                                <i class="fa-solid fa-circle-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row row-cols-md-2 row-cols-1 grid-spacer-3">
                    @foreach($technologies as $tech)
                        <div class="col">
                            <div class="card card-blog animate-box animated animate__animated" data-animate="animate__fadeInUp">
                                <div class="blog-image d-flex justify-content-center align-items-center p-2" style="height: 100px;">
                                    <img src="{{ asset('storage/' . $tech->logo_image) }}" 
                                         alt="{{ $tech->name }} Logo" 
                                         style="max-height: 100%; max-width: 100%; object-fit: contain;">
                                </div>
                                <div class="card-body">
                                    <div class="d-flex flex-row gspace-1 align-items-center">
                                        <i class="fa-solid fa-microchip accent-color"></i>
                                        <span class="meta-data">{{ $tech->status }}</span>
                                    </div>
                                    <a href="{{ $tech->link ?? '#' }}" class="blog-link">{{ $tech->name }}</a>
                                    <p>{{ $tech->description }}</p>
                                    <a href="{{ $tech->link ?? '#' }}" target="_blank" class="read-more">Learn More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
            </div>
            <!-- contact button-->
            <div class="mt-5 text-center animate-box animate__animated" data-animate="animate__fadeInUp">
    
    <h3 class="mb-2">Ready for your project?</h3>
    <p >Contact us for more information</p>

    <a href="{{ route('pages.contact') }}" >
        Contact Us
    </a>

</div>

        </div>
    </div>
</main>

<script src="js/vendor/jquery.min.js"></script>
<script src="js/vendor/bootstrap.bundle.min.js"></script>
<script src="js/vendor/swiper-bundle.min.js"></script>
<script src="js/vendor/isotope.pkgd.min.js"></script>
<script src="js/script.js"></script>
<script src="js/swiper-script.js"></script>
<script src="js/submit-form.js"></script>
<script src="js/video_embedded.js"></script>
@endsection