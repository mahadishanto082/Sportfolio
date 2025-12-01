@extends('layouts.website')
@section('content')
<div class="testimonials-page">
    <!-- Header Section -->
    <header>
        <div id="header">
            @include('partials.header')
        </div>
    </header>

    <!-- Sidebar Sections -->
    <aside>
        <div id="edit-sidebar">
            @include('partials.edit-sidebar')
        </div>
        <div id="search-form-container">
            @include('partials.search-form')
        </div>
        <div id="sidebar">
            @include('partials.sidebar')
        </div>
    </aside>

    <!-- Main Content - Centered Design -->
    <main>
        <!-- Banner Section -->
        <div class="section-banner">
            <div style="text-align: center;">
                <h2>Testimonials</h2>
                <nav class="breadcrumb" style="justify-content: center; margin-top: 15px;">
                    <a href="{{ url('/') }}" style="margin: 0 10px;">Home</a>
                    <span style="margin: 0 10px;">/</span>
                    <p class="current-page" style="margin: 0;">Testimonials</p>
                </nav>
            </div>
        </div>

        <!-- Testimonials Introduction Section -->
        <div class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="testimonials-content text-center">
                            <div class="testimonials-text-section mb-5">
                                <div class="sub-heading">Client Feedback</div>
                                <h2 class="mb-4" style="color: #ffffff;">What Our Clients Say</h2>
                                <p class="lead" style="color: #ffffff;">Discover how businesses like yours achieved outstanding growth with our expert digital marketing solutions. Read real success stories from our satisfied clients.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Testimonials Section -->
        <div class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="card testimonials-main-card" style="background-color: transparent;">
                            <div class="card-body p-5">
                                <!-- Testimonials Header -->
                                <div class="testimonials-header text-center mb-5">
                                    <div class="sub-heading">Client Reviews</div>
                                    <h2 style="color:#ffffff">Real Success Stories</h2>
                                    <p style="color: #ffffff;">Hear from businesses that transformed their digital presence with our services</p>
                                </div>
                                
                                <!-- Testimonials Stats Grid -->
                                <div class="testimonials-stats-grid mb-5">
                                    <div class="row justify-content-center text-center">
                                        <div class="col-lg-3 col-md-6 mb-4">
                                            <div class="stat-card card h-100 text-center" style="background-color: transparent;">
                                                <div class="card-body">
                                                    <div class="stat-icon-wrapper d-flex justify-content-center mb-3">
                                                        <div class="stat-icon">
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <h3 class="mb-2" style="color:#ffffff">4.9/5</h3>
                                                    <p class="mb-0" style="color: #ffffff;">Average Rating</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-3 col-md-6 mb-4">
                                            <div class="stat-card card h-100 text-center" style="background-color: transparent;">
                                                <div class="card-body">
                                                    <div class="stat-icon-wrapper d-flex justify-content-center mb-3">
                                                        <div class="stat-icon">
                                                            <i class="fas fa-users"></i>
                                                        </div>
                                                    </div>
                                                    <h3 class="mb-2" style="color:#ffffff">500+</h3>
                                                    <p class="mb-0" style="color: #ffffff;">Happy Clients</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-3 col-md-6 mb-4">
                                            <div class="stat-card card h-100 text-center" style="background-color: transparent;">
                                                <div class="card-body">
                                                    <div class="stat-icon-wrapper d-flex justify-content-center mb-3">
                                                        <div class="stat-icon">
                                                            <i class="fas fa-project-diagram"></i>
                                                        </div>
                                                    </div>
                                                    <h3 class="mb-2" style="color:#ffffff">1200+</h3>
                                                    <p class="mb-0" style="color: #ffffff;">Projects Completed</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-3 col-md-6 mb-4">
                                            <div class="stat-card card h-100 text-center" style="background-color: transparent;">
                                                <div class="card-body">
                                                    <div class="stat-icon-wrapper d-flex justify-content-center mb-3">
                                                        <div class="stat-icon">
                                                            <i class="fas fa-award"></i>
                                                        </div>
                                                    </div>
                                                    <h3 class="mb-2" style="color:#ffffff">98%</h3>
                                                    <p class="mb-0" style="color: #ffffff;">Client Retention</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Testimonials Grid -->
                                <div class="testimonials-grid">
                                    <div class="row justify-content-center">
                                        @foreach($testimonials as $testimonial)
                                        <div class="col-lg-6 col-md-6 mb-4">
                                            <div class="testimonial-card card h-100 text-center" style="background-color: transparent;">
                                                <div class="card-body">
                                                    <div class="stars mb-3">
                                                        @for($i = 0; $i < 5; $i++)
                                                        <i class="fas fa-star"></i>
                                                        @endfor
                                                    </div>
                                                    <p class="testimonial-text mb-4" style="color: #ffffff;">"{{ $testimonial['quote'] }}"</p>
                                                    <div class="testimonial-author">
                                                        <div class="author-image mb-3">
                                                            <img src="{{ asset($testimonial['image']) }}" alt="{{ $testimonial['name'] }}" class="img-fluid rounded-circle">
                                                        </div>
                                                        <h5 class="mb-1" style="color:#ffffff">{{ $testimonial['name'] }}</h5>
                                                        <p class="mb-0 author-position" style="color: #ffffff;">{{ $testimonial['position'] }}</p>
                                                        <p class="company" style="color: #007bff;">{{ $testimonial['company'] }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Video Testimonials Section -->
        <div class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="text-center mb-5">
                            <div class="sub-heading">Video Reviews</div>
                            <h2 style="color:#ffffff">See What Our Clients Say</h2>
                            <p class="lead" style="color: #ffffff;">Watch real clients share their experiences and success stories</p>
                        </div>
                        
                        <!-- Video Testimonials -->
                        <div class="video-testimonials">
                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div class="video-testimonial-card card h-100 text-center" style="background-color: transparent;">
                                        <div class="card-body">
                                            <div class="video-thumbnail mb-4">
                                                <img src="{{ asset('image/video-thumbnail-1.jpg') }}" alt="Video Testimonial" class="img-fluid rounded">
                                                <button class="play-btn" data-video="https://www.youtube.com/embed/VIDEO_ID_1">
                                                    <i class="fas fa-play"></i>
                                                </button>
                                            </div>
                                            <h4 style="color:#ffffff">Emma's Success Story</h4>
                                            <p style="color: #ffffff;">CEO shares how we helped grow their business</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6 mb-4">
                                    <div class="video-testimonial-card card h-100 text-center" style="background-color: transparent;">
                                        <div class="card-body">
                                            <div class="video-thumbnail mb-4">
                                                <img src="{{ asset('image/video-thumbnail-2.jpg') }}" alt="Video Testimonial" class="img-fluid rounded">
                                                <button class="play-btn" data-video="https://www.youtube.com/embed/VIDEO_ID_2">
                                                    <i class="fas fa-play"></i>
                                                </button>
                                            </div>
                                            <h4 style="color:#ffffff">David's Experience</h4>
                                            <p style="color: #ffffff;">Marketing Director discusses our partnership</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Client Success Stories Section -->
        <div class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="text-center mb-5">
                            <div class="sub-heading">Success Metrics</div>
                            <h2 style="color:#ffffff">Measurable Results</h2>
                            <p class="lead" style="color: #ffffff;">See the tangible impact we've delivered for our clients</p>
                        </div>
                        
                        <!-- Success Stories -->
                        <div class="success-stories">
                            <div class="row">
                                @foreach($successStories as $story)
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="success-card card h-100 text-center" style="background-color: transparent;">
                                        <div class="card-body">
                                            <div class="success-icon mb-3">
                                                <i class="{{ $story['icon'] }}"></i>
                                            </div>
                                            <h3 class="mb-2" style="color:#ffffff">{{ $story['metric'] }}</h3>
                                            <h5 class="mb-3" style="color:#ffffff">{{ $story['title'] }}</h5>
                                            <p class="mb-0" style="color: #ffffff;">{{ $story['description'] }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="section-cta">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <div class="cta-content">
                            <h3 class="mb-3">Ready to Become Our Next Success Story?</h3>
                            <p class="mb-4">Join hundreds of satisfied clients who have transformed their business with our services.</p>
                            <a href="{{ route('contact') }}" class="cta-button btn btn-primary btn-lg">Start Your Journey Today</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Video Modal -->
        <div id="videoModal" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="background: transparent; border: none;">
                    <div class="modal-header" style="border: none;">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body p-0">
                        <div class="ratio ratio-16x9">
                            <iframe id="testimonialVideo" src="" allow="autoplay" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div id="footer">
            @include('partials.footer')
        </div>
    </footer>
</div>

<style>
.testimonials-page {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #1a2a6c, #b21f1f, #fdbb2d);
    min-height: 100vh;
}

.section-banner {
    background: rgba(0, 0, 0, 0.3);
    color: white;
    padding: 80px 0 60px;
    text-align: center;
}

.section-banner h2 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 0;
}

.breadcrumb {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 15px;
}

.breadcrumb a {
    color: rgba(255,255,255,0.8);
    text-decoration: none;
    transition: color 0.3s;
}

.breadcrumb a:hover {
    color: white;
}

.breadcrumb .current-page {
    color: white;
    font-weight: 600;
    margin: 0;
}

.section {
    padding: 80px 0;
}

.sub-heading {
    color: #007bff;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-size: 0.9rem;
    margin-bottom: 15px;
}

/* Card Styles */
.testimonials-main-card,
.stat-card,
.testimonial-card,
.video-testimonial-card,
.success-card {
    border: none;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    padding: 30px 20px;
    height: 100%;
    background: rgba(255, 255, 255, 0.1) !important;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.testimonials-main-card:hover,
.stat-card:hover,
.testimonial-card:hover,
.video-testimonial-card:hover,
.success-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.15);
    background: rgba(255, 255, 255, 0.15) !important;
}

