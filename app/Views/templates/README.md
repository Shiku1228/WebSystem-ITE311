# Dynamic Navigation Bar - Templates Documentation

## Overview
The dynamic navigation bar automatically displays role-specific menu items based on the logged-in user's role (Admin, Instructor, or Student). The templates are accessible from anywhere in the application.

## Files Structure
```
app/Views/templates/
├── header.php          # Dynamic navigation header with role-based menus
├── footer.php          # Footer with quick links and social media
├── example_page.php    # Example implementation
└── README.md          # This documentation
```

## Usage

### Basic Implementation
Include the header and footer in your view files:

```php
<?= view('templates/header', ['title' => 'Your Page Title']) ?>

<div class="container mt-5">
    <!-- Your page content here -->
</div>

<?= view('templates/footer') ?>
```

### Using with CodeIgniter's Template System
The main `template.php` file now uses these templates:

```php
<?= $this->extend('template') ?>

<?= $this->section('content') ?>
    <!-- Your content here -->
<?= $this->endSection() ?>
```

## Role-Specific Navigation

### Admin Navigation
**Dropdown Menu: "Admin Panel"**
- Manage Users (`/admin/users`)
- Manage Instructors (`/admin/instructors`)
- Manage Students (`/admin/students`)
- System Settings (`/admin/settings`)
- Reports (`/admin/reports`)

### Instructor Navigation
**Direct Links:**
- My Classes (`/instructor/classes`)
- Assignments (`/instructor/assignments`)
- Students (`/instructor/students`)
- Grades (`/instructor/grades`)

### Student Navigation
**Direct Links:**
- My Courses (`/student/courses`)
- Assignments (`/student/assignments`)
- My Grades (`/student/grades`)
- Schedule (`/student/schedule`)

### Guest Navigation (Not Logged In)
- Login (`/auth/login`)
- Register (`/auth/register`)

## Features

### 1. Automatic Role Detection
The header automatically detects the user's role from the session:
```php
<?php 
$role = session()->get('role');
?>
```

### 2. Active Link Highlighting
Current page is automatically highlighted:
```php
<a class="nav-link <?= uri_string() == 'dashboard' ? 'active' : '' ?>" href="...">
```

### 3. Flash Message Display
Automatically displays flash messages (success, error, warning, info):
```php
// In your controller:
session()->setFlashdata('success', 'Operation completed successfully!');
session()->setFlashdata('error', 'An error occurred!');
session()->setFlashdata('warning', 'Warning message!');
session()->setFlashdata('info', 'Information message!');
```

### 4. User Badge
Displays user role with color-coded badge:
- Admin: Red badge
- Instructor: Green badge
- Student: Blue badge

### 5. Responsive Design
- Mobile-friendly collapsible menu
- Bootstrap 5 responsive utilities
- Touch-friendly dropdown menus

## Customization

### Change Navigation Colors
Edit the navbar class in `header.php`:
```php
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
```
Available colors: `bg-primary`, `bg-dark`, `bg-success`, `bg-danger`, etc.

### Add New Navigation Items
Add items within the appropriate role section in `header.php`:

```php
<?php if ($role === 'student'): ?>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('student/new-feature') ?>">
            <i class="fas fa-star"></i> New Feature
        </a>
    </li>
<?php endif; ?>
```

### Modify Footer Content
Edit `footer.php` to change footer links, social media, or copyright information.

## Session Requirements

The navigation system requires these session variables:
- `isLoggedIn` (boolean) - Whether user is authenticated
- `name` (string) - User's display name
- `role` (string) - User's role: 'admin', 'instructor', or 'student'

These are automatically set during login in the Auth controller.

## Icons

The templates use Font Awesome 6.4.0 icons. Common icons used:
- `fa-graduation-cap` - LMS logo
- `fa-user-shield` - Admin
- `fa-chalkboard-teacher` - Instructor
- `fa-user-graduate` - Student
- `fa-home` - Home
- `fa-tachometer-alt` - Dashboard

## Auto-Dismiss Alerts

Flash messages automatically dismiss after 5 seconds. This is handled by JavaScript in `footer.php`.

## Browser Compatibility

- Chrome/Edge (latest)
- Firefox (latest)
- Safari (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Example Pages

See `example_page.php` for a complete working example of how to use the templates.

## Troubleshooting

### Navigation not showing role-specific items
- Verify user is logged in: `session()->get('isLoggedIn')`
- Check role value: `session()->get('role')`
- Ensure role is one of: 'admin', 'instructor', 'student'

### Active link not highlighting
- Check `uri_string()` matches your route
- Verify the route is correctly defined in `Routes.php`

### Flash messages not displaying
- Ensure you're using `session()->setFlashdata()` in controller
- Check that header template is included before the message is set
- Verify Bootstrap JavaScript is loaded

## Best Practices

1. **Always pass a title** when including the header:
   ```php
   <?= view('templates/header', ['title' => 'Specific Page Title']) ?>
   ```

2. **Use consistent route naming** that matches the navigation structure

3. **Set appropriate flash messages** after user actions:
   - Success: Green (operations completed)
   - Error: Red (failures)
   - Warning: Yellow (cautions)
   - Info: Blue (informational)

4. **Keep navigation items relevant** to the user's role and permissions

## Future Enhancements

Potential improvements:
- Breadcrumb navigation
- Notification badges for unread messages
- User avatar images
- Dark mode toggle
- Multi-language support
- Keyboard navigation shortcuts
