<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - LMS System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url('/') ?>">
            <i class="fas fa-graduation-cap"></i> LMS System
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <span class="nav-link text-white">
                        <i class="fas fa-user-circle"></i> <?= esc($name) ?>
                    </span>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/auth/logout') ?>" class="nav-link text-white">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <!-- Welcome Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="card-title mb-3">
                        <i class="fas fa-home text-primary"></i> Welcome, <?= esc($name) ?>!
                    </h2>
                    <p class="text-muted mb-0">
                        Role: <span class="badge bg-<?= $role === 'admin' ? 'danger' : ($role === 'instructor' ? 'success' : 'info') ?> fs-6">
                            <i class="fas fa-<?= $role === 'admin' ? 'user-shield' : ($role === 'instructor' ? 'chalkboard-teacher' : 'user-graduate') ?>"></i>
                            <?= ucfirst(esc($role)) ?>
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Role-Specific Content -->
    <div class="row">

        <?php if ($role === 'admin'): ?>
            <!-- Admin Dashboard Content -->
            <div class="col-12">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-danger text-white">
                        <h4 class="mb-0"><i class="fas fa-user-shield"></i> Admin Dashboard</h4>
                    </div>
                    <div class="card-body">
                        <p class="lead">Manage users, instructors, students, and system settings.</p>
                    </div>
                </div>
            </div>

            <!-- Admin Stats Cards -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-users text-primary fa-3x mb-3"></i>
                        <h5 class="card-title">Total Users</h5>
                        <h2 class="text-primary"><?= esc($total_users ?? 0) ?></h2>
                        <a href="#" class="btn btn-outline-primary mt-2">Manage Users</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-chalkboard-teacher text-success fa-3x mb-3"></i>
                        <h5 class="card-title">Instructors</h5>
                        <h2 class="text-success"><?= esc($total_instructors ?? 0) ?></h2>
                        <a href="#" class="btn btn-outline-success mt-2">View Instructors</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-user-graduate text-info fa-3x mb-3"></i>
                        <h5 class="card-title">Students</h5>
                        <h2 class="text-info"><?= esc($total_students ?? 0) ?></h2>
                        <a href="#" class="btn btn-outline-info mt-2">View Students</a>
                    </div>
                </div>
            </div>

        <?php elseif ($role === 'instructor'): ?>
            <!-- Instructor Dashboard Content -->
            <div class="col-12">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0"><i class="fas fa-chalkboard-teacher"></i> Instructor Dashboard</h4>
                    </div>
                    <div class="card-body">
                        <p class="lead">Manage your classes, assignments, and student grades.</p>
                    </div>
                </div>
            </div>

            <!-- Instructor Stats Cards -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-book text-success fa-3x mb-3"></i>
                        <h5 class="card-title">My Classes</h5>
                        <h2 class="text-success"><?= esc($total_classes ?? 0) ?></h2>
                        <a href="#" class="btn btn-outline-success mt-2">View Classes</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-tasks text-warning fa-3x mb-3"></i>
                        <h5 class="card-title">Assignments</h5>
                        <h2 class="text-warning"><?= esc($total_assignments ?? 0) ?></h2>
                        <a href="#" class="btn btn-outline-warning mt-2">Manage Assignments</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-user-graduate text-primary fa-3x mb-3"></i>
                        <h5 class="card-title">Students</h5>
                        <h2 class="text-primary"><?= esc($total_students ?? 0) ?></h2>
                        <a href="#" class="btn btn-outline-primary mt-2">View Students</a>
                    </div>
                </div>
            </div>

        <?php else: ?>
            <!-- Student Dashboard Content -->
            <div class="col-12">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-info text-white">
                        <h4 class="mb-0"><i class="fas fa-user-graduate"></i> Student Dashboard</h4>
                    </div>
                    <div class="card-body">
                        <p class="lead">Access your courses, assignments, and track your academic progress.</p>
                    </div>
                </div>
            </div>

            <!-- Student Stats Cards -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-book-open text-info fa-3x mb-3"></i>
                        <h5 class="card-title">My Courses</h5>
                        <h2 class="text-info"><?= esc($total_courses ?? 0) ?></h2>
                        <a href="#" class="btn btn-outline-info mt-2">View Courses</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-tasks text-warning fa-3x mb-3"></i>
                        <h5 class="card-title">Assignments</h5>
                        <h2 class="text-warning"><?= esc($pending_assignments ?? 0) ?></h2>
                        <a href="#" class="btn btn-outline-warning mt-2">View Assignments</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-chart-line text-success fa-3x mb-3"></i>
                        <h5 class="card-title">My Grades</h5>
                        <h2 class="text-success"><?= esc($gpa ?? 'N/A') ?></h2>
                        <a href="#" class="btn btn-outline-success mt-2">View Grades</a>
                    </div>
                </div>
            </div>

        <?php endif; ?>

    </div>

    <!-- Account Information & Quick Actions -->
    <div class="row mt-4">
        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-info-circle"></i> Account Information</h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless mb-0">
                        <tr>
                            <td><strong><i class="fas fa-user"></i> Name:</strong></td>
                            <td><?= esc($name) ?></td>
                        </tr>
                        <tr>
                            <td><strong><i class="fas fa-envelope"></i> Email:</strong></td>
                            <td><?= esc($email) ?></td>
                        </tr>
                        <tr>
                            <td><strong><i class="fas fa-id-badge"></i> Role:</strong></td>
                            <td>
                                <span class="badge bg-<?= $role === 'admin' ? 'danger' : ($role === 'instructor' ? 'success' : 'info') ?>">
                                    <?= ucfirst(esc($role)) ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td><strong><i class="fas fa-hashtag"></i> User ID:</strong></td>
                            <td><?= str_pad(session()->get('id'), 6, '0', STR_PAD_LEFT) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0"><i class="fas fa-bolt"></i> Quick Actions</h5>
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
                        <hr class="my-2">
                        <a href="<?= base_url('auth/logout') ?>" class="btn btn-outline-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
