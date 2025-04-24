<?php

namespace App\Http\Controllers;

use App\Http\Requests\EducationRequest;
use App\Repositories\EducationRepository;
use App\Repositories\PortfolioRepository;
use Exception;

class Education extends Controller
{
    protected $educationRepository ;
    protected $portfolioRepository ;  

    public function __construct(EducationRepository $educationRepository, PortfolioRepository $portfolioRepository)
    {
        $this->educationRepository = $educationRepository;
        $this->portfolioRepository = $portfolioRepository;
    }

    public function store (EducationRequest $request)
    {
      try {
        $teacher = session('user_id');
        $portfolio = $this->portfolioRepository->find($teacher);
        if(!$portfolio){
            return response()->json([
               'message' => 'portfolio nt found'
            ]);
        }
        $data = $request->validated();
        $education = $this->educationRepository->create($data, $portfolio);
        

      }catch(Exception $e)
      {
        return response()->json([
            'error' => $e->getMessage()
        ]);
      }
    }
    public function update()
    {

    }
}
