@extends('layouts.website')
@section('content')
<div class="services-page">
    <!-- Header Section -->
    <header>
        <div id="header"></div>
    </header>

    <!-- Sidebar Sections -->
    <aside>
        <div id="edit-sidebar"></div>
        <div id="search-form-container"></div>
        <div id="sidebar"></div>
    </aside>

    <!-- Main Content - Centered Design -->
    <main>
        <!-- Banner Section -->
        <div class="section-banner">
            <div style="text-align: center;">
                <h2>Our Services</h2>
                <nav class="breadcrumb" style="justify-content: center; margin-top: 15px;">
                    <a href="{{ url('/') }}" style="margin: 0 10px;">Home</a>
                    <span style="margin: 0 10px;">/</span>
                    <p class="current-page" style="margin: 0;">Services</p>
                </nav>
            </div>
        </div>

        <!-- Services Introduction Section -->
        <div class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="services-content text-center">
                            <!-- Services Text Content -->
                            <div class="services-text-section mb-5">
                                <div style="text-align: center; color: #007bff; font-weight: 600; margin-bottom: 15px;">Our Expertise</div>
                                <h2 class="mb-4">Comprehensive Digital Solutions</h2>
                                <p class="lead">At Stradig Technology, we offer end-to-end digital services designed to elevate your business. From development to marketing, we provide solutions that drive real results and sustainable growth.</p>
                                <p>Our team combines technical expertise with creative thinking to deliver services that not only meet but exceed your expectations.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Services Section -->
        <div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card services-main-card" style="background-color: transparent;">
                    <div class="card-body p-5" >
                        <!-- Services Header -->
                        <div class="services-header text-center mb-5" >
                            <div class="sub-heading">Our Services</div>
                            <h2 style="color:#ffffff">What We Offer</h2>
                            <p >Comprehensive digital solutions tailored to your business needs</p>
                        </div>
                        
                        <!-- Services Grid -->
                        <div class="services-grid" >
                            <div class="row justify-content-center" >
                                <!-- Website Development -->
                                <div class="col-lg-6 col-md-6 mb-4">
                                    <div class="service-card card h-100 text-center" style="background-color: transparent;">
                                        <div class="card-body">
                                            <div class="service-icon-wrapper d-flex justify-content-center mb-3">
                                                <div class="service-icon">
                                                    <i class="fas fa-code"></i>
                                                </div>
                                            </div>
                                            <h4 class="mb-3" style="color:#ffffff">Website Development</h4>
                                            <p class="mb-3">We develop responsive, secure, and scalable websites tailored to your business needs. Our solutions combine performance with functionality.</p>
                                            <a href="#" class="service-link">Learn More <i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Software Development -->
                                <div class="col-lg-6 col-md-6 mb-4">
                                    <div class="service-card card h-100 text-center" style="background-color: transparent;">
                                        <div class="card-body">
                                            <div class="service-icon-wrapper d-flex justify-content-center mb-3">
                                                <div class="service-icon">
                                                    <i class="fas fa-laptop-code"></i>
                                                </div>
                                            </div>
                                            <h4 class="mb-3" style="color:#ffffff">Software Development</h4>
                                            <p class="mb-3">Our custom software solutions are designed to streamline business operations and boost efficiency with reliable, adaptable systems.</p>
                                            <a href="#" class="service-link">Learn More <i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- App Development -->
                                <div class="col-lg-6 col-md-6 mb-4">
                                    <div class="service-card card h-100 text-center" style="background-color: transparent;">
                                        <div class="card-body">
                                            <div class="service-icon-wrapper d-flex justify-content-center mb-3">
                                                <div class="service-icon">
                                                    <i class="fas fa-mobile-alt"></i>
                                                </div>
                                            </div>
                                            <h4 class="mb-3" style="color:#ffffff">App Development</h4>
                                            <p class="mb-3">We build powerful, user-friendly mobile applications for both Android and iOS with speed, security, and functionality at the forefront.</p>
                                            <a href="#" class="service-link">Learn More <i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Website Design -->
                                <div class="col-lg-6 col-md-6 mb-4">
                                    <div class="service-card card h-100 text-center" style="background-color: transparent;">
                                        <div class="card-body">
                                            <div class="service-icon-wrapper d-flex justify-content-center mb-3">
                                                <div class="service-icon">
                                                    <i class="fas fa-paint-brush"></i>
                                                </div>
                                            </div>
                                            <h4 class="mb-3" style="color:#ffffff">Website Design</h4>
                                            <p class="mb-3">We craft modern, visually appealing website designs that capture attention and build trust while maximizing user engagement.</p>
                                            <a href="#" class="service-link">Learn More <i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Graphics Design -->
                                <div class="col-lg-6 col-md-6 mb-4">
                                    <div class="service-card card h-100 text-center" style="background-color: transparent;">
                                        <div class="card-body">
                                            <div class="service-icon-wrapper d-flex justify-content-center mb-3">
                                                <div class="service-icon">
                                                    <i class="fas fa-palette"></i>
                                                </div>
                                            </div>
                                            <h4 class="mb-3" style="color:#ffffff">Graphics Design</h4>
                                            <p class="mb-3">Our graphic design services bring your brand's vision to life with creativity and precision across all branding materials.</p>
                                            <a href="#" class="service-link">Learn More <i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Digital Marketing -->
                                <div class="col-lg-6 col-md-6 mb-4">
                                    <div class="service-card card h-100 text-center" style="background-color: transparent;">
                                        <div class="card-body">
                                            <div class="service-icon-wrapper d-flex justify-content-center mb-3">
                                                <div class="service-icon">
                                                    <i class="fas fa-bullhorn"></i>
                                                </div>
                                            </div>
                                            <h4 class="mb-3" style="color:#ffffff">Digital Marketing</h4>
                                            <p class="mb-3">We deliver data-driven digital marketing strategies that elevate your online presence and drive measurable business growth.</p>
                                            <a href="#" class="service-link">Learn More <i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- SEO Services -->
                                <div class="col-lg-6 col-md-6 mb-4">
                                    <div class="service-card card h-100 text-center" style="background-color: transparent;">
                                        <div class="card-body">
                                            <div class="service-icon-wrapper d-flex justify-content-center mb-3">
                                                <div class="service-icon">
                                                    <i class="fas fa-search"></i>
                                                </div>
                                            </div>
                                            <h4 class="mb-3" style="color:#ffffff">SEO Services</h4>
                                            <p class="mb-3">Our SEO strategies are crafted to improve your search engine rankings and organic traffic through comprehensive optimization.</p>
                                            <a href="#" class="service-link">Learn More <i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- UI/UX Design -->
                                <div class="col-lg-6 col-md-6 mb-4">
                                    <div class="service-card card h-100 text-center" style="background-color: transparent;">
                                        <div class="card-body">
                                            <div class="service-icon-wrapper d-flex justify-content-center mb-3">
                                                <div class="service-icon">
                                                    <i class="fas fa-user-circle"></i>
                                                </div>
                                            </div>
                                            <h4 class="mb-3" style="color:#ffffff">UI/UX Design</h4>
                                            <p class="mb-3">We design digital experiences that are intuitive, user-friendly, and conversion-focused to enhance usability and engagement.</p>
                                            <a href="#" class="service-link">Learn More <i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Video Editing -->
                                <div class="col-lg-6 col-md-6 mb-4">
                                    <div class="service-card card h-100 text-center" style="background-color: transparent;">
                                        <div class="card-body">
                                            <div class="service-icon-wrapper d-flex justify-content-center mb-3">
                                                <div class="service-icon">
                                                    <i class="fas fa-video"></i>
                                                </div>
                                            </div>
                                            <h4 class="mb-3" style="color:#ffffff">Video Editing</h4>
                                            <p class="mb-3">Our video editing services transform raw footage into polished, professional content that connects with your audience.</p>
                                            <a href="#" class="service-link">Learn More <i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.service-card {
    border: none;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    padding: 30px 20px;
    height: 100%;
    
}

