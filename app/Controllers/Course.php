<?php

namespace App\Controllers;

use App\Models\EnrollmentModel;
use App\Models\UserModel;

class Course extends BaseController
{
    protected $enrollmentModel;

    public function __construct()
    {
        $this->enrollmentModel = new EnrollmentModel();
    }

    /**
     * Handle course enrollment via AJAX
     * 
     * @return \CodeIgniter\HTTP\ResponseInterface JSON response
     */
    public function enroll()
    {
        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'You must be logged in to enroll in a course.'
            ])->setStatusCode(401);
        }

        // Get user ID from session
        $userId = session()->get('id');

        // Get course_id from POST request
        $courseId = $this->request->getPost('course_id');

        // Validate course_id
        if (empty($courseId) || !is_numeric($courseId)) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid course ID provided.'
            ])->setStatusCode(400);
        }

        // Check if user is already enrolled
        if ($this->enrollmentModel->isAlreadyEnrolled($userId, $courseId)) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'You are already enrolled in this course.'
            ])->setStatusCode(409);
        }

        // Prepare enrollment data
        $enrollmentData = [
            'user_id' => $userId,
            'course_id' => $courseId,
            'enrolled_at' => date('Y-m-d H:i:s')
        ];

        // Insert enrollment record
        try {
            $result = $this->enrollmentModel->enrollUser($enrollmentData);

            if ($result) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Successfully enrolled in the course!',
                    'enrollment_id' => $result
                ])->setStatusCode(201);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Failed to enroll in the course. Please try again.'
                ])->setStatusCode(500);
            }
        } catch (\Exception $e) {
            log_message('error', 'Enrollment error: ' . $e->getMessage());
            
            return $this->response->setJSON([
                'success' => false,
                'message' => 'An error occurred while processing your enrollment.'
            ])->setStatusCode(500);
        }
    }
}
