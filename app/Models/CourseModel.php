<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseModel extends Model
{
    protected $table      = 'courses';
    protected $primaryKey = 'id';

    protected $allowedFields = ['title', 'description', 'instructor_id'];

    protected $useTimestamps = false;

    /**
     * Get all available courses with instructor information
     * 
     * @return array Array of courses with instructor details
     */
    public function getAllCoursesWithInstructor()
    {
        return $this->select('courses.*, users.name as instructor_name')
                    ->join('users', 'users.id = courses.instructor_id')
                    ->findAll();
    }

    /**
     * Get courses that a user is NOT enrolled in
     * 
     * @param int $user_id The user's ID
     * @return array Array of available courses
     */
    public function getAvailableCourses($user_id)
    {
        return $this->select('courses.*, users.name as instructor_name')
                    ->join('users', 'users.id = courses.instructor_id')
                    ->where('courses.id NOT IN (SELECT course_id FROM enrollments WHERE user_id = ' . (int)$user_id . ')', null, false)
                    ->findAll();
    }
}
