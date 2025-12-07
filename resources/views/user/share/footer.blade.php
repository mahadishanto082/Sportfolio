<div class="section-footer">
    @php
        $footer = DB::table('footercontents')->first();
    @endphp
    <div class="bg-footer-wrapper">
        <div class="bg-footer">
            <div class="hero-container position-relative z-2">
                <div class="d-flex flex-column gspace-2">
                    <div class="row row-cols-xl-4 row-cols-md-2 row-cols-1 grid-spacer-5">
                        <div class="col col-xl-4">
                            <div class="footer-logo-container">
                                <div class="logo-container-footer">
                                <a href="{{ route('home') }}">
                     <img src="{{ asset('public/' . $headerContent->logo) }}" alt="Logo" height="150px" weight="150px">

                    </a> 
                
                                </div>
                                <h4>Stradig Tech</h4>
                                <p>
                                From Design to Development — We Deliver Digital Success.Innovating Ideas, Empowering Businesses.

                                </p>
                            </div>
                        </div>
                        <div class="col col-xl-2">
                            <div class="footer-quick-links">
                                <h5>Quick Links</h5>
                                <ul class="footer-list">
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li><a href="{{ route('pages.about') }}">About Us</a></li>
                                    <li><a href="{{ route(('pages.services')) }}">Service</a></li>
                                
                                    <li><a href="{{ route('pages.contact') }}">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col col-xl-3">
                            <div class="footer-services-container">
                                <h5>Services</h5>
                                <ul class="footer-list">
                                    <li><a href="./single_services.html">Social Media Marketing</a></li>
                                    <li><a href="./single_services.html">SEO Optimization</a></li>
                                    <li><a href="./single_services.html">Web Development</a></li>
                                    
                                    <li><a href="./single_services.html">Digital Marketing</a></li>

                                    <li><a href="./single_services.html">Content Marketing</a></li>
                                    <li><a href="./single_services.html">Branding Strategy</a></li>
                                    <li><a href="./single_services.html">Email Marketing</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col col-xl-3">
                            <div class="footer-contact-container">
                                <h5>Contact Info</h5>
                                <ul class="contact-list">
                                   
                                <li>
                                    <i class="bi bi-telephone-fill me-2"></i>
                                    <a href="tel:+8801717489175">+8801717489175</a>
                                </li>

                                <div class="mt-3">
                                    <iframe 
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.6676986142924!2d90.42585767477634!3d23.7608514891468!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c796b0fffa0b%3A0x2a46a2ed44a9f313!2sNotun%20Bazar%2C%20Badda%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1700000000000"
                                        width="100%" 
                                        height="250" 
                                        style="border:0;" 
                                        allowfullscreen="" 
                                        loading="lazy">
                                    </iframe>
                                </div>

                                </ul>
                                <div class="d-flex flex-column gspace-1">
                                    <h5>Social Media</h5>
                                    <div class="social-container">
                                        <div class="social-item-wrapper">
                                            <a href="https://www.facebook.com/stradigtech" class="social-item">
                                                <i class="fa-brands fa-facebook"></i>
                                            </a>
                                        </div>
                                        <div class="social-item-wrapper">
                                            <a href="https://youtube.com" class="social-item">
                                                <i class="fa-brands fa-youtube"></i>
                                            </a>
                                        </div>
                                        <div class="social-item-wrapper">    
                                            <a href="https://instagram.com/stradigtech" class="social-item">
                                                <i class="fa-brands fa-instagram"></i>
                                            </a>
                                        </div>
                                        <div class="social-item-wrapper">
                                            <a href="https://www.linkedin.com/in/stradigtech" class="social-item">
                                                <i class="fa-brands fa-linkedin"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-content-spacer"></div>
                </div>
                <div class="copyright-container">
                    <span class="copyright">© 2025 Stradigtech All Rights Reserved.</span>
                    <div class="d-flex flex-row gspace-2">
                    <a href="#" class="legal-link">Terms of Service</a>
                    <a href="#" class="legal-link">Privacy Policy</a>
                </div>
                </div>
                <div class="footer-spacer"></div>
            </div>
        </div>
    </div>
</div>