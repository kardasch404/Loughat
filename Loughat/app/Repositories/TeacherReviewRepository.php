<?php
namespace App\Repositories;

use App\Models\TeacherReview;
use App\Models\User;

class TeacherReviewRepository 
{
    public function create(array $data, $teacherId,$studentId)
    {
        $teacher = User::find($teacherId);

        if (!$teacher) {
            return false;
        }

        $review = new TeacherReview();
        $review->rating = $data['rating'];
        $review->message = $data['message'];
        $review->teacher_id = $teacherId;
        $review->student_id = $studentId;
        $review->save();

        return $review;
    }
    public function getReviewsByTeacher($teacherId)
    {
        return TeacherReview::where('teacher_id', $teacherId)->get();
    }

    public function find ($id)
    {
        return TeacherReview::find($id);
    }
    public function delete($id)
    {
        $review = TeacherReview::find($id);
        if (!$review) {
            return false;
        }
        $review->delete();
        return true;
    }

    public function getAllReviews()
    {
        return TeacherReview::all();
    }
    public function getAllReviewsByTeacher($teacherId)
    {
        return TeacherReview::where('teacher_id', $teacherId)->get();
    }
}
