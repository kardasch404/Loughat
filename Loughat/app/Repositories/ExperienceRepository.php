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
        $experience->save();
        return $experience;
    }
    public function update($id, array $data)
    {
        $experience = Experience::find($id);
        if ($experience) {
            $experience->update($data);
            return $experience;
        }
        return false;
    }

    public function getAllExperienceByPortfolioId($portfolioId)
    {
        return Experience::where('portfolio_id', $portfolioId)->get();
    }
    public function find($experienceId)
    {
        $experience = Experience::find($experienceId);
        if (! $experience) {
            return false;
        }
        return $experience;
    }

    public function findByAttributes(array $attributes)
    {
        return Experience::where($attributes)->first();
    }
}
