@extends('layouts.website')
@section('content')
<div class="about-page">
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
            <div  style="text-align: center;">
                <h2> Stradig Technology</h2>
               
            </div>
        </div>

        <!-- About Us Section -->
        <div class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="about-content text-center">
                            <!-- About Text Content -->
                            <div class="about-text-section mb-5">
                            <div  style="text-align: center;">About Us</div>

                                <h2 class="mb-4">Who We Are & What Drives Us</h2>
                                <p class="lead">At Stradig Technology, we are a team of passionate innovators committed to delivering advanced digital solutions for modern businesses. Our goal is to empower brands with technology that drives growth, enhances visibility, and improves customer engagement.</p>
                                <p>With expertise across development, design, and digital strategy, we bring creativity and innovation together to create impactful results for our clients.</p>
                            </div>

                            <!-- Image with Counter -->
                            <div class="about-image-section" style="position: relative; display: inline-block; border-radius: 10px; overflow: hidden;">
                            <img src="/image/tech-team.jpg" alt="Stradig Technology Team" style="width:100%; border-radius:10px;">

    <div class="experience-counter" style="
        position: absolute;
        bottom: 20px;
        left: 20px;
        background: rgba(255,255,255,0.9);
        padding: 15px 25px;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    ">
        <span class="counter" style="font-size: 28px; font-weight: bold; color: #007bff;">5</span><span style="font-weight: bold; color: #007bff;">+</span>
        <h6 style="margin-top: 5px; font-size: 14px; color: #333; display: flex; align-items: center; gap: 5px;">
            <span style="font-size:16px;">🏆</span>Years of Digital Excellence
        </h6>
    </div>
</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Team Section in Card Layout -->
        <div class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="card team-card">
                            <div class="card-body p-5">
                                <!-- Team Header -->
                                <div class="team-header text-center mb-5">
                                    <div class="sub-heading">Our Team</div>
                                    <h2>Meet Our Expert Team</h2>
                                    <p class="text-muted">The passionate individuals behind Stradig Technology's success</p>
                                </div>
                                
                                <!-- Team Members Grid -->
                                <div class="team-members">
                                    <div class="row justify-content-center">
                                        <!-- Team Member 1 -->
                                        <div class="col-lg-6 col-md-6 mb-4">
                                            <div class="team-member-card card h-100 text-center">
                                                <div class="card-body">
                                                    <img src="./image/faysal-hasan.jpg" alt="Faysal Hasan" class="team-img rounded-circle mb-3">
                                                    <div class="social-links mb-3">
                                                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                                        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                                                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                                    </div>
                                                    <h4 class="mb-2">Faysal Hasan</h4>
                                                    <span class="text-primary">CEO, Lead Digital Marketing & SEO</span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Team Member 2 -->
                                        <div class="col-lg-6 col-md-6 mb-4">
                                            <div class="team-member-card card h-100 text-center">
                                                <div class="card-body">
                                                    <img src="./image/mahadi-shanto.jpg" alt="Mahadi Shanto" class="team-img rounded-circle mb-3">
                                                    <div class="social-links mb-3">
                                                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                                        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                                                        <a href="#"><i class="fa-brands fa-github"></i></a>
                                                    </div>
                                                    <h4 class="mb-2">Mahadi Shanto</h4>
                                                    <span class="text-primary">Lead Web Development</span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Team Member 3 -->
                                        <div class="col-lg-6 col-md-6 mb-4">
                                            <div class="team-member-card card h-100 text-center">
                                                <div class="card-body">
                                                    <img src="./image/md-sabuj.jpg" alt="Md. Sabuj" class="team-img rounded-circle mb-3">
                                                    <div class="social-links mb-3">
                                                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                                        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                                                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                                    </div>
                                                    <h4 class="mb-2">Md. Sabuj</h4>
                                                    <span class="text-primary">Planning & Strategy Making</span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Team Member 4 -->
                                        <div class="col-lg-6 col-md-6 mb-4">
                                            <div class="team-member-card card h-100 text-center">
                                                <div class="card-body">
                                                    <img src="./image/swrup-paul.jpg" alt="Swrup Paul" class="team-img rounded-circle mb-3">
                                                    <div class="social-links mb-3">
                                                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                                        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                                                        <a href="#"><i class="fa-brands fa-behance"></i></a>
                                                    </div>
                                                    <h4 class="mb-2">Swrup Paul</h4>
                                                    <span class="text-primary">Graphic Designer</span>
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

        <!-- Why Choose Us Section -->
        <div class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="text-center mb-5">
                            <div class="sub-heading">Why Choose Us</div>
                            <h2>Why Clients Choose Stradig Tech</h2>
                            <p class="lead">Discover what makes us different and why businesses trust us with their digital transformation</p>
                        </div>
                        
                        <!-- Why Choose Us Points -->
                        <div class="why-choose-points">
                            <div class="row">
                                <!-- Point 1 -->
                                <div class="col-lg-6 mb-4">
                                    <div class="choose-point card h-100 text-center">
                                        <div class="card-body">
                                            <div class="point-icon mb-3">
                                                <i class="fa-solid fa-globe"></i>
                                            </div>
                                            <h4 class="mb-3">Local Presence, Global Standards</h4>
                                            <p class="mb-0">Based in Dhaka with delivery that matches international best practices.</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Point 2 -->
                                <div class="col-lg-6 mb-4">
                                    <div class="choose-point card h-100 text-center">
                                        <div class="card-body">
                                            <div class="point-icon mb-3">
                                                <i class="fa-solid fa-layer-group"></i>
                                            </div>
                                            <h4 class="mb-3">End-to-End Delivery</h4>
                                            <p class="mb-0">Strategy, design, development and launch — one team, one deadline.</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Point 3 -->
                                <div class="col-lg-6 mb-4">
                                    <div class="choose-point card h-100 text-center">
                                        <div class="card-body">
                                            <div class="point-icon mb-3">
                                                <i class="fa-solid fa-shield-alt"></i>
                                            </div>
                                            <h4 class="mb-3">Performance & Security First</h4>
                                            <p class="mb-0">Fast-loading sites, secure code, and scalable architectures.</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Point 4 -->
                                <div class="col-lg-6 mb-4">
                                    <div class="choose-point card h-100 text-center">
                                        <div class="card-body">
                                            <div class="point-icon mb-3">
                                                <i class="fa-solid fa-chart-line"></i>
                                            </div>
                                            <h4 class="mb-3">Transparent Pricing & Timelines</h4>
                                            <p class="mb-0">Clear proposals, milestones, and regular updates.</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Point 5 - Full Width -->
                                <div class="col-12">
                                    <div class="choose-point card text-center">
                                        <div class="card-body">
                                            <div class="point-icon mb-3">
                                                <i class="fa-solid fa-handshake"></i>
                                            </div>
                                            <h4 class="mb-3">Long-Term Partnerships</h4>
                                            <p class="mb-0">We don't just build — we support, iterate and grow with you.</p>
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
                            <h3 class="mb-3">Ready to Transform Your Digital Presence?</h3>
                            <p class="mb-4">Let's create something amazing together with Stradig Technology.</p>
                            <a href="./contact.html" class="cta-button btn btn-primary btn-lg">Start Your Project</a>
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
@endsection