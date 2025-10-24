<?php
/**
 * Quick diagnostic to check the current logged-in user's role
 */

session_start();

echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet'>";
echo "<div class='container mt-5'>";
echo "<h2>User Role Diagnostic</h2>";

// Check session
echo "<h4>Session Data</h4>";
echo "<table class='table table-bordered'>";
echo "<tr><th>Key</th><th>Value</th></tr>";
echo "<tr><td>isLoggedIn</td><td>" . var_export($_SESSION['isLoggedIn'] ?? false, true) . "</td></tr>";
echo "<tr><td>id</td><td>" . ($_SESSION['id'] ?? 'Not set') . "</td></tr>";
echo "<tr><td>name</td><td>" . ($_SESSION['name'] ?? 'Not set') . "</td></tr>";
echo "<tr><td>email</td><td>" . ($_SESSION['email'] ?? 'Not set') . "</td></tr>";
echo "<tr><td>role</td><td><strong>" . ($_SESSION['role'] ?? 'Not set') . "</strong></td></tr>";
echo "</table>";

if (isset($_SESSION['id'])) {
    // Check database
    $dsn = "mysql:host=localhost;dbname=lms_latangga;charset=utf8mb4";
    try {
        $pdo = new PDO($dsn, 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        
        $stmt = $pdo->prepare("SELECT id, name, email, role FROM users WHERE id = ?");
        $stmt->execute([$_SESSION['id']]);
        $user = $stmt->fetch();
        
        if ($user) {
            echo "<h4>Database Data (User ID: {$user['id']})</h4>";
            echo "<table class='table table-bordered'>";
            echo "<tr><th>Field</th><th>Value</th><th>Type</th></tr>";
            echo "<tr><td>name</td><td>" . htmlspecialchars($user['name']) . "</td><td>" . gettype($user['name']) . "</td></tr>";
            echo "<tr><td>email</td><td>" . htmlspecialchars($user['email']) . "</td><td>" . gettype($user['email']) . "</td></tr>";
            echo "<tr><td>role</td><td><strong>" . htmlspecialchars($user['role']) . "</strong></td><td>" . gettype($user['role']) . "</td></tr>";
            echo "</table>";
            
            // Check if role matches
            if ($user['role'] !== $_SESSION['role']) {
                echo "<div class='alert alert-danger'>";
                echo "⚠️ <strong>MISMATCH!</strong> Session role (" . $_SESSION['role'] . ") does not match database role (" . $user['role'] . ")";
                echo "<br>You need to logout and login again to refresh the session.";
                echo "</div>";
            } else {
                echo "<div class='alert alert-success'>";
                echo "✓ Session and database roles match";
                echo "</div>";
            }
            
            // Show expected dashboard
            echo "<h4>Expected Dashboard</h4>";
            switch ($user['role']) {
                case 'student':
                    echo "<div class='alert alert-info'>";
                    echo "<strong>Student Dashboard</strong> - Should see Enrolled Courses and Available Courses sections";
                    echo "</div>";
                    break;
                case 'instructor':
                    echo "<div class='alert alert-success'>";
                    echo "<strong>Instructor Dashboard</strong> - Should see My Classes, Assignments, and Students stats";
                    echo "</div>";
                    break;
                case 'admin':
                    echo "<div class='alert alert-danger'>";
                    echo "<strong>Admin Dashboard</strong> - Should see Total Users, Instructors, and Students stats";
                    echo "</div>";
                    break;
                default:
                    echo "<div class='alert alert-warning'>";
                    echo "Unknown role: " . htmlspecialchars($user['role']);
                    echo "</div>";
            }
        }
        
        // Show all users
        echo "<hr>";
        echo "<h4>All Users in Database</h4>";
        $stmt = $pdo->query("SELECT id, name, email, role, created_at FROM users ORDER BY created_at DESC LIMIT 10");
        $users = $stmt->fetchAll();
        
        echo "<table class='table table-striped'>";
        echo "<thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Role</th><th>Created</th></tr></thead>";
        echo "<tbody>";
        foreach ($users as $u) {
            $highlight = ($u['id'] == $_SESSION['id']) ? 'table-primary' : '';
            echo "<tr class='{$highlight}'>";
            echo "<td>{$u['id']}</td>";
            echo "<td>" . htmlspecialchars($u['name']) . "</td>";
            echo "<td>" . htmlspecialchars($u['email']) . "</td>";
            echo "<td><span class='badge bg-" . ($u['role'] == 'student' ? 'info' : ($u['role'] == 'instructor' ? 'success' : 'danger')) . "'>" . htmlspecialchars($u['role']) . "</span></td>";
            echo "<td>" . date('M d, Y H:i', strtotime($u['created_at'])) . "</td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
        
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger'>Database error: " . htmlspecialchars($e->getMessage()) . "</div>";
    }
} else {
    echo "<div class='alert alert-warning'>You are not logged in</div>";
}

echo "<hr>";
echo "<div class='d-grid gap-2 d-md-flex'>";
echo "<a href='/ITE311-LATANGGA/auth/logout' class='btn btn-warning'>Logout & Login Again</a>";
echo "<a href='/ITE311-LATANGGA/dashboard' class='btn btn-primary'>Go to Dashboard</a>";
echo "<a href='check_user_role.php' class='btn btn-outline-secondary'>Refresh</a>";
echo "</div>";

echo "</div>";
?>
