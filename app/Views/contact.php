<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-12">
        <!-- header, emphasized part -->
        <div class="jumbotron bg-primary text-white p-5 rounded mb-4">
            <h1 class="display-4">Contact Us</h1>
            <p class="lead">Get in touch with our team for support, questions, or feedback.</p>
            <hr class="my-4">
            <p>We're here to help you make the most of our system.</p>
            <a class="btn btn-light btn-lg" href="<?= base_url('/') ?>" role="button">Back to Home</a>
        </div>
    </div>
</div>

<div class="row">
    <!-- here describe the features hehe -->
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">
                    <i class="fas fa-envelope text-primary"></i> Email Us
                </h5>
                <p class="card-text">Send us an email for general inquiries or support requests.</p>
                <p><strong>support@websystem.com</strong></p>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">
                    <i class="fas fa-phone text-success"></i> Call Us
                </h5>
                <p class="card-text">Speak directly with our support team during business hours.</p>
                <p><strong>+1 (555) 123-4567</strong></p>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">
                    <i class="fas fa-map-marker-alt text-info"></i> Visit Us
                </h5>
                <p class="card-text">Come visit our office for in-person consultations.</p>
                <p><strong>123 Tech Street, Silicon Valley, CA</strong></p>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-lg-8">
        <h2>Get in Touch</h2>
        <p class="lead">We'd love to hear from you! Whether you have questions, need support, or want to provide feedback, we're here to help.</p>
        
        <h3>Contact Form</h3>
        <form class="mt-4">
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" required>
            </div>
            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" id="subject" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
    </div>
    
    <div class="col-lg-4">
        <div class="card bg-light">
            <div class="card-header">
                <h5>Office Hours</h5>
            </div>
            <div class="card-body">
                <p><strong>Monday - Friday:</strong><br>9:00 AM - 6:00 PM PST</p>
                <p><strong>Saturday:</strong><br>10:00 AM - 4:00 PM PST</p>
                <p><strong>Sunday:</strong><br>Closed</p>
                <hr>
                <p class="text-center"><small>Emergency support available 24/7</small></p>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-body text-center">
                <h5>Need Quick Help?</h5>
                <p>Check out our documentation</p>
                <a href="<?= base_url('about') ?>" class="btn btn-primary">View Features</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
