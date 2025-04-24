<?php
namespace App\Repositories;

use App\Models\Experience;

class ExperienceRepository 
{
    public function create(array $data, $portfolioId)
    {
        $experience = new Experience();
        $experience->degree = $data['degree'];
        $experience->from = $data['from'];
        $experience->to = $data['to'];
        $experience->description = $data['description'];
        $experience->portfolio_id = $portfolioId;
        $experience->save;
        return $experience ; 
    }

    
}







