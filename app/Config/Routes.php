<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/about', 'Home::about');
$routes->get('/contact', 'Home::contact');

// Test route
$routes->get('/test', function() {
    return 'Routes are working!';
});

// Test student dashboard route
$routes->get('/test-student', function() {
    return 'Student dashboard route is accessible!';
});

// Authentication routes
$routes->get('/auth/login', 'Auth::login');
$routes->post('/auth/login', 'Auth::login');
$routes->get('/auth/register', 'Auth::register');
$routes->post('/auth/register', 'Auth::register');
$routes->get('/auth/logout', 'Auth::logout');
$routes->get('/dashboard', 'Auth::dashboard');
$routes->match(['get', 'post'], '/auth/debug', 'Auth::debug');
$routes->get('/auth/testdb', 'Auth::testDb');

// Dashboard routes by role
$routes->get('/student/dashboard', 'Auth::studentDashboard');
$routes->get('/instructor/dashboard', 'Auth::instructorDashboard');
$routes->get('/admin/dashboard', 'Auth::adminDashboard');

