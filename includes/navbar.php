<?php
/**
 * Navigation Bar Component
 */
 
$current_page = get_current_page();
?>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="<?php echo SITE_URL; ?>/">
            <img src="<?php echo IMAGES_PATH; ?>/logo/logo.png" alt="<?php echo SITE_NAME; ?>" class="me-2" style="height: 50px;" loading="eager" fetchpriority="high" decoding="async" onerror="this.style.display='none'">
            <div>
                <strong class="d-block"><?php echo SITE_NAME; ?></strong>
                <small class="d-block text-primary" style="font-size: 0.7rem;">Exhibition Stall Designer</small>
            </div>
        </a>
        
        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Navigation Menu -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link <?php echo is_active_page('index'); ?>" href="<?php echo SITE_URL; ?>/">
                        <i class="fas fa-home me-1"></i> Home
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link <?php echo is_active_page('about'); ?>" href="<?php echo SITE_URL; ?>/about.php">
                        <i class="fas fa-info-circle me-1"></i> About
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link <?php echo is_active_page('services'); ?>" href="<?php echo SITE_URL; ?>/services.php">
                        <i class="fas fa-cogs me-1"></i> Services
                    </a>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?php echo (is_active_page('portfolio') || is_active_page('projects') || is_active_page('project-details')) ? 'active' : ''; ?>" href="#" id="projectsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-briefcase me-1"></i> Projects
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="projectsDropdown">
                        <li><a class="dropdown-item" href="<?php echo SITE_URL; ?>/portfolio.php">
                            <i class="fas fa-images me-2"></i> Portfolio Gallery
                        </a></li>
                        <li><a class="dropdown-item" href="<?php echo SITE_URL; ?>/projects.php">
                            <i class="fas fa-map-marker-alt me-2"></i> Global Projects
                        </a></li>
                    </ul>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link <?php echo is_active_page('contact'); ?>" href="<?php echo SITE_URL; ?>/contact.php">
                        <i class="fas fa-envelope me-1"></i> Contact
                    </a>
                </li>
                
                <li class="nav-item ms-lg-2">
                    <a class="btn btn-primary btn-sm" href="<?php echo SITE_URL; ?>/contact.php#quote">
                        <i class="fas fa-quote-right me-1"></i> Get Quote
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Top Info Bar (Optional - Can be enabled/disabled) -->
<?php if (false): // Set to true to enable top bar ?>
<div class="top-bar bg-primary text-white py-2 d-none d-md-block">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <small>
                    <i class="fas fa-phone me-2"></i> <?php echo get_setting('company_phone', '+91 8092471472'); ?>
                    <span class="mx-3">|</span>
                    <i class="fas fa-envelope me-2"></i> <?php echo get_setting('company_email', 'info@conceptworld.in'); ?>
                </small>
            </div>
            <div class="col-md-6 text-end">
                <small>
                    <?php if (FACEBOOK_URL): ?>
                    <a href="<?php echo FACEBOOK_URL; ?>" class="text-white me-2" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <?php endif; ?>
                    
                    <?php if (INSTAGRAM_URL): ?>
                    <a href="<?php echo INSTAGRAM_URL; ?>" class="text-white me-2" target="_blank"><i class="fab fa-instagram"></i></a>
                    <?php endif; ?>
                    
                    <?php if (LINKEDIN_URL): ?>
                    <a href="<?php echo LINKEDIN_URL; ?>" class="text-white me-2" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    <?php endif; ?>
                </small>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
