<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if(session()->getFlashdata('success')): ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                <?php endif; ?>

                <?php if(isset($validation)): ?>
                    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                <?php endif; ?>

                <?php if(isset($error)): ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>


                <div class="card shadow">
                    <div class="card-body">
                        <a href="<?= base_url('/') ?>" class="btn btn-secondary mb-3">&larr; Back</a>
                        <h3 class="card-title mb-4 text-center">Register</h3>
                        <form action="<?= base_url('auth/register') ?>" method="post">
                            <div class="mb-3">
                                <label for="register-name" class="form-label">Name</label>
                                <input type="text" id="register-name" name="name" class="form-control" autocomplete="name" value="<?= old('name') ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="register-email" class="form-label">Email</label>
                                <input type="email" id="register-email" name="email" class="form-control" autocomplete="email" value="<?= old('email') ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="register-role" class="form-label">Role</label>
                                <select id="register-role" name="role" class="form-control" autocomplete="organization-title" required>
                                    <option value="student" <?= old('role') === 'student' ? 'selected' : '' ?>>Student</option>
                                    <option value="instructor" <?= old('role') === 'instructor' ? 'selected' : '' ?>>Instructor</option>
                                    <option value="admin" <?= old('role') === 'admin' ? 'selected' : '' ?>>Admin</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="register-password" class="form-label">Password</label>
                                <input type="password" id="register-password" name="password" class="form-control" autocomplete="new-password" required>
                            </div>
                            <div class="mb-3">
                                <label for="register-password-confirm" class="form-label">Confirm Password</label>
                                <input type="password" id="register-password-confirm" name="password_confirm" class="form-control" autocomplete="new-password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100" onclick="console.log('Form submitted');">Register</button>
                        </form>
                        <script>
                        document.querySelector('form').addEventListener('submit', function(e) {
                            console.log('Form submission detected');
                            console.log('Form action:', this.action);
                            console.log('Form method:', this.method);
                        });
                        </script>
                        <p class="mt-3 text-center">Already have an account? <a href="<?= base_url('/auth/login') ?>">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
