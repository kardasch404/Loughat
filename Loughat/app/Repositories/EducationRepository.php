<?php

namespace App\Repositories;

use App\Models\Education;

class EducationRepository
{
    public function create(array $data, $portfolioId)
    {
        $education = new Education();
        $education->degree = $data['degree'];
        $education->from = $data['from'];
        $education->to = $data['to'];
        $education->description = $data['description'];
        $education->portfolio_id = $portfolioId;
        $education->save();
        return $education;
    }

    public function update($id, array $data)
{
    $education = Education::find($id);
    if ($education) {
        $education->update($data);
        return $education;
    }
    return false;
}
    public function find($id)
    {
        return Education::find($id);
    }

    public function getAllEducationFromPortfolio()
    {
        return Education::all();
    }

public function findByAttributes(array $attributes)
{
    return Education::where($attributes)->first();
}
}
