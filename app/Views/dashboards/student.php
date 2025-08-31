<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">LMS - Student Portal</a>
            <div class="navbar-nav ms-auto">
                <span class="navbar-text me-3">Welcome, <?= $user['name'] ?></span>
                <a class="btn btn-outline-light btn-sm" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <?php if(session()->getFlashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                
                <div class="card">
                    <div class="card-header">
                        <h4>Student Dashboard</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Profile Information</h5>
                                <p><strong>Name:</strong> <?= $user['name'] ?></p>
                                <p><strong>Email:</strong> <?= $user['email'] ?></p>
                                <p><strong>Role:</strong> <?= ucfirst($user['role']) ?></p>
                            </div>
                            <div class="col-md-6">
                                <h5>Quick Actions</h5>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="button">View Courses</button>
                                    <button class="btn btn-secondary" type="button">View Assignments</button>
                                    <button class="btn btn-info" type="button">View Grades</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
