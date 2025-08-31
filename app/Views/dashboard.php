<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-12">
        <div class="jumbotron bg-success text-white p-5 rounded mb-4">
            <h1 class="display-4">Welcome, <?= session()->get('name') ?>!</h1>
            <p class="lead">You are successfully logged into your dashboard.</p>
            <hr class="my-4">
            <p>Manage your account and explore the system features.</p>
            <a class="btn btn-light btn-lg" href="<?= base_url('/') ?>" role="button">Go to Homepage</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body text-center">
                <h5 class="card-title">
                    <i class="fas fa-user-circle text-primary fa-3x"></i>
                </h5>
                <h5 class="card-title">Profile Management</h5>
                <p class="card-text">Update your personal information and account settings.</p>
                <a href="#" class="btn btn-primary">Manage Profile</a>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body text-center">
                <h5 class="card-title">
                    <i class="fas fa-chart-bar text-success fa-3x"></i>
                </h5>
                <h5 class="card-title">Analytics</h5>
                <p class="card-text">View your activity statistics and usage reports.</p>
                <a href="#" class="btn btn-success">View Analytics</a>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body text-center">
                <h5 class="card-title">
                    <i class="fas fa-cog text-info fa-3x"></i>
                </h5>
                <h5 class="card-title">Settings</h5>
                <p class="card-text">Configure your account preferences and security settings.</p>
                <a href="#" class="btn btn-info">Settings</a>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5>Account Information</h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <td><strong>User ID:</strong></td>
                        <td><?= session()->get('userID') ?></td>
                    </tr>
                    <tr>
                        <td><strong>Username:</strong></td>
                        <td><?= session()->get('name') ?></td>
                    </tr>
                    <tr>
                        <td><strong>Email:</strong></td>
                        <td><?= session()->get('email') ?></td>
                    </tr>
                    <tr>
                        <td><strong>Role:</strong></td>
                        <td><span class="badge bg-primary"><?= ucfirst(session()->get('role')) ?></span></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card bg-light">
            <div class="card-header">
                <h5>Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="<?= base_url('/') ?>" class="btn btn-outline-primary">
                        <i class="fas fa-home"></i> Homepage
                    </a>
                    <a href="<?= base_url('about') ?>" class="btn btn-outline-info">
                        <i class="fas fa-info-circle"></i> About
                    </a>
                    <a href="<?= base_url('contact') ?>" class="btn btn-outline-secondary">
                        <i class="fas fa-envelope"></i> Contact
                    </a>
                    <hr>
                    <a href="<?= base_url('auth/logout') ?>" class="btn btn-outline-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
