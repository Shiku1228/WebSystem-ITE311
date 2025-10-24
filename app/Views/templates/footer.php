    <!-- Footer -->
    <footer class="bg-dark text-white mt-5 py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h5><i class="fas fa-graduation-cap"></i> LMS System</h5>
                    <p class="text-muted">A comprehensive Learning Management System for students, instructors, and administrators.</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="<?= base_url('/') ?>" class="text-muted text-decoration-none"><i class="fas fa-home"></i> Home</a></li>
                        <li><a href="<?= base_url('about') ?>" class="text-muted text-decoration-none"><i class="fas fa-info-circle"></i> About</a></li>
                        <li><a href="<?= base_url('contact') ?>" class="text-muted text-decoration-none"><i class="fas fa-envelope"></i> Contact</a></li>
                        <?php if (session()->get('isLoggedIn')): ?>
                            <li><a href="<?= base_url('dashboard') ?>" class="text-muted text-decoration-none"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>Connect With Us</h5>
                    <div class="social-links">
                        <a href="#" class="text-muted me-3"><i class="fab fa-facebook fa-2x"></i></a>
                        <a href="#" class="text-muted me-3"><i class="fab fa-twitter fa-2x"></i></a>
                        <a href="#" class="text-muted me-3"><i class="fab fa-linkedin fa-2x"></i></a>
                        <a href="#" class="text-muted"><i class="fab fa-instagram fa-2x"></i></a>
                    </div>
                </div>
            </div>
            <hr class="bg-secondary">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="mb-0 text-muted">
                        &copy; <?= date('Y') ?> LMS System. All rights reserved. 
                        <?php if (session()->get('isLoggedIn')): ?>
                            | Logged in as <strong><?= esc(session()->get('name')) ?></strong> (<?= ucfirst(esc(session()->get('role'))) ?>)
                        <?php endif; ?>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Auto-dismiss alerts after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                setTimeout(function() {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }, 5000);
            });
        });
    </script>
</body>
</html>