.service-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.15);
}

.service-icon-wrapper {
    width: 100%;
    background: transparent;
}

.service-icon {
    /* Transparent background - no background color */
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    background: transparent;
    
}

.service-icon i {
    font-size: 3rem;
   background: transparent;
    transition: all 0.3s ease;
}

.service-card:hover .service-icon i {
   
    transform: scale(1.1);
}

.service-card h4 {
    color: #2c3e50;
    font-weight: 600;
    font-size: 1.3rem;
    margin-top: 15px;
}

.service-card p {
    color: #6c757d;
    line-height: 1.6;
    font-size: 0.95rem;
}

.service-link {
    color: #667eea;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.95rem;
    transition: color 0.3s ease;
    display: inline-block;
    margin-top: 10px;
}

.service-link:hover {
    color: #764ba2;
}

.service-link i {
    margin-left: 5px;
    transition: transform 0.3s ease;
}

.service-link:hover i {
    transform: translateX(3px);
}

.services-main-card {
    border: none;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    overflow: hidden;
    background: #ffffff;
}

.services-header .sub-heading {
    color: #667eea;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    font-size: 0.9rem;
    margin-bottom: 10px;
}

.services-header h2 {
    color: #2c3e50;
    font-weight: 700;
    margin-bottom: 15px;
}

