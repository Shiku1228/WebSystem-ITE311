<?php
/**
 * Simple interface to add courses to the database
 */

session_start();

echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet'>";
echo "<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css' rel='stylesheet'>";
echo "<div class='container mt-5'>";
echo "<h2><i class='fas fa-book-medical'></i> Add New Course</h2>";

$dsn = "mysql:host=localhost;dbname=lms_latangga;charset=utf8mb4";
try {
    $pdo = new PDO($dsn, 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    
    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_course'])) {
        $title = trim($_POST['title']);
        $description = trim($_POST['description']);
        $instructorId = $_POST['instructor_id'];
        
        if (!empty($title) && !empty($instructorId)) {
            $stmt = $pdo->prepare("INSERT INTO courses (title, description, instructor_id) VALUES (?, ?, ?)");
            if ($stmt->execute([$title, $description, $instructorId])) {
                echo "<div class='alert alert-success alert-dismissible fade show'>";
                echo "<i class='fas fa-check-circle'></i> Course added successfully!";
                echo "<button type='button' class='btn-close' data-bs-dismiss='alert'></button>";
                echo "</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Title and Instructor are required!</div>";
        }
    }
    
    // Get all instructors
    $stmt = $pdo->query("SELECT id, name, email FROM users WHERE role = 'instructor'");
    $instructors = $stmt->fetchAll();
    
    if (empty($instructors)) {
        echo "<div class='alert alert-warning'>";
        echo "No instructors found. Please create an instructor account first.";
        echo " <a href='/ITE311-LATANGGA/auth/register' class='alert-link'>Register as Instructor</a>";
        echo "</div>";
    }
    
    // Add course form
    echo "<div class='card shadow mb-4'>";
    echo "<div class='card-header bg-primary text-white'>";
    echo "<h5 class='mb-0'><i class='fas fa-plus-circle'></i> Add New Course</h5>";
    echo "</div>";
    echo "<div class='card-body'>";
    echo "<form method='POST'>";
    
    echo "<div class='mb-3'>";
    echo "<label class='form-label'>Course Title *</label>";
    echo "<input type='text' name='title' class='form-control' required placeholder='e.g., Web Development Fundamentals'>";
    echo "</div>";
    
    echo "<div class='mb-3'>";
    echo "<label class='form-label'>Description</label>";
    echo "<textarea name='description' class='form-control' rows='4' placeholder='Course description...'></textarea>";
    echo "</div>";
    
    echo "<div class='mb-3'>";
    echo "<label class='form-label'>Instructor *</label>";
    echo "<select name='instructor_id' class='form-select' required>";
    echo "<option value=''>-- Select Instructor --</option>";
    foreach ($instructors as $instructor) {
        echo "<option value='{$instructor['id']}'>{$instructor['name']} ({$instructor['email']})</option>";
    }
    echo "</select>";
    echo "</div>";
    
    echo "<button type='submit' name='add_course' class='btn btn-primary'><i class='fas fa-save'></i> Add Course</button>";
    echo "</form>";
    echo "</div></div>";
    
    // Show existing courses
    echo "<div class='card shadow'>";
    echo "<div class='card-header bg-info text-white'>";
    echo "<h5 class='mb-0'><i class='fas fa-list'></i> Existing Courses</h5>";
    echo "</div>";
    echo "<div class='card-body'>";
    
    $stmt = $pdo->query("
        SELECT c.id, c.title, c.description, u.name as instructor_name 
        FROM courses c 
        JOIN users u ON c.instructor_id = u.id 
        ORDER BY c.id DESC
    ");
    $courses = $stmt->fetchAll();
    
    if (empty($courses)) {
        echo "<div class='alert alert-info'>No courses yet. Add your first course above!</div>";
    } else {
        echo "<div class='table-responsive'>";
        echo "<table class='table table-striped table-hover'>";
        echo "<thead class='table-dark'>";
        echo "<tr><th>ID</th><th>Title</th><th>Description</th><th>Instructor</th></tr>";
        echo "</thead><tbody>";
        
        foreach ($courses as $course) {
            echo "<tr>";
            echo "<td>{$course['id']}</td>";
            echo "<td><strong>" . htmlspecialchars($course['title']) . "</strong></td>";
            echo "<td>" . htmlspecialchars(substr($course['description'], 0, 100)) . "...</td>";
            echo "<td><span class='badge bg-success'>" . htmlspecialchars($course['instructor_name']) . "</span></td>";
            echo "</tr>";
        }
        
        echo "</tbody></table>";
        echo "</div>";
        echo "<div class='alert alert-success mt-3'>";
        echo "<strong>Total Courses:</strong> " . count($courses);
        echo "</div>";
    }
    
    echo "</div></div>";
    
} catch (PDOException $e) {
    echo "<div class='alert alert-danger'>";
    echo "<h5>Database Error:</h5>";
    echo "<p>" . htmlspecialchars($e->getMessage()) . "</p>";
    echo "</div>";
}

echo "<hr>";
echo "<div class='d-grid gap-2 d-md-flex'>";
echo "<a href='/ITE311-LATANGGA/dashboard' class='btn btn-success'><i class='fas fa-home'></i> Go to Dashboard</a>";
echo "<a href='add_course.php' class='btn btn-outline-primary'><i class='fas fa-sync'></i> Refresh</a>";
echo "</div>";

echo "</div>";
echo "<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js'></script>";
?>
