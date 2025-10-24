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
                        <h5 class="card-title">Enrolled Courses</h5>
                        <h2 class="text-info"><?= count($enrolled_courses ?? []) ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-list text-success fa-3x mb-3"></i>
                        <h5 class="card-title">Available Courses</h5>
                        <h2 class="text-success"><?= count($available_courses ?? []) ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-chart-line text-warning fa-3x mb-3"></i>
                        <h5 class="card-title">Total Courses</h5>
                        <h2 class="text-warning"><?= count($enrolled_courses ?? []) + count($available_courses ?? []) ?></h2>
                    </div>
                </div>
            </div>

            <!-- Enrolled Courses Section -->
            <div class="col-12 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0">
                            <i class="fas fa-book-open"></i> My Enrolled Courses
                            <span class="badge bg-light text-dark ms-2"><?= count($enrolled_courses ?? []) ?></span>
                        </h5>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($enrolled_courses)): ?>
                            <div class="list-group">
                                <?php foreach ($enrolled_courses as $course): ?>
                                    <div class="list-group-item">
                                        <div class="d-flex w-100 justify-content-between align-items-start">
                                            <div class="flex-grow-1">
                                                <h5 class="mb-1 text-info">
                                                    <i class="fas fa-book"></i> <?= esc($course['title']) ?>
                                                </h5>
                                                <p class="mb-2 text-muted">
                                                    <?= esc($course['description'] ?? 'No description available') ?>
                                                </p>
                                                <small class="text-muted">
                                                    <i class="fas fa-chalkboard-teacher text-primary"></i>
                                                    <strong>Instructor:</strong> <?= esc($course['instructor_name'] ?? 'N/A') ?>
                                                    &nbsp;|&nbsp;
                                                    <i class="fas fa-calendar-alt text-success"></i>
                                                    <strong>Enrolled:</strong> <?= date('M d, Y', strtotime($course['enrolled_at'])) ?>
                                                </small>
                                            </div>
                                            <span class="badge bg-success ms-3">
                                                <i class="fas fa-check"></i> Enrolled
                                            </span>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-info mb-0">
                                <i class="fas fa-info-circle"></i> You are not enrolled in any courses yet. Browse available courses below to get started!
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Available Courses Section -->
            <div class="col-12 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">
                            <i class="fas fa-list"></i> Available Courses
                            <span class="badge bg-light text-dark ms-2"><?= count($available_courses ?? []) ?></span>
                        </h5>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($available_courses)): ?>
                            <div class="list-group">
                                <?php foreach ($available_courses as $course): ?>
                                    <div class="list-group-item">
                                        <div class="d-flex w-100 justify-content-between align-items-start">
                                            <div class="flex-grow-1">
                                                <h5 class="mb-1 text-success">
                                                    <i class="fas fa-book"></i> <?= esc($course['title']) ?>
                                                </h5>
                                                <p class="mb-2 text-muted">
                                                    <?= esc($course['description'] ?? 'No description available') ?>
                                                </p>
                                                <small class="text-muted">
                                                    <i class="fas fa-chalkboard-teacher text-primary"></i>
                                                    <strong>Instructor:</strong> <?= esc($course['instructor_name'] ?? 'N/A') ?>
                                                </small>
                                            </div>
                                            <button 
                                                class="btn btn-success enroll-btn ms-3" 
                                                data-course-id="<?= esc($course['id']) ?>"
                                                data-course-title="<?= esc($course['title']) ?>">
                                                <i class="fas fa-plus-circle"></i> Enroll
                                            </button>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-success mb-0">
                                <i class="fas fa-check-circle"></i> Great! You're enrolled in all available courses.
                            </div>
                        <?php endif; ?>
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

