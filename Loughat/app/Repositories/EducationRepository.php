<?php
namespace App\Repositories;

use App\Models\Education;

class EducationRepository 
{
    public function create(array $data, $portfolioId)
    {
        $education = new Education(); 
        $education->degree =$data['degree'];
        $education->from =$data['from'];
        $education->to =$data['to'];
        $education->description =$data['description'];
        $education->portfolio_id = $portfolioId;
        $education->save();
    }

}