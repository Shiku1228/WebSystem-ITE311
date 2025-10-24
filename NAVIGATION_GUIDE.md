# Dynamic Navigation Bar - Quick Start Guide

## 🎯 Overview
Your LMS System now has a **dynamic navigation bar** that automatically displays different menu items based on the user's role (Admin, Instructor, or Student).

## 📁 Files Created
- `app/Views/templates/header.php` - Dynamic navigation header
- `app/Views/templates/footer.php` - Footer with quick links
- `app/Views/templates/example_page.php` - Working example
- `app/Views/templates/README.md` - Detailed documentation

## 🚀 Quick Start

### Method 1: Direct Include (Recommended for new pages)
```php
<?= view('templates/header', ['title' => 'My Page Title']) ?>

<div class="container mt-5">
    <h1>Your Content Here</h1>
</div>

<?= view('templates/footer') ?>
```

### Method 2: Using Template System (For existing pages)
```php
<?= $this->extend('template') ?>

<?= $this->section('content') ?>
    <h1>Your Content Here</h1>
<?= $this->endSection() ?>
```

## 🎨 What You Get

### For All Users
- Home, About, Contact links
- Responsive mobile menu
- Auto-dismiss flash messages
- Active page highlighting

### For Admin Users
**Admin Panel Dropdown:**
- Manage Users
- Manage Instructors
- Manage Students
- System Settings
- Reports

### For Instructor Users
**Direct Links:**
- My Classes
- Assignments
- Students
- Grades

### For Student Users
**Direct Links:**
- My Courses
- Assignments
- My Grades
- Schedule

### For Guest Users (Not Logged In)
- Login button
- Register button

## 📝 Example Usage

### In Your Controller
```php
public function myPage()
{
    // Set a flash message (optional)
    session()->setFlashdata('success', 'Welcome to this page!');
    
    return view('my_view');
}
```

### In Your View (my_view.php)
```php
<?= view('templates/header', ['title' => 'My Custom Page']) ?>

<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2>Hello, <?= esc(session()->get('name')) ?>!</h2>
            <p>Your role is: <?= esc(session()->get('role')) ?></p>
        </div>
    </div>
</div>

<?= view('templates/footer') ?>
```

## 🔍 Testing the Navigation

### View the Example Page
Visit: `http://localhost/ITE311-LATANGGA/public/template-example`

This page shows:
- How the navigation looks
- All role-specific menu items
- Usage examples
- Code snippets

### Test Different Roles
1. **Register/Login** as different roles (student, instructor, admin)
2. **Navigate** to the dashboard
3. **Observe** how the navigation changes based on your role

## 🎭 Flash Messages

Set flash messages in your controller:

```php
// Success (green)
session()->setFlashdata('success', 'Operation completed!');

// Error (red)
session()->setFlashdata('error', 'Something went wrong!');

// Warning (yellow)
session()->setFlashdata('warning', 'Please be careful!');

// Info (blue)
session()->setFlashdata('info', 'Here is some information.');
```

Messages automatically:
- Display at the top of the page
- Auto-dismiss after 5 seconds
- Show appropriate icons and colors

## 🔧 Customization

### Change Brand Name
Edit `app/Views/templates/header.php` line 30:
```php
<a class="navbar-brand" href="<?= base_url('/') ?>">
    <i class="fas fa-graduation-cap"></i> Your Brand Name
</a>
```

### Change Navbar Color
Edit `app/Views/templates/header.php` line 28:
```php
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
```
Options: `bg-primary`, `bg-dark`, `bg-success`, `bg-danger`, `bg-info`

### Add New Menu Items
Edit the appropriate role section in `header.php`:

```php
<?php if ($role === 'student'): ?>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('student/library') ?>">
            <i class="fas fa-book"></i> Library
        </a>
    </li>
<?php endif; ?>
```

## 📱 Responsive Features

The navigation is fully responsive:
- **Desktop**: Full horizontal menu
- **Tablet**: Collapsible menu with hamburger icon
- **Mobile**: Touch-friendly dropdowns

## ✅ Checklist for Implementation

- [x] Header template created with role-based navigation
- [x] Footer template created with quick links
- [x] Main template.php updated to use new templates
- [x] Flash message system integrated
- [x] Example page created
- [x] Documentation provided
- [x] Test route added (`/template-example`)

## 🐛 Troubleshooting

**Navigation not showing role items?**
- Check if user is logged in: `session()->get('isLoggedIn')`
- Verify role: `session()->get('role')`

**Flash messages not appearing?**
- Ensure header is included before setting flash message
- Check Bootstrap JS is loaded

**Active link not highlighting?**
- Verify route matches `uri_string()`
- Check route is defined in `Routes.php`

## 📚 Next Steps

1. **Update existing views** to use the new templates
2. **Create role-specific pages** for the navigation links
3. **Customize the navigation** to match your needs
4. **Add user avatars** or profile pictures (optional)
5. **Implement breadcrumbs** for better navigation (optional)

## 🎓 Learn More

- See `app/Views/templates/README.md` for detailed documentation
- View `app/Views/templates/example_page.php` for working example
- Check Bootstrap 5 docs: https://getbootstrap.com/docs/5.3/
- Font Awesome icons: https://fontawesome.com/icons

## 💡 Tips

1. Always pass a title when including header
2. Use consistent route naming
3. Set flash messages after user actions
4. Keep navigation items relevant to user role
5. Test on mobile devices

---

**Created for ITE311-LATANGGA LMS System**
