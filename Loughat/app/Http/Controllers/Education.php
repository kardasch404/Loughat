<?php

namespace App\Http\Controllers;

use App\Http\Requests\EducationRequest;
use App\Repositories\EducationRepository;
use App\Repositories\PortfolioRepository;
use Exception;

class Education extends Controller
{
    protected $educationRepository;
    protected $portfolioRepository;

    public function __construct(EducationRepository $educationRepository, PortfolioRepository $portfolioRepository)
    {
        $this->educationRepository = $educationRepository;
        $this->portfolioRepository = $portfolioRepository;
    }

    public function store(EducationRequest $request)
    {
        try {
            $teacher = session('user_id');
            $portfolio = $this->portfolioRepository->find($teacher);
            if (!$portfolio) {
                return response()->json([
                    'message' => 'portfolio nt found'
                ]);
            }
            $data = $request->validated();
            $education = $this->educationRepository->create($data, $portfolio);
            return response()->json([
                'message' => 'education created seccss',
                'education' => $education
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }
    public function update(EducationRequest $request)
    {
        try {
            $teacher = session('user_id');
            if (! $teacher) {
                return response()->json([
                    'message' => 'teacher not logged'
                ]);
            }
            $data = $request->validated();

            $education = $this->educationRepository->find($id);
            if (!$education) {
                return response()->json([
                    'message' => 'education not found'
                ]);
            }
            $updateEducation = $this->educationRepository->update($data);
            return response()->json([
                'message' => 'education updated seccss',
                'education' => $updateEducation
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }
    public function getAllEducationFromPortfolio()
    {
       try {
        $teacher = session('user_id');
        if (!$teacher) {
            return response()->json([
                'message' => 'teacher not logged'
            ]);
        }
        $portfolio = $this->portfolioRepository->find($teacher);
        if (!$portfolio) {
            return response()->json([
                'message' => 'portfolio not found'
            ]);
        }
        $educations = $this->educationRepository->getAllEducationFromPortfolio($portfolio);
        return response()->json([
            'educations' => $educations
        ]);
       } catch (Exception $e) {
        return response()->json([
            'error' => $e->getMessage()
        ]);
       }
    }
}
