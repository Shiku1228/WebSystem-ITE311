<?php

namespace App\Models;

use CodeIgniter\Model;

class EnrollmentModel extends Model
{
    protected $table      = 'enrollments';
    protected $primaryKey = 'id';

    protected $allowedFields = ['user_id', 'course_id', 'enrolled_at'];

    protected $useTimestamps = false;

    /**
     * Enroll a user in a course
     * 
     * @param array $data Array containing user_id, course_id, and optionally enrolled_at
     * @return int|bool Insert ID on success, false on failure
     */
    public function enrollUser($data)
    {
        // Set enrolled_at to current timestamp if not provided
        if (!isset($data['enrolled_at'])) {
            $data['enrolled_at'] = date('Y-m-d H:i:s');
        }

        return $this->insert($data);
    }

    /**
     * Get all courses a user is enrolled in
     * 
     * @param int $user_id The user's ID
     * @return array Array of enrollment records with course details
     */
    public function getUserEnrollments($user_id)
    {
        return $this->select('enrollments.*, courses.title, courses.description, users.name as instructor_name')
                    ->join('courses', 'courses.id = enrollments.course_id')
                    ->join('users', 'users.id = courses.instructor_id')
                    ->where('enrollments.user_id', $user_id)
                    ->orderBy('enrollments.enrolled_at', 'DESC')
                    ->findAll();
    }

    /**
     * Check if a user is already enrolled in a specific course
     * 
     * @param int $user_id The user's ID
     * @param int $course_id The course's ID
     * @return bool True if already enrolled, false otherwise
     */
    public function isAlreadyEnrolled($user_id, $course_id)
    {
        $enrollment = $this->where('user_id', $user_id)
                           ->where('course_id', $course_id)
                           ->first();

        return $enrollment !== null;
    }
}
