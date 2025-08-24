<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-12">
        <!-- header, emphasized part -->
        <div class="jumbotron bg-primary text-white p-5 rounded mb-4">
            <h1 class="display-4">This is the About Page</h1>
            <p class="lead">A modern web application built with CodeIgniter 4 framework.</p>
            <hr class="my-4">
            <p>Explore our features and discover what makes our system unique.</p>
            <a class="btn btn-light btn-lg" href="<?= base_url('about') ?>" role="button">Learn More</a>
        </div>
    </div>
</div>

<div class="row">
    <!-- here describe the features hehe -->
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">
                    <i class="fas fa-rocket text-primary"></i> Fast Performance
                </h5>
                <p class="card-text">Built with CodeIgniter 4, our system delivers lightning-fast performance and optimal user experience.</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">
                    <i class="fas fa-shield-alt text-success"></i> Secure
                </h5>
                <p class="card-text">Advanced security features and best practices ensure your data is protected at all times.</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">
                    <i class="fas fa-mobile-alt text-info"></i> Responsive
                </h5>
                <p class="card-text">Fully responsive design that works perfectly on desktop, tablet, and mobile devices.</p>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-lg-8">
        <h2>About Our System</h2>
        <p class="lead">This web system is designed to provide a comprehensive solution for modern web applications.</p>
        <p>Our platform combines the power of CodeIgniter 4 framework with modern web technologies to deliver a robust, scalable, and user-friendly experience. Whether you're managing data, processing transactions, or building complex workflows, our system provides the tools and flexibility you need.</p>
        
        <h3>Key Features:</h3>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>MVC Architecture:</strong> Clean separation of concerns for maintainable code</li>
            <li class="list-group-item"><strong>Database Integration:</strong> Seamless database operations with built-in ORM</li>
            <li class="list-group-item"><strong>RESTful APIs:</strong> Easy integration with external services and applications</li>
            <li class="list-group-item"><strong>User Authentication:</strong> Secure user management and access control</li>
            <li class="list-group-item"><strong>Bootstrap UI:</strong> Modern, responsive user interface components</li>
        </ul>
    </div>
    
    <div class="col-lg-4">
        <div class="card bg-light">
            <div class="card-header">
                <h5>Quick Stats</h5>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-6">
                        <h3 class="text-primary">100%</h3>
                        <small>Uptime</small>
                    </div>
                    <div class="col-6">
                        <h3 class="text-success">24/7</h3>
                        <small>Support</small>
                    </div>
                </div>
                <hr>
                <div class="row text-center">
                    <div class="col-6">
                        <h3 class="text-info">Fast</h3>
                        <small>Loading</small>
                    </div>
                    <div class="col-6">
                        <h3 class="text-warning">Secure</h3>
                        <small>Data</small>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-body text-center">
                <h5>Get Started Today</h5>
                <p>Ready to explore our system?</p>
                <a href="<?= base_url('contact') ?>" class="btn btn-primary">Contact Us</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