/* Icon Styles */
.stat-icon-wrapper,
.success-icon {
    width: 100%;
    background: transparent;
}

.stat-icon i,
.success-icon i {
    font-size: 3rem;
    color: #007bff;
    background: transparent;
    transition: all 0.3s ease;
}

.stat-card:hover .stat-icon i,
.success-card:hover .success-icon i {
    transform: scale(1.1);
}

/* Stars */
.stars {
    color: #ffd700;
    font-size: 1.2rem;
}

/* Testimonial Text */
.testimonial-text {
    font-style: italic;
    line-height: 1.6;
    font-size: 1.1rem;
}

/* Author Image */
.author-image img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border: 3px solid #007bff;
}

.author-position {
    font-size: 0.9rem;
    opacity: 0.8;
}

.company {
    font-weight: 600;
    font-size: 0.9rem;
}

/* Video Thumbnail */
.video-thumbnail {
    position: relative;
    border-radius: 10px;
    overflow: hidden;
}

.video-thumbnail img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.play-btn {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.9);
    border: none;
    color: #007bff;
    font-size: 1.5rem;
    transition: all 0.3s ease;
}

.play-btn:hover {
    background: white;
    transform: translate(-50%, -50%) scale(1.1);
}

/* CTA Section */
.section-cta {
    background: rgba(0, 0, 0, 0.3);
    color: white;
    padding: 80px 0;
    text-align: center;
}

