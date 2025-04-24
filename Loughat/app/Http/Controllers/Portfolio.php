<?php

namespace App\Http\Controllers;

use App\Http\Requests\PortfolioRequest;
use App\Repositories\PortfolioRepository;
use Illuminate\Http\Request;

class Portfolio extends Controller
{
    protected $portfolioRepository; 

    public function __construct(PortfolioRepository $portfolioRepository)
    {
        $this->portfolioRepository = $portfolioRepository;
    }

    public function store(PortfolioRequest $request)
    {
      try{
        $teacher = session('user_id');
        if(!$teacher)
        {
            return response()->json([
                'error' => 'teacher nt login '
            ]);
        }
        
        $data = $request->validated();
        $portfolio = $this->portfolioRepository->create($data,$teacher);
        return response()->json([
            'success' => 'portfolio created success',
            'portfolio' => $portfolio,
            'teacher' => $teacher
        ]);

      }catch(\Exception $e)
      {
        return response()->json([
            'error' => $e->getMessage()
        ]);
      }
        

    } 


    

}
