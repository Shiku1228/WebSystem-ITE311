<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-header text-center bg-primary text-white">
                    <h4>Login</h4>
                </div>
                <div class="card-body">

                    <a href="<?= base_url('/') ?>" class="btn btn-secondary mb-3">&larr; Back</a>

                    <?php if(session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                    <?php endif; ?>

                    <?php if(isset($error)): ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif; ?>
                    
                    <form action="<?= base_url('auth/login') ?>" method="post" id="loginForm">
                        
                        <div class="mb-3">
                            <label for="login-email" class="form-label">Email</label>
                            <input type="email" id="login-email" name="email" class="form-control" value="<?= old('email') ?>" autocomplete="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="login-password" class="form-label">Password</label>
                            <input type="password" id="login-password" name="password" class="form-control" autocomplete="current-password" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>

                    <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const form = document.getElementById('loginForm');
                        const button = form.querySelector('button[type="submit"]');
                        
                        // Add form submit event for user feedback
                        form.addEventListener('submit', function(e) {
                            // Show visual feedback
                            button.innerHTML = 'Logging in...';
                            button.disabled = true;
                        });
                    });
                    </script>

                    <p class="mt-3 text-center">
                        Don't have an account? <a href="<?= base_url('/auth/register') ?>">Register here</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
