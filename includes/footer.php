    <!-- Footer -->
    <footer class="bg-dark text-white pt-5 pb-3">
        <div class="container">
            <div class="row g-4">
                <!-- Company Info -->
                <div class="col-lg-4 col-md-6">
                    <h4 class="mb-4 text-primary">About <?php echo SITE_NAME; ?></h4>
                    <p class="text-white-50">
                        Leading exhibition stall designer and stand builders in Patna, Bihar. 
                        We offer premium exhibition booth design, fabrication, and installation 
                        services for trade shows, expos, and exhibitions across India.
                    </p>
                    <div class="social-links mt-3">
                        <?php if (FACEBOOK_URL): ?>
                        <a href="<?php echo FACEBOOK_URL; ?>" class="btn btn-outline-primary btn-sm me-2" target="_blank" rel="noopener">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <?php endif; ?>
                        
                        <?php if (INSTAGRAM_URL): ?>
                        <a href="<?php echo INSTAGRAM_URL; ?>" class="btn btn-outline-primary btn-sm me-2" target="_blank" rel="noopener">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <?php endif; ?>
                        
                        <?php if (LINKEDIN_URL): ?>
                        <a href="<?php echo LINKEDIN_URL; ?>" class="btn btn-outline-primary btn-sm me-2" target="_blank" rel="noopener">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <?php endif; ?>
                        
                        <?php if (TWITTER_URL): ?>
                        <a href="<?php echo TWITTER_URL; ?>" class="btn btn-outline-primary btn-sm me-2" target="_blank" rel="noopener">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <?php endif; ?>
                        
                        <?php if (YOUTUBE_URL): ?>
                        <a href="<?php echo YOUTUBE_URL; ?>" class="btn btn-outline-primary btn-sm" target="_blank" rel="noopener">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div class="col-lg-2 col-md-6">
                    <h5 class="mb-4 text-primary">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="<?php echo SITE_URL; ?>/" class="text-white-50 text-decoration-none hover-primary">Home</a></li>
                        <li class="mb-2"><a href="<?php echo SITE_URL; ?>/about.php" class="text-white-50 text-decoration-none hover-primary">About Us</a></li>
                        <li class="mb-2"><a href="<?php echo SITE_URL; ?>/services.php" class="text-white-50 text-decoration-none hover-primary">Services</a></li>
                        <li class="mb-2"><a href="<?php echo SITE_URL; ?>/portfolio.php" class="text-white-50 text-decoration-none hover-primary">Portfolio</a></li>
                        <li class="mb-2"><a href="<?php echo SITE_URL; ?>/projects.php" class="text-white-50 text-decoration-none hover-primary">Patna Projects</a></li>
                        <li class="mb-2"><a href="<?php echo SITE_URL; ?>/contact.php" class="text-white-50 text-decoration-none hover-primary">Contact Us</a></li>
                    </ul>
                </div>
                
                <!-- Our Services -->
                <div class="col-lg-3 col-md-6">
                    <h5 class="mb-4 text-primary">Our Services</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-chevron-right text-primary me-2"></i><span class="text-white-50">Exhibition Stall Design</span></li>
                        <li class="mb-2"><i class="fas fa-chevron-right text-primary me-2"></i><span class="text-white-50">Booth Fabrication</span></li>
                        <li class="mb-2"><i class="fas fa-chevron-right text-primary me-2"></i><span class="text-white-50">Complete Installation</span></li>
                        <li class="mb-2"><i class="fas fa-chevron-right text-primary me-2"></i><span class="text-white-50">3D Visualization</span></li>
                        <li class="mb-2"><i class="fas fa-chevron-right text-primary me-2"></i><span class="text-white-50">Modular Stands</span></li>
                        <li class="mb-2"><i class="fas fa-chevron-right text-primary me-2"></i><span class="text-white-50">Turnkey Solutions</span></li>
                    </ul>
                </div>
                
                <!-- Contact Info -->
                <div class="col-lg-3 col-md-6">
                    <h5 class="mb-4 text-primary">Contact Info</h5>
                    <ul class="list-unstyled">
                        <li class="mb-3 text-white-50">
                            <i class="fas fa-map-marker-alt text-primary me-2"></i>
                            <?php echo get_setting('company_address', 'MM Media Exhibitions LLP, Shastri Nagar, Patna, Bihar'); ?>
                        </li>
                        <li class="mb-3">
                            <i class="fas fa-phone text-primary me-2"></i>
                            <a href="tel:<?php echo str_replace(' ', '', get_setting('company_phone')); ?>" class="text-white-50 text-decoration-none">
                                <?php echo get_setting('company_phone', '+91 8092471472'); ?>
                            </a>
                        </li>
                        <li class="mb-3">
                            <i class="fas fa-envelope text-primary me-2"></i>
                            <a href="mailto:<?php echo get_setting('company_email'); ?>" class="text-white-50 text-decoration-none">
                                <?php echo get_setting('company_email', 'info@conceptworld.in'); ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <hr class="bg-secondary my-4">
            
            <!-- Copyright -->
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0 text-white-50">
                        &copy; <?php echo date('Y'); ?> <strong><?php echo SITE_NAME; ?></strong>. All Rights Reserved.
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0 text-white-50">
                        Designed & Developed with <i class="fas fa-heart text-danger"></i> by <?php echo SITE_NAME; ?>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Scroll to Top Button -->
    <button id="scrollTopBtn" class="btn btn-primary scroll-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>
    
    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/918092471472" class="whatsapp-float" target="_blank" rel="noopener" title="Chat on WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>
    
    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <!-- AOS Animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <!-- Custom JS -->
    <script src="<?php echo JS_PATH; ?>/main.js"></script>
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });
        
        // Preloader
        window.addEventListener('load', function() {
            document.getElementById('preloader').style.display = 'none';
        });
        
        // Scroll to Top
        const scrollTopBtn = document.getElementById('scrollTopBtn');
        
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                scrollTopBtn.classList.add('show');
            } else {
                scrollTopBtn.classList.remove('show');
            }
        });
        
        scrollTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
        
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.pageYOffset > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
    
</body>
</html>
