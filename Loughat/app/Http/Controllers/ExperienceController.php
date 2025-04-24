<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExperienceRequest;
use App\Http\Requests\ExperienceUpdateRequest;
use App\Repositories\ExperienceRepository;
use App\Repositories\PortfolioRepository;
use Exception;

class Experience extends Controller
{
    //

    protected $experienceRepository;
    protected $portfolioRepository;

    public function __construct(ExperienceRepository $experienceRepository ,PortfolioRepository $portfolioRepository)
    {
        $this->experienceRepository = $experienceRepository;
        $this->portfolioRepository = $portfolioRepository;
    }

    public function store(ExperienceRequest $request)
    {
        try {
            $data = $request->validated();
            $portfolio = $this->portfolioRepository->find(session('user_id'));
            if (! $portfolio) {
                return response()->json([
                    'portfolio' => $portfolio
                ]);
            }
            $experience = $this->experienceRepository->create($data, $portfolio);
            return response()->json([
                'message' => 'expiernce created seccss',
                'message' => $experience
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function update(ExperienceUpdateRequest $request, $id) 
    {
        try{
            $portfolio = $this->portfolioRepository->find($id);
            if (!$$portfolio)
            {
                return response()->json([
                    'message' => 'portfolio not found'
                ]);
            }
            $data = $request->validated();
            $updateExperience = $this->experienceRepository->update($data,$id);
            return response()->json([
                'message' => 'sccesss update expienice'
            ]);

        }catch(\Exception $e)
        {
            return response()->json([
                'message' => $e->getMessage()
            ]);
        }
    }

    public function getAllExperienceForPortfolio()
    {
        try{
            $portfolio = $this->portfolioRepository->find(session('user_id'));
            if (!$portfolio)
            {
                return response()->json([
                    'message' => 'portfolio not found'
                ]);
            }
            $experiences = $this->experienceRepository->getAllExperienceForPortfolio($portfolio);
            return response()->json([
                'experiences' => $experiences
            ]);
        }catch(\Exception $e)
        {
            return response()->json([
                'message' => $e->getMessage()
            ]);
        }
    }
}
