<?php

namespace App\Http\Controllers;

use App\Http\Requests\PortfolioRequest;
use App\Repositories\EducationRepository;
use App\Repositories\ExperienceRepository;
use App\Repositories\PortfolioRepository;
use App\Repositories\UserRepository;


class PortfolioController extends Controller
{
    protected $portfolioRepository;
    protected $educationRepository;
    protected $expirienceRepository;
    protected $userRepository;

    public function __construct(PortfolioRepository $portfolioRepository, EducationRepository $educationRepository, ExperienceRepository $expirienceRepository, UserRepository $userRepository)
    {
        $this->portfolioRepository = $portfolioRepository;
        $this->educationRepository = $educationRepository;
        $this->expirienceRepository = $expirienceRepository;
        $this->userRepository = $userRepository;
    }


    public function store(PortfolioRequest $request)
    {
        try {
            $teacherId = session('user_id');
            $data = $request->validated();
            $portfolio = $this->portfolioRepository->find($teacherId);
            if (!$portfolio) {
                $portfolio = $this->portfolioRepository->create($teacherId);
                if (!$portfolio) {
                    return response()->json([
                        'error' => 'Portfolio not created'
                    ], 500);
                }
            }
    
            foreach ($data['education'] as $education) {
                if (!empty($education['id'])) {
                    $existingEducation = $this->educationRepository->find($education['id']);
                    if ($existingEducation) {
                        $this->educationRepository->update($education['id'], $education);
                    }
                } else {
                    $duplicateEducation = $this->educationRepository->findByAttributes([
                        'degree' => $education['degree'],
                        'from' => $education['from'],
                        'to' => $education['to'],
                        'portfolio_id' => $portfolio->id,
                    ]);
    
                    if (!$duplicateEducation) {
                        $this->educationRepository->create($education, $portfolio->id);
                    }
                }
            }
    
            foreach ($data['experience'] as $experience) {
                if (!empty($experience['id'])) {
                    $existingExperience = $this->expirienceRepository->find($experience['id']);
                    if ($existingExperience) {
                        $this->expirienceRepository->update($experience['id'], $experience);
                    }
                } else {
                    $duplicateExperience = $this->expirienceRepository->findByAttributes([
                        'degree' => $experience['degree'],
                        'from' => $experience['from'],
                        'to' => $experience['to'],
                        'portfolio_id' => $portfolio->id,
                    ]);
    
                    if (!$duplicateExperience) {
                        $this->expirienceRepository->create($experience, $portfolio->id);
                    }
                }
            }
    
            return redirect()->route('teacher-profile.afficherTeacherPortfolio')
                ->with('success', 'Portfolio updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }



    public function afficherTeacherPortfolio()
    {
        try {
            $teacherId = session('user_id');
            $teacher = $this->userRepository->find($teacherId);
            if (!$teacher) {
                return redirect()->back()->with('error', 'Teacher not found.');
            }
            $portfolio = $this->portfolioRepository->afficherTeacherPortfolio($teacherId);
            if (!$portfolio) {
                $portfolio = $this->portfolioRepository->create($teacherId);
                if (!$portfolio) {
                    return response()->json([
                        'error' => 'Could not create portfolio'
                    ], 500);
                }
            }

            return view('teacherdashboard.teacher-profile', compact('portfolio', 'teacher'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
