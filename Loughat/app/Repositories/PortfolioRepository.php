<?php

namespace App\Repositories;

use App\Models\Portfolio;

class PortfolioRepository 
{
    public function create(array $data, int $teacherId )
    {       
        $portfolio = new Portfolio();
        $portfolio->about_me = $data['about_me'];
        $portfolio->teacher_id = $teacherId;
        $portfolio->save();
        return $portfolio;
    }
    public function update(array $data, int $portfolioId)
    {
        $portfolio = Portfolio::find($portfolioId);
        if(! $portfolio){
            return false;
        }
        if (isset($data['about_me'])) {
            $portfolio->about_me = $data['about_me'];
        }
         $portfolio->save();
         return $portfolio;
    }
    public function find(int $portfolioId)
    {
        $portfolio = Portfolio::find($portfolioId);
        return $portfolio;
    }
    public function getAboutme (int $teacherId)
    {
        $portfolio = Portfolio::where('teacher_id', $teacherId)->first();
        if(! $portfolio){
            return false;
        }
        return $portfolio;
    }
}