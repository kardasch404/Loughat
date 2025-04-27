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
    public function update(array $data, $experienceId)
    {
        $experience = Experience::find($experienceId);
        if(! $experience)
        {
            return false;
        }
        $experience->degree = $data['degree'];
        $experience->from = $data['from'];
        $experience->to = $data['to'];
        $experience->description = $data['description'];
        $experience->save;
        return $experience ;
    }

    public function getAllExperienceForPortfolio ()
    {
        $experiences = Experience::all();
        if(! $experiences)
        {
            return false;
        }
        return $experiences ;
    }
    public function find($experienceId)
    {
        $experience = Experience::find($experienceId);
        if(! $experience)
        {
            return false;
        }
        return $experience ;
    }


    
}







