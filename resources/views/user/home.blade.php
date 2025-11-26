@extends('layouts.website')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Digital Marketing Agency</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="./image/favicon.ico">
</head>
<body>
   
    <!-- Section Content Edit -->
    

   

    <!-- Section Sidebar -->
   
    <!-- Section Main Content-->
    <main>
        <!-- Section Banner -->
        <div class="section-banner">
            <div class="banner-video-container keep-dark animate-box animated animate__animated" data-animate="animate__fadeInUp">
                <div id="banner-video-background"></div>
                <div class="hero-container position-relative">
                    @php
                    $title = DB::table('titlepages')->first();
                    @endphp
                    <div class="d-flex flex-column gspace-2">
                        <h1 class="title-heading-banner animate-box animated animate__animated" data-animate="animate__fadeInLeft"  style="font-size: 40px;">
{{ $title->short_title }}


                        </h1>
                        <div class="banner-heading">
                            <div class="banner-video-content order-xl-1 order-2 animate-box animated animate__animated" data-animate="animate__fadeInUp">
                                <div class="d-flex flex-column flex-xl-row text-xl-start text-center align-items-center gspace-5">
                                    <button class="request-loader" data-video="https://www.youtube.com/embed/VhBl3dHT5SY?autoplay=1"><i class="fa-solid fa-play"></i></button>
                                    <p>
                                        {{ $title->content }}
                                    </p>
                                </div>
                            </div>
                            <div class="banner-content order-xl-2 order-1  animate-box animated animate__animated" data-animate="animate__fadeInRight">
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

        <!-- Section Expertise -->
        @php
        $service = DB::table('services')->first();
        @endphp
        <div class="section">
            <div class="hero-container">
                <div class="d-flex flex-column flex-xl-row gspace-5">
                    <div class="expertise-img-layout">
                        <div class="image-container expertise-img">
                        <img src="{{ asset('storage/' . $service->icon) }}" alt="Logo" height="1600px" width="1600px">
                            <div class="expertise-layout">
                                <div class="d-flex flex-column">
                                    <div class="card-expertise-wrapper">
                                      
                                    </div>
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


                  
                        <h2 class="title-heading animate-box animated animate__animated" data-animate="animate__fadeInRight">{{ $service ->name }}</h2>
                        <p>

                            
                        </p>
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
            </div>
        </div>

        <!-- Section Modal Video -->
        <div class="section p-0">
            <div id="modal-overlay" class="modal-overlay">
                <span class="my-close"><i class="fa-solid fa-xmark"></i></span>
                <div class="my-modal">
                <iframe id="my-video-frame" allowfullscreen></iframe>
                </div>
            </div>
        </div>

       
 <!-- Section Why Choose Us -->
<div class="section">
    <div class="hero-container">
        @php
            $choose = DB::table('abouts')->first();

            // define icons (order matches semi_description items)
            $icons = [
                'image/Icon-2.png',
                'image/icon-1.png',
                'image/Icon-3.png',
                'image/icon-4.png',   // new icon
                'image/icon-5.png',   // new icon
            ];

            // split semi_description into items
            $semiItems = array_filter(array_map('trim', explode('.', $choose->semi_description)));
        @endphp

        <div class="d-flex flex-column flex-xl-row gspace-5">
            
            <!-- LEFT SIDE: Cards -->
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
                                        <img src="{{ asset($icons[$index] ?? 'default-icon.png') }}" 
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

            <!-- RIGHT SIDE: Why Choose Marko -->
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
                        <p class="mb-0 animate-box animate__animated" data-animate="animate__fadeInDown">
                        <div class="d-flex flex-column flex-md-row white-space: nowrap; "> 
                         <div class="expertise-list"> 
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
                        </p>
                    </div>
                    <div class="image-container">
                    <img src="{{ asset('storage/' . $choose->image) }}" alt="Logo" height="600px" width="800px">
                        <div class="card-chooseus-cta-layout">
                            <div class="chooseus-cta-spacer"></div>
                           
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- flex row -->
    </div>
    <div class="mt-4 text-center animate-box animate__animated" data-animate="animate__fadeInUp">
    <a href="{{ route('pages.about') }}" >
        Learn More About Us
    </a>