<!-- Toast Notification -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="enrollmentToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <i class="fas fa-bell me-2"></i>
            <strong class="me-auto">Notification</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" id="toastMessage">
            <!-- Message will be inserted here -->
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // AJAX Enrollment Handler with jQuery
    $(document).ready(function() {
        // Listen for click on Enroll buttons
        $('.enroll-btn').on('click', function(e) {
            e.preventDefault(); // Prevent default behavior
            
            const $button = $(this);
            const courseId = $button.data('course-id');
            const courseTitle = $button.data('course-title');
            const originalText = $button.html();
            
            // Disable button and show loading state
            $button.prop('disabled', true);
            $button.html('<i class="fas fa-spinner fa-spin"></i> Enrolling...');
            
            // Send AJAX POST request
            $.post('<?= base_url('course/enroll') ?>', {
                course_id: courseId
            })
            .done(function(response) {
                if (response.success) {
                    // Show success alert
                    const alertHtml = `
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle"></i> ${response.message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    `;
                    
                    // Insert alert at the top of the available courses section
                    $('.card-header:contains("Available Courses")').parent().find('.card-body').prepend(alertHtml);
                    
                    // Hide/disable the enroll button for this course
                    $button.closest('.list-group-item').fadeOut(400, function() {
                        $(this).remove();
                        
                        // Update available courses count
                        const availableCount = $('.card-header:contains("Available Courses") .badge');
                        const currentCount = parseInt(availableCount.text()) || 0;
                        availableCount.text(currentCount - 1);
                        
                        // Update stats card
                        const statsAvailable = $('.card-title:contains("Available Courses")').next('h2');
                        statsAvailable.text(currentCount - 1);
                        
                        // Check if no more available courses
                        if (currentCount - 1 === 0) {
                            $('.card-header:contains("Available Courses")').parent().find('.card-body').html(`
                                <div class="alert alert-success mb-0">
                                    <i class="fas fa-check-circle"></i> Great! You're enrolled in all available courses.
                                </div>
                            `);
                        }
                    });
                    
                    // Add course to enrolled list dynamically
                    const enrolledDate = new Date().toLocaleDateString('en-US', { 
                        year: 'numeric', 
                        month: 'short', 
                        day: 'numeric' 
                    });
                    
                    const enrolledHtml = `
                        <div class="list-group-item" style="display:none;">
                            <div class="d-flex w-100 justify-content-between align-items-start">
                                <div class="flex-grow-1">
                                    <h5 class="mb-1 text-info">
                                        <i class="fas fa-book"></i> ${courseTitle}
                                    </h5>
                                    <p class="mb-2 text-muted">
                                        Course details loading...
                                    </p>
                                    <small class="text-muted">
                                        <i class="fas fa-chalkboard-teacher text-primary"></i>
                                        <strong>Instructor:</strong> N/A
                                        &nbsp;|&nbsp;
                                        <i class="fas fa-calendar-alt text-success"></i>
                                        <strong>Enrolled:</strong> ${enrolledDate}
                                    </small>
                                </div>
                                <span class="badge bg-success ms-3">
                                    <i class="fas fa-check"></i> Enrolled
                                </span>
                            </div>
                        </div>
                    `;
                    
                    // Check if enrolled courses list is empty
                    const enrolledBody = $('.card-header:contains("My Enrolled Courses")').parent().find('.card-body');
                    if (enrolledBody.find('.alert-info').length > 0) {
                        // Replace the "no courses" message with the list group
                        enrolledBody.html('<div class="list-group"></div>');
                    }
                    
                    // Prepend to enrolled courses list
                    enrolledBody.find('.list-group').prepend(enrolledHtml);
                    enrolledBody.find('.list-group-item:first').fadeIn(400);
                    
                    // Update enrolled courses count
                    const enrolledCount = $('.card-header:contains("My Enrolled Courses") .badge');
                    const currentEnrolled = parseInt(enrolledCount.text()) || 0;
                    enrolledCount.text(currentEnrolled + 1);
                    
                    // Update stats card
                    const statsEnrolled = $('.card-title:contains("Enrolled Courses")').next('h2');
                    statsEnrolled.text(currentEnrolled + 1);
                    
                } else {
                    // Show error alert
                    const alertHtml = `
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle"></i> ${response.message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    `;
                    $('.card-header:contains("Available Courses")').parent().find('.card-body').prepend(alertHtml);
                    
                    // Re-enable button
                    $button.prop('disabled', false);
                    $button.html(originalText);
                }
            })
            .fail(function(xhr, status, error) {
                console.error('Error:', error);
                
                // Show error alert
                const alertHtml = `
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-triangle"></i> An error occurred. Please try again.
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                `;
                $('.card-header:contains("Available Courses")').parent().find('.card-body').prepend(alertHtml);
                
                // Re-enable button
                $button.prop('disabled', false);
                $button.html(originalText);
            });
        });
    });
</script>
</body>
</html>
