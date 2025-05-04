<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherReviewRequest;
use App\Repositories\CommandeRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\TeacherReviewRepository;

class TeacherReviewController extends Controller
{
    //
    protected $teacherReviewRepository;
    protected $paymentRepository;
    protected $commandeRepository;

    public function __construct(TeacherReviewRepository $teacherReviewRepository, PaymentRepository $paymentRepository, CommandeRepository $commandeRepository)
    {
        $this->teacherReviewRepository = $teacherReviewRepository;
        $this->paymentRepository = $paymentRepository;
        $this->commandeRepository = $commandeRepository;
    }

    public function store(TeacherReviewRequest $request)
    {
        // dd('vbhjkl');
        try {
            $studentId = session('user_id');
            if (!$studentId) {
                return redirect()->route('signin');
            }

            $teacherId = $request->input('teacher_id');
            if (!$teacherId) {
                return response()->json([
                    'message' => 'Teacher  not found '
                ]);
            }
            $studentCommands = $this->commandeRepository->getCommandsByStudent($studentId);
            if (!$studentCommands) {
                return response()->json([
                    'message' => 'You cannot create a comment'
                ]);
            }
            $isEligible = $this->commandeRepository->hasPaidCommandForTeacher($studentId, $teacherId);
            if (!$isEligible) {
                return response()->json([
                    'message' => 'You cannot create a comment for this teacher no cours payed for this teacher'
                ]);
            }
            $data = $request->validated();
            $data['teacher_id'] = $teacherId;
            $data['student_id'] = $studentId;
            $review = $this->teacherReviewRepository->create($data, $teacherId, $studentId);
            // dd($review);
            return redirect()->back();
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function delete($id)
    {
        try {
            $studentId = session('user_id');
            $review = $this->teacherReviewRepository->find($id);

            if (!$review) {
                return response()->json([
                    'message' => 'Review not found'
                ], 404);
            }
            $this->teacherReviewRepository->delete($id);
            return redirect()->back();
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function getAllReviewsByAdmin()
    {
        try {
            $reviews = $this->teacherReviewRepository->getAllReviews();
            if (! $reviews)
            {
                return response()->json([
                    'message' => 'Reviews not found'
                ], 404);
            }
            return view('admindashboard.reviews', compact('reviews'));
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getAllReviewsByTeacher()
    {
        try {
            $teacherId = session('user_id');
            if (!$teacherId) {
                return redirect()->route('signin');
            }
            $reviews = $this->teacherReviewRepository->getAllReviewsByTeacher($teacherId);
            if (! $reviews)
            {
                return response()->json([
                    'message' => 'Reviews not found'
                ], 404);
            }
            return view('teacherdashboard.reviews', compact('reviews'));
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
