<?php

namespace App\Http\Controllers;

use App\Http\Requests\PortfolioRequest;
use App\Http\Requests\PortfolioUpdateRequest;
use App\Repositories\PortfolioRepository;
use Illuminate\Http\Request;

class PortfolioController extends Controller
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

    public function update(PortfolioUpdateRequest $request, $id)
    {
        try{
    
        $teacher = session('user_id');
        if(!$teacher)
        {
            return response()->json([
                'error' => 'teacher nt login '
            ]);
        }
        $portfolio = $this->portfolioRepository->find($id);
        if(!$portfolio)
        {
            return response()->json([
                'error' => 'portfolio nt found'
            ]);
        }

        $data = $request->validated();
        $portfolio = $this->portfolioRepository->update($data,$teacher);
        return response()->json([
            'success' => 'portfolio updated success',
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
    public function getAboutme()
    {
       try{
        $teacher = session('user_id');
        if(!$teacher)
        {
            return response()->json([
                'error' => 'teacher nt login '
            ]);
        }
        $portfolio = $this->portfolioRepository->getAboutme($teacher);
        return response()->json([
            'success' => 'portfolio found success',
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