</div>


</div>

   

        <!-- Section Service -->
        <div class="section">
            @php
            $packages = DB::table('packages')->first();
            @endphp
            <div class="hero-container">
                <div class="d-flex flex-column justify-content-center text-center gspace-5">
                    <div class="d-flex flex-column justify-content-center text-center gspace-2">
                        <div class="sub-heading align-self-center animate-box animated animate__animated" data-animate="animate__fadeInDown">
                            <i class="fa-regular fa-circle-dot"></i>
                            <span>Our Core Services</span>
                        </div>
                        <h2 class="title-heading heading-container heading-container-medium animate-box animated animate__animated" data-animate="animate__fadeInDown">Digital Solutions That Drive Real Results</h2>
                    </div>
                    <div class="card-service-wrapper">
    <div class="row row-cols-xl-3 row-cols-md-2 row-cols-1 grid-spacer-2">
        @php
            $names = explode('.', $packages->name);
            $features = explode('.', $packages->features);
            $icons = [
                
              
                './image/Icon-5.png',
                './image/Icon-6.png',
                './image/Icon-4.png',
                './image/digital-marketing-icons-F4LJ4W8.png'
            ];
        @endphp

        @foreach($names as $index => $namePart)
            @php
                $featurePart = $features[$index] ?? '';
            @endphp

            @if(trim($namePart) !== '')
                <div class="col">
                    <div class="card card-service animate-box animated slow animate__animated" data-animate="animate__fadeInLeft">
                        <div class="d-flex flex-row justify-content-between gspace-2 gspace-md-3 align-items-center">
                            <div>
                                <div class="service-icon-wrapper">
                                    <div class="service-icon">
                                        <img src="{{ $icons[$index] ?? './image/default.png' }}" alt="Service Icon" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="service-title">
                                <h4>{{ trim($namePart) }}</h4>
                            </div>
                        </div>
                        <p>
                            {{ trim($featurePart) }}
                        </p>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <div class="mt-4 animate-box animate__animated" data-animate="animate__fadeInUp">
    <a href="{{ route('pages.services') }}" >
        Learn More About Our Services
    </a>
</div>

</div>

                   
                </div>
            </div>
        </div>
        <!--section portfolio-->
        @php
    $portfolios = DB::table('portfolios')->first();
@endphp

@if($portfolios)
<div class="section">
    <div class="hero-container">
        <div class="d-flex flex-column gspace-5">

            <!-- Section Header -->
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
                            <a href="./portfolio.html">Explore More</a>
                            <i class="fa-solid fa-circle-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Portfolio Grid -->
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
                                    @if(isset($portfolioImages[$index]))
                                        <img src="{{ asset('storage/' . trim($portfolioImages[$index])) }}" 
                                             alt="Portfolio Image" 
                                             style="max-height: 100%; max-width: 100%; object-fit: cover;">
                                    @else
                                        <img src="{{ asset('storage/default-image.png') }}" 
                                             alt="Portfolio Image" 
                                             style="max-height: 100%; max-width: 100%; object-fit: cover;">
                                    @endif
                                </div>
                                <div class="card-body">
                                    <a href="#" class="portfolio-link">{{ $item }}</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <!-- End Portfolio Grid -->

        </div>
    </div>
</div>
@endif



        </div>

<!-- Section Technology We Used -->
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

            <!-- Technologies Grid -->
@php
    $technologies = DB::table('techs')->where('status', 'Active')->get();
@endphp

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
    </div>
</div>

    </main>

    

    <script src="js/vendor/jquery.min.js"></script>
    <script src="js/vendor/bootstrap.bundle.min.js"></script>
    <script src="js/vendor/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/swiper-script.js"></script>
    <script src="js/submit-form.js"></script>
    <script src="js/vendor/isotope.pkgd.min.js"></script>
    <script src="js/video_embedded.js"></script>
</body>
</html>
@endsection
