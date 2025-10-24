<?php
/**
 * Test script to verify enrollment functionality
 * Access via: http://localhost/ITE311-LATANGGA/test_enrollment.php
 */

// Database connection
$dsn = "mysql:host=localhost;dbname=lms_latangga;charset=utf8mb4";
$pdo = new PDO($dsn, 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

echo "<h1>Enrollment System Test</h1>";
echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet'>";
echo "<div class='container mt-4'>";

// Check for students
echo "<h3>1. Students in Database</h3>";
$stmt = $pdo->query("SELECT id, name, email, role FROM users WHERE role = 'student'");
$students = $stmt->fetchAll();

if (empty($students)) {
    echo "<div class='alert alert-warning'>⚠️ No students found. Creating a test student...</div>";
    
    // Create test student
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role, created_at, updated_at) VALUES (?, ?, ?, ?, NOW(), NOW())");
    $stmt->execute(['Test Student', 'student@test.com', password_hash('password123', PASSWORD_DEFAULT), 'student']);
    echo "<div class='alert alert-success'>✅ Created test student: student@test.com / password123</div>";
    
    // Fetch again
    $stmt = $pdo->query("SELECT id, name, email, role FROM users WHERE role = 'student'");
    $students = $stmt->fetchAll();
}

echo "<table class='table table-bordered'>";
echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Role</th></tr>";
foreach ($students as $student) {
    echo "<tr><td>{$student['id']}</td><td>{$student['name']}</td><td>{$student['email']}</td><td><span class='badge bg-info'>{$student['role']}</span></td></tr>";
}
echo "</table>";

// Check for instructors
echo "<h3>2. Instructors in Database</h3>";
$stmt = $pdo->query("SELECT id, name, email, role FROM users WHERE role = 'instructor'");
$instructors = $stmt->fetchAll();

if (empty($instructors)) {
    echo "<div class='alert alert-warning'>⚠️ No instructors found. Creating a test instructor...</div>";
    
    // Create test instructor
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role, created_at, updated_at) VALUES (?, ?, ?, ?, NOW(), NOW())");
    $stmt->execute(['Test Instructor', 'instructor@test.com', password_hash('password123', PASSWORD_DEFAULT), 'instructor']);
    echo "<div class='alert alert-success'>✅ Created test instructor: instructor@test.com / password123</div>";
    
    // Fetch again
    $stmt = $pdo->query("SELECT id, name, email, role FROM users WHERE role = 'instructor'");
    $instructors = $stmt->fetchAll();
}

echo "<table class='table table-bordered'>";
echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Role</th></tr>";
foreach ($instructors as $instructor) {
    echo "<tr><td>{$instructor['id']}</td><td>{$instructor['name']}</td><td>{$instructor['email']}</td><td><span class='badge bg-success'>{$instructor['role']}</span></td></tr>";
}
echo "</table>";

// Check for courses
echo "<h3>3. Courses in Database</h3>";
$stmt = $pdo->query("SELECT c.id, c.title, c.description, u.name as instructor_name FROM courses c JOIN users u ON c.instructor_id = u.id");
$courses = $stmt->fetchAll();

if (empty($courses)) {
    echo "<div class='alert alert-warning'>⚠️ No courses found. Creating test courses...</div>";
    
    // Get first instructor
    $instructorId = $instructors[0]['id'];
    
    // Create test courses
    $testCourses = [
        ['Web Development Fundamentals', 'Learn HTML, CSS, and JavaScript basics'],
        ['Database Design', 'Master SQL and database normalization'],
        ['PHP Programming', 'Build dynamic web applications with PHP'],
        ['CodeIgniter Framework', 'Learn MVC architecture with CodeIgniter'],
        ['React.js Essentials', 'Build modern UIs with React']
    ];
    
    $stmt = $pdo->prepare("INSERT INTO courses (title, description, instructor_id) VALUES (?, ?, ?)");
    foreach ($testCourses as $course) {
        $stmt->execute([$course[0], $course[1], $instructorId]);
    }
    
    echo "<div class='alert alert-success'>✅ Created 5 test courses</div>";
    
    // Fetch again
    $stmt = $pdo->query("SELECT c.id, c.title, c.description, u.name as instructor_name FROM courses c JOIN users u ON c.instructor_id = u.id");
    $courses = $stmt->fetchAll();
}

