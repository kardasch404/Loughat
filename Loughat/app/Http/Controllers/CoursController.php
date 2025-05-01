<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoursRequest;
use App\Http\Requests\CoursUpdateRequest;
use App\Repositories\CategorieRepository;
use App\Repositories\CommandeRepository;
use App\Repositories\CoursRepository;
use App\Repositories\LessonRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\SectionRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;
use Illuminate\Support\Facades\Log;



class CoursController extends Controller
{
    protected $coursRepository;
    protected $categorieRepository;
    protected $userRepository;
    protected $commandeRepository;
    protected $paymentRepository;
    protected $sectionRepository;
    protected $lessonRepository;
    public function __construct(CoursRepository $coursRepository, CategorieRepository $categorieRepository, UserRepository $userRepository, CommandeRepository $commandeRepository, PaymentRepository $paymentRepository, SectionRepository $sectionRepository, LessonRepository $lessonRepository)
    {
        $this->coursRepository = $coursRepository;
        $this->categorieRepository = $categorieRepository;
        $this->userRepository = $userRepository;
        $this->commandeRepository = $commandeRepository;
        $this->paymentRepository = $paymentRepository;
        $this->sectionRepository = $sectionRepository;
        $this->lessonRepository = $lessonRepository;
    }
    public function show($coursId)
    {
        // dd("fdghjkl");
        $cours = $this->coursRepository->find($coursId);
        return view('course-details', compact('cours'));
    }

    public function getAllCourses()
    {
        $courses = $this->coursRepository->all();
        return view('course-search', compact('courses'));
    }

    public function index()
    {
        $teacherId = session('user_id');
        $courses = $this->coursRepository->getCoursesByTeacher($teacherId);
        return view('teacherdashboard.courses', compact('courses'));
    }

    public function create()
    {
        $teacherId = session('user_id');
        $categories = $this->categorieRepository->all();
        return view('teacherdashboard.create-cours', compact('categories', 'teacherId'));
    }

    public function store(CoursRequest $request)
    {
        try {

            $teacher = session('user_id');
            if (! $teacher) {
                return response()->json([
                    'message' => false
                ]);
            }
            $data = $request->validated();

            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $cloudinary = new Cloudinary([
                    'cloud' => [
                        'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                        'api_key' => env('CLOUDINARY_API_KEY'),
                        'api_secret' => env('CLOUDINARY_API_SECRET'),
                    ],
                ]);
                $upload = $cloudinary->uploadApi()->upload($file->getRealPath(), [
                    'folder' => 'courses',
                    'resource_type' => 'image',
                    'http_options' => [
                        'verify' => false, 
                    ],
                ]);
                $data['photo'] = $upload['secure_url'];
            }
            $categorie = $this->categorieRepository->find($data['categorie_id']);
            if (!$categorie) {
                return redirect()->back()->with('error', 'Category not found');
            }

            $cours = $this->coursRepository->create($data, $data['categorie_id'], $teacher);

            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create course');
        }
    }

    public function update(CoursUpdateRequest $request, $coursId)
    {

        try {
            $data = $request->validated();
            $cours = $this->coursRepository->find($coursId);
            if (!$cours) {
                return response()->json(['error' => 'Cours not found'], 404);
            }
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $cloudinary = new Cloudinary([
                    'cloud' => [
                        'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                        'api_key' => env('CLOUDINARY_API_KEY'),
                        'api_secret' => env('CLOUDINARY_API_SECRET'),
                    ],
                ]);
                $upload = $cloudinary->uploadApi()->upload($file->getRealPath(), [
                    'folder' => 'courses',
                    'resource_type' => 'image',
                    'http_options' => [
                        'verify' => false, 
                    ],
                ]);
                $data['photo'] = $upload['secure_url'];
            }

            $categorieId = $request->input('categorie_id');
            $cours = $this->coursRepository->update($data, $coursId, $categorieId);

            return redirect()->route('courses');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function edit($coursId)
    {
        $cours = $this->coursRepository->find($coursId);
        if (!$cours) {
            return redirect()->back()->with('error', 'Course not found');
        }
        $categories = $this->categorieRepository->all();
        return view('teacherdashboard.edit-cours', compact('cours', 'categories'));
    }


    public function delete($coursId)
    {
        try {
            $deleted = $this->coursRepository->delete($coursId);
            if (!$deleted) {
                return redirect()->back();
            }
            return redirect()->route('courses');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete course');
        }
    }

    public function getAllCoursesByStudent()
    {
        try {
            $studentId = session('user_id');
            // dd($studentId);
            $user = $this->userRepository->find($studentId);
            // dd($user);
            $commandes = $this->commandeRepository->getAllCommandeFromStudent($studentId);
            // dd($commandes);
            $courses = [];
            foreach ($commandes as $commande) {
                $payment = $this->paymentRepository->findByCommandId($commande->id);
                if (!$payment) {
                    dd('No payment found ' . $commande->id);
                }
                if ($commande->cours) {
                    $courses[] = $commande->cours;
                }
            }
            // dd($courses);
            return view('students-profile', compact('courses', 'user'));
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function watchCours($id, $lessonId = null)
    {
        try {
            $course = $this->coursRepository->find($id);

            if (!$course) {
                return response()->json([
                    'error' => 'cours not found'
                ], 404);
            }
            $sections = $this->sectionRepository->getCoursesWithSection($id);

            if (empty($sections)) {
                return response()->json([
                    'error' => 'no section in this cours'
                ]);
            }
            $sectionsWithLessons = [];
            $firstLesson = null;

            foreach ($sections as $section) {
                $lessons = $this->lessonRepository->getLessonsBySection($section->id);
                if (empty($firstLesson) && $lessons->isNotEmpty()) {
                    $firstLesson = $lessons->first();
                }

                $sectionsWithLessons[] = [
                    'section' => $section,
                    'lessons' => $lessons
                ];
            }
            if ($lessonId) {
                $currentLesson = $this->lessonRepository->find($lessonId);
            } else {
                $currentLesson = $firstLesson;
            }

            return view('watch', compact('course', 'sectionsWithLessons', 'currentLesson'));
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function searchCours(Request $request)
    {
        try {
            $search = $request->input('search');
            $courses = $this->coursRepository->searchCours($search)->paginate(8);

            $categories = $this->categorieRepository->all();
            return view('course-search', compact('courses', 'categories'));
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function showAllCategorie()
    {
        $categories = $this->categorieRepository->all();
        $courses = $this->coursRepository->pagination();
        return view('course-search', compact('categories', 'courses'));
    }
    public function filterByCategorieAndLevel(Request $request)
    {
        try {
            $categories = $this->categorieRepository->all();
            $courses = $this->coursRepository->filterCourses($request);
            return view('course-search', compact('courses', 'categories'));
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }
}