.services-header .text-muted {
    font-size: 1.1rem;
    color: #6c757d !important;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .service-card {
        padding: 25px 15px;
    }
    
    .service-icon i {
        font-size: 2.5rem;
    }
    
    .services-main-card .card-body {
        padding: 30px 20px !important;
    }
}

@media (max-width: 576px) {
    .service-card {
        margin-bottom: 20px;
    }
    
    .service-icon i {
        font-size: 2.2rem;
    }
    
    .service-card h4 {
        font-size: 1.2rem;
    }
}
</style>
        <!-- Process Section -->
        <div class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="text-center mb-5">
                            <div class="sub-heading">Our Process</div>
                            <h2>How We Deliver Excellence</h2>
                            <p class="lead">A structured approach to ensure quality and success in every project</p>
                        </div>
                        
                        <!-- Process Steps -->
                        <div class="process-steps">
                            <div class="row">
                                <!-- Step 1 -->
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="process-step card h-100 text-center">
                                        <div class="card-body">
                                            <div class="step-number mb-3">01</div>
                                            <h4 class="mb-3">Discovery & Planning</h4>
                                            <p class="mb-0">We begin by understanding your goals, audience, and requirements to create a comprehensive project plan.</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Step 2 -->
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="process-step card h-100 text-center">
                                        <div class="card-body">
                                            <div class="step-number mb-3">02</div>
                                            <h4 class="mb-3">Design & Development</h4>
                                            <p class="mb-0">Our team creates and builds your solution with attention to detail, usability, and technical excellence.</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Step 3 -->
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="process-step card h-100 text-center">
                                        <div class="card-body">
                                            <div class="step-number mb-3">03</div>
                                            <h4 class="mb-3">Testing & Quality Assurance</h4>
                                            <p class="mb-0">We rigorously test every aspect to ensure optimal performance, security, and user experience.</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Step 4 -->
                                <div class="col-lg-6 col-md-6 mb-4">
                                    <div class="process-step card h-100 text-center">
                                        <div class="card-body">
                                            <div class="step-number mb-3">04</div>
                                            <h4 class="mb-3">Deployment & Launch</h4>
                                            <p class="mb-0">We handle the complete deployment process ensuring a smooth and successful launch.</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Step 5 -->
                                <div class="col-lg-6 col-md-6 mb-4">
                                    <div class="process-step card h-100 text-center">
                                        <div class="card-body">
                                            <div class="step-number mb-3">05</div>
                                            <h4 class="mb-3">Support & Maintenance</h4>
                                            <p class="mb-0">We provide ongoing support and maintenance to keep your solution running smoothly.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Why Choose Our Services Section -->
        <div class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="text-center mb-5">
                            <div class="sub-heading">Why Choose Us</div>
                            <h2>Why Our Services Stand Out</h2>
                            <p class="lead">Discover what makes our service delivery exceptional and reliable</p>
                        </div>
                        
                        <!-- Service Benefits -->
                        <div class="service-benefits">
                            <div class="row">
                                <!-- Benefit 1 -->
                                <div class="col-lg-6 mb-4">
                                    <div class="benefit-point card h-100 text-center">
                                        <div class="card-body">
                                            <div class="benefit-icon mb-3">
                                                <i class="fa-solid fa-clock"></i>
                                            </div>
                                            <h4 class="mb-3">Timely Delivery</h4>
                                            <p class="mb-0">We respect deadlines and deliver projects on time without compromising quality.</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Benefit 2 -->
                                <div class="col-lg-6 mb-4">
                                    <div class="benefit-point card h-100 text-center">
                                        <div class="card-body">
                                            <div class="benefit-icon mb-3">
                                                <i class="fa-solid fa-medal"></i>
                                            </div>
                                            <h4 class="mb-3">Quality Assurance</h4>
                                            <p class="mb-0">Every project undergoes rigorous testing to ensure the highest quality standards.</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Benefit 3 -->
                                <div class="col-lg-6 mb-4">
                                    <div class="benefit-point card h-100 text-center">
                                        <div class="card-body">
                                            <div class="benefit-icon mb-3">
                                                <i class="fa-solid fa-headset"></i>
                                            </div>
                                            <h4 class="mb-3">Dedicated Support</h4>
                                            <p class="mb-0">We provide continuous support and are always available to address your concerns.</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Benefit 4 -->
                                <div class="col-lg-6 mb-4">
                                    <div class="benefit-point card h-100 text-center">
                                        <div class="card-body">
                                            <div class="benefit-icon mb-3">
                                                <i class="fa-solid fa-lightbulb"></i>
                                            </div>
                                            <h4 class="mb-3">Innovative Solutions</h4>
                                            <p class="mb-0">We stay updated with the latest technologies to provide cutting-edge solutions.</p>
                                        </div>
                                    </div>
                                </div>
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
                            <h3 class="mb-3">Ready to Start Your Project?</h3>
                            <p class="mb-4">Let's discuss how our services can help transform your business.</p>
                            <a href="./contact.html" class="cta-button btn btn-primary btn-lg">Get Started Today</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div id="footer"></div>
    </footer>

    <!-- Scripts -->
    <script src="js/script.js"></script>
