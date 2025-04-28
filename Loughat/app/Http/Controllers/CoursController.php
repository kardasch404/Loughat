<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoursRequest;
use App\Http\Requests\CoursUpdateRequest;
use App\Repositories\CategorieRepository;
use App\Repositories\CommandeRepository;
use App\Repositories\CoursRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Session;

class CoursController extends Controller
{
    protected $coursRepository;
    protected $categorieRepository;
    protected $userRepository;
    protected $commandeRepository;
    protected $paymentRepository;
    public function __construct(CoursRepository $coursRepository, CategorieRepository $categorieRepository, UserRepository $userRepository, CommandeRepository $commandeRepository, PaymentRepository $paymentRepository)
    {
        $this->coursRepository = $coursRepository;
        $this->categorieRepository = $categorieRepository;
        $this->userRepository = $userRepository;
        $this->commandeRepository = $commandeRepository;
        $this->paymentRepository = $paymentRepository;
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
                $path = $file->store('courses', 'public');
                $data['photo'] = $path;
            }
            $categorie = $this->categorieRepository->find($data['categorie_id']);
            if (!$categorie) {
                return redirect()->back()->with('error', 'Category not found');
            }

            $cours = $this->coursRepository->create($data, $data['categorie_id'], $teacher);

            return redirect()->route('courses')->with('success', 'Course created succes');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create course');
        }
    }

    public function update(CoursUpdateRequest $request, $coursId)
    {

        dd('fdghjklm');
        try {
            $data = $request->validated();
            // dd('reached update');
            // if ($data->fails()) {
            //     return redirect()->back()
            //         ->withErrors($data)
            //         ->withInput();
            // }
            // $data = $data->validated();
            $cours = $this->coursRepository->find($coursId);
            if (!$cours) {
                return response()->json(['error' => 'Cours not found'], 404);
            }
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $path = $file->store('courses', 'public');
                $data['photo'] = $path;
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
}
