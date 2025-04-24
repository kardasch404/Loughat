<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExperienceRequest;
use App\Repositories\ExperienceRepository;
use App\Repositories\PortfolioRepository;
use Exception;
use Illuminate\Http\Request;

class Experience extends Controller
{
    //

    protected $experienceRepository; 
    protected $portfolioRepository; 
    
    public function __construct(ExperienceRepository $experienceRepository)
    {
        $this->experienceRepository = $experienceRepository;
    }

    public function store(ExperienceRequest $request)
    {
        try {
            $data = $request->validated();
        $portfolio = $this->portfolioRepository->find(session('user_id'));
        if(! $portfolio)
        {
            return response()->json([
                'portfolio' => $portfolio
            ]);
        }
        $experience = $this->experienceRepository->create($data,$portfolio);
        return response()->json([
            'message' =>'expiernce created seccss',
            'message' => $experience
        ]);
        }catch (Exception $e)
        {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }

        
    
    }
}
