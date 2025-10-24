<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CoursesSeeder extends Seeder
{
    public function run()
    {
        // First, get an instructor user ID
        $db = \Config\Database::connect();
        
        // Get first instructor (or create one if none exists)
        $instructor = $db->table('users')
            ->where('role', 'instructor')
            ->get()
            ->getRowArray();
        
        if (!$instructor) {
            // Create a default instructor if none exists
            $db->table('users')->insert([
                'name' => 'Default Instructor',
                'email' => 'instructor@example.com',
                'password' => password_hash('password123', PASSWORD_DEFAULT),
                'role' => 'instructor',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            $instructorId = $db->insertID();
        } else {
            $instructorId = $instructor['id'];
        }
        
        // Sample courses data
        $courses = [
            [
                'title' => 'Web Development Fundamentals',
                'description' => 'Learn the basics of HTML, CSS, and JavaScript. Build responsive websites from scratch.',
                'instructor_id' => $instructorId
            ],
            [
                'title' => 'Database Design and SQL',
                'description' => 'Master database design principles, normalization, and SQL queries. Work with MySQL and PostgreSQL.',
                'instructor_id' => $instructorId
            ],
            [
                'title' => 'PHP Programming',
                'description' => 'Build dynamic web applications with PHP. Learn OOP, sessions, and database integration.',
                'instructor_id' => $instructorId
            ],
            [
                'title' => 'CodeIgniter 4 Framework',
                'description' => 'Master the CodeIgniter 4 MVC framework. Build professional web applications.',
                'instructor_id' => $instructorId
            ],
            [
                'title' => 'React.js Essentials',
                'description' => 'Build modern, interactive user interfaces with React. Learn hooks, state management, and routing.',
                'instructor_id' => $instructorId
            ],
            [
                'title' => 'Python for Beginners',
                'description' => 'Start your programming journey with Python. Learn syntax, data structures, and algorithms.',
                'instructor_id' => $instructorId
            ],
            [
                'title' => 'Data Structures and Algorithms',
                'description' => 'Master essential data structures and algorithms. Prepare for technical interviews.',
                'instructor_id' => $instructorId
            ],
            [
                'title' => 'Mobile App Development',
                'description' => 'Build cross-platform mobile apps with React Native. Deploy to iOS and Android.',
                'instructor_id' => $instructorId
            ],
            [
                'title' => 'Git and Version Control',
                'description' => 'Learn Git workflows, branching strategies, and collaboration techniques.',
                'instructor_id' => $instructorId
            ],
            [
                'title' => 'API Development with REST',
                'description' => 'Design and build RESTful APIs. Learn authentication, documentation, and best practices.',
                'instructor_id' => $instructorId
            ]
        ];
        
        // Insert courses
        foreach ($courses as $course) {
            $db->table('courses')->insert($course);
        }
        
        echo "Successfully seeded " . count($courses) . " courses!\n";
    }
}
