<?php
/**
 * Example Page Using Header and Footer Templates
 * 
 * This demonstrates how to use the dynamic header and footer templates
 * in your views throughout the application.
 */
?>

<?= view('templates/header', ['title' => 'Example Page - LMS System']) ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0"><i class="fas fa-file-alt"></i> Example Page</h3>
                </div>
                <div class="card-body">
                    <h4>How to Use the Dynamic Header Template</h4>
                    <p class="lead">The header template automatically displays role-specific navigation based on the logged-in user.</p>
                    
                    <hr>
                    
                    <h5>Features:</h5>
                    <ul>
                        <li><strong>Responsive Design:</strong> Mobile-friendly navigation with collapsible menu</li>
                        <li><strong>Role-Based Navigation:</strong> Different menu items for Admin, Instructor, and Student</li>
                        <li><strong>Active Link Highlighting:</strong> Current page is highlighted in the navigation</li>
                        <li><strong>User Dropdown:</strong> Quick access to profile, settings, and logout</li>
                        <li><strong>Flash Messages:</strong> Automatic display of success, error, warning, and info messages</li>
                    </ul>

                    <hr>

                    <h5>Usage Example:</h5>
                    <pre class="bg-light p-3 rounded"><code>&lt;?= view('templates/header', ['title' => 'Your Page Title']) ?&gt;

&lt;div class="container mt-5"&gt;
    &lt;!-- Your page content here --&gt;
&lt;/div&gt;

&lt;?= view('templates/footer') ?&gt;</code></pre>

                    <hr>

                    <h5>Role-Specific Navigation Items:</h5>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="card border-danger">
                                <div class="card-header bg-danger text-white">
                                    <i class="fas fa-user-shield"></i> Admin
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-users"></i> Manage Users</li>
                                        <li><i class="fas fa-chalkboard-teacher"></i> Manage Instructors</li>
                                        <li><i class="fas fa-user-graduate"></i> Manage Students</li>
                                        <li><i class="fas fa-cog"></i> System Settings</li>
                                        <li><i class="fas fa-chart-bar"></i> Reports</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-success">
                                <div class="card-header bg-success text-white">
                                    <i class="fas fa-chalkboard-teacher"></i> Instructor
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-book"></i> My Classes</li>
                                        <li><i class="fas fa-tasks"></i> Assignments</li>
                                        <li><i class="fas fa-user-graduate"></i> Students</li>
                                        <li><i class="fas fa-clipboard-list"></i> Grades</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-info">
                                <div class="card-header bg-info text-white">
                                    <i class="fas fa-user-graduate"></i> Student
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-book-open"></i> My Courses</li>
                                        <li><i class="fas fa-tasks"></i> Assignments</li>
                                        <li><i class="fas fa-chart-line"></i> My Grades</li>
                                        <li><i class="fas fa-calendar-alt"></i> Schedule</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= view('templates/footer') ?>