</div>

<style>
.services-page {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.section-banner {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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

.services-main-card {
    border: none;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    overflow: hidden;
}

.service-card {
    border: none;
    border-radius: 10px;
    transition: transform 0.3s, box-shadow 0.3s;
    padding: 20px;
}

.service-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.15);
}

.service-icon {
    font-size: 2.5rem;
    color: #007bff;
    margin-bottom: 20px;
}

.service-link {
    color: #007bff;
    text-decoration: none;
    font-weight: 600;
    transition: color 0.3s;
}

.service-link:hover {
    color: #0056b3;
}

.process-step, .benefit-point {
    border: none;
    border-radius: 10px;
    transition: transform 0.3s;
    padding: 30px 20px;
}

.process-step:hover, .benefit-point:hover {
    transform: translateY(-5px);
}

.step-number {
    font-size: 2rem;
    font-weight: 700;
    color: #007bff;
    opacity: 0.7;
}

.benefit-icon {
    font-size: 2.5rem;
    color: #007bff;
    margin-bottom: 20px;
}

.section-cta {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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

/* Responsive adjustments */
@media (max-width: 768px) {
    .section-banner h2 {
        font-size: 2rem;
    }
    
    .section {
        padding: 60px 0;
    }
    
    .services-main-card .card-body {
        padding: 30px 20px;
    }
}
</style>
@endsection