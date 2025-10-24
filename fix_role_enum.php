<?php
/**
 * Fix the role ENUM in users table
 * This will update the database to have the correct role values
 */

echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet'>";
echo "<div class='container mt-5'>";
echo "<h2>Fix User Role ENUM</h2>";

$dsn = "mysql:host=localhost;dbname=lms_latangga;charset=utf8mb4";
try {
    $pdo = new PDO($dsn, 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    
    echo "<div class='alert alert-info'>";
    echo "<h5>Current Situation:</h5>";
    echo "<p>The users table has role ENUM with values: <code>student, admin, user</code></p>";
    echo "<p>We need it to be: <code>student, instructor, admin</code></p>";
    echo "</div>";
    
    // Check current ENUM values
    $stmt = $pdo->query("SHOW COLUMNS FROM users WHERE Field = 'role'");
    $column = $stmt->fetch();
    
    echo "<h4>Current Role Column Definition:</h4>";
    echo "<pre>" . print_r($column, true) . "</pre>";
    
    // Check if there are any users with 'user' role
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM users WHERE role = 'user'");
    $userCount = $stmt->fetch()['count'];
    
    if ($userCount > 0) {
        echo "<div class='alert alert-warning'>";
        echo "Found {$userCount} user(s) with role 'user'. These will be converted to 'student'.";
        echo "</div>";
        
        // Update 'user' to 'student'
        $pdo->exec("UPDATE users SET role = 'student' WHERE role = 'user'");
        echo "<div class='alert alert-success'>✓ Updated 'user' roles to 'student'</div>";
    }
    
    // Now alter the table to fix the ENUM
    echo "<h4>Updating ENUM Values...</h4>";
    
    try {
        $sql = "ALTER TABLE users MODIFY COLUMN role ENUM('student', 'instructor', 'admin') NOT NULL DEFAULT 'student'";
        $pdo->exec($sql);
        
        echo "<div class='alert alert-success'>";
        echo "<h5>✓ Success!</h5>";
        echo "<p>The role column has been updated to: <code>ENUM('student', 'instructor', 'admin')</code></p>";
        echo "</div>";
        
        // Verify the change
        $stmt = $pdo->query("SHOW COLUMNS FROM users WHERE Field = 'role'");
        $column = $stmt->fetch();
        
        echo "<h4>New Role Column Definition:</h4>";
        echo "<pre>" . print_r($column, true) . "</pre>";
        
        // Show all users
        echo "<h4>Current Users:</h4>";
        $stmt = $pdo->query("SELECT id, name, email, role FROM users ORDER BY id");
        $users = $stmt->fetchAll();
        
        echo "<table class='table table-bordered table-striped'>";
        echo "<thead class='table-dark'><tr><th>ID</th><th>Name</th><th>Email</th><th>Role</th></tr></thead>";
        echo "<tbody>";
        foreach ($users as $user) {
            $badgeClass = $user['role'] == 'student' ? 'info' : ($user['role'] == 'instructor' ? 'success' : 'danger');
            echo "<tr>";
            echo "<td>{$user['id']}</td>";
            echo "<td>" . htmlspecialchars($user['name']) . "</td>";
            echo "<td>" . htmlspecialchars($user['email']) . "</td>";
            echo "<td><span class='badge bg-{$badgeClass}'>" . htmlspecialchars($user['role']) . "</span></td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
        
        echo "<div class='alert alert-success'>";
        echo "<h5>Next Steps:</h5>";
        echo "<ol>";
        echo "<li>You can now register as <strong>instructor</strong></li>";
        echo "<li>Go to <a href='/ITE311-LATANGGA/auth/register' class='alert-link'>Registration Page</a></li>";
        echo "<li>Select 'Instructor' from the role dropdown</li>";
        echo "<li>After registration, login and you should see the Instructor Dashboard</li>";
        echo "</ol>";
        echo "</div>";
        
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger'>";
        echo "<h5>Error updating ENUM:</h5>";
        echo "<p>" . htmlspecialchars($e->getMessage()) . "</p>";
        echo "</div>";
    }
    
} catch (PDOException $e) {
    echo "<div class='alert alert-danger'>";
    echo "<h4>Database Connection Error:</h4>";
    echo "<p>" . htmlspecialchars($e->getMessage()) . "</p>";
    echo "</div>";
}

echo "<hr>";
echo "<div class='d-grid gap-2 d-md-flex'>";
echo "<a href='/ITE311-LATANGGA/auth/register' class='btn btn-primary'>Register New User</a>";
echo "<a href='/ITE311-LATANGGA/auth/login' class='btn btn-success'>Login</a>";
echo "<a href='fix_role_enum.php' class='btn btn-outline-secondary'>Refresh</a>";
echo "</div>";

echo "</div>";
?>