echo "<table class='table table-bordered'>";
echo "<tr><th>ID</th><th>Title</th><th>Description</th><th>Instructor</th></tr>";
foreach ($courses as $course) {
    echo "<tr><td>{$course['id']}</td><td>{$course['title']}</td><td>{$course['description']}</td><td>{$course['instructor_name']}</td></tr>";
}
echo "</table>";

// Check enrollments
echo "<h3>4. Current Enrollments</h3>";
$stmt = $pdo->query("SELECT e.id, u.name as student_name, c.title as course_title, e.enrolled_at 
                     FROM enrollments e 
                     JOIN users u ON e.user_id = u.id 
                     JOIN courses c ON e.course_id = c.id");
$enrollments = $stmt->fetchAll();

if (empty($enrollments)) {
    echo "<div class='alert alert-info'>ℹ️ No enrollments yet. This is expected for a fresh setup.</div>";
} else {
    echo "<table class='table table-bordered'>";
    echo "<tr><th>ID</th><th>Student</th><th>Course</th><th>Enrolled At</th></tr>";
    foreach ($enrollments as $enrollment) {
        echo "<tr><td>{$enrollment['id']}</td><td>{$enrollment['student_name']}</td><td>{$enrollment['course_title']}</td><td>{$enrollment['enrolled_at']}</td></tr>";
    }
    echo "</table>";
}

// Testing instructions
echo "<hr>";
echo "<h3>5. Testing Instructions</h3>";
echo "<div class='alert alert-primary'>";
echo "<h5>📋 Follow these steps to test the enrollment system:</h5>";
echo "<ol>";
echo "<li><strong>Login as Student:</strong> Go to <a href='/ITE311-LATANGGA/auth/login' target='_blank'>Login Page</a></li>";
echo "<li><strong>Credentials:</strong> Use <code>student@test.com</code> / <code>password123</code></li>";
echo "<li><strong>Navigate to Dashboard:</strong> After login, you'll be redirected to the dashboard</li>";
echo "<li><strong>Test Enrollment:</strong>";
echo "<ul>";
echo "<li>Scroll to the 'Available Courses' section</li>";
echo "<li>Click the <strong>Enroll</strong> button on any course</li>";
echo "<li>Verify the page does NOT reload</li>";
echo "<li>Verify a success alert appears at the top</li>";
echo "<li>Verify the course disappears from Available Courses</li>";
echo "<li>Verify the course appears in Enrolled Courses section</li>";
echo "<li>Verify all counters update correctly</li>";
echo "</ul>";
echo "</li>";
echo "</ol>";
echo "</div>";

echo "<div class='alert alert-success'>";
echo "<h5>✅ Expected Behavior:</h5>";
echo "<ul>";
echo "<li>✓ No page reload when clicking Enroll</li>";
echo "<li>✓ Green success alert appears</li>";
echo "<li>✓ Course fades out from Available Courses</li>";
echo "<li>✓ Course fades in to Enrolled Courses</li>";
echo "<li>✓ Badge counters update automatically</li>";
echo "<li>✓ Stats cards update automatically</li>";
echo "</ul>";
echo "</div>";

echo "<div class='alert alert-warning'>";
echo "<h5>🔍 What to Check:</h5>";
echo "<ul>";
echo "<li>Open browser Developer Tools (F12)</li>";
echo "<li>Go to Console tab to see any JavaScript errors</li>";
echo "<li>Go to Network tab to see AJAX requests</li>";
echo "<li>Look for POST request to <code>/course/enroll</code></li>";
echo "<li>Check the response is JSON with success: true</li>";
echo "</ul>";
echo "</div>";

echo "<hr>";
echo "<h3>6. Quick Links</h3>";
echo "<div class='btn-group' role='group'>";
echo "<a href='/ITE311-LATANGGA/auth/login' class='btn btn-primary' target='_blank'>Login Page</a>";
echo "<a href='/ITE311-LATANGGA/dashboard' class='btn btn-info' target='_blank'>Dashboard</a>";
echo "<a href='/ITE311-LATANGGA/auth/logout' class='btn btn-secondary' target='_blank'>Logout</a>";
echo "</div>";

echo "</div>";
?>