.cta-button {
    background: white;
    color: #667eea;
    border: none;
    padding: 12px 30px;
    border-radius: 50px;
    font-weight: 600;
    transition: all 0.3s;
}

.cta-button:hover {
    background: #f8f9fa;
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.2);
}

/* Video Modal */
.modal-content {
    background: transparent !important;
}

.btn-close-white {
    filter: invert(1);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .section-banner h2 {
        font-size: 2rem;
    }
    
    .section {
        padding: 60px 0;
    }
    
    .testimonials-main-card .card-body {
        padding: 30px 20px;
    }
    
    .stat-icon i,
    .success-icon i {
        font-size: 2.5rem;
    }
}

@media (max-width: 576px) {
    .testimonial-card,
    .stat-card,
    .success-card {
        margin-bottom: 20px;
    }
    
    .author-image img {
        width: 60px;
        height: 60px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Video modal functionality
    const playButtons = document.querySelectorAll('.play-btn');
    const videoModal = new bootstrap.Modal(document.getElementById('videoModal'));
    const videoIframe = document.getElementById('testimonialVideo');
    
    playButtons.forEach(button => {
        button.addEventListener('click', function() {
            const videoUrl = this.getAttribute('data-video');
            videoIframe.src = videoUrl;
            videoModal.show();
        });
    });
    
    // Reset video when modal is closed
    document.getElementById('videoModal').addEventListener('hidden.bs.modal', function () {
        videoIframe.src = '';
    });
    
    // Animation on scroll
    const animateOnScroll = function() {
        const elements = document.querySelectorAll('.testimonial-card, .stat-card, .success-card');
        
        elements.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            const elementVisible = 150;
            
            if (elementTop < window.innerHeight - elementVisible) {
                element.style.opacity = "1";
                element.style.transform = "translateY(0)";
            }
        });
    };
    
    // Set initial state for animation
    const cards = document.querySelectorAll('.testimonial-card, .stat-card, .success-card');
    cards.forEach(card => {
        card.style.opacity = "0";
        card.style.transform = "translateY(20px)";
        card.style.transition = "opacity 0.6s ease, transform 0.6s ease";
    });
    
    window.addEventListener('scroll', animateOnScroll);
    // Initial check
    animateOnScroll();
});
</script>
@endsection