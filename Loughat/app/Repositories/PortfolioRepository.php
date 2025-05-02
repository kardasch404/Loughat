<?php

namespace App\Repositories;

use App\Models\Portfolio;

class PortfolioRepository
{
    public function create(int $teacherId)
    {
        $portfolio = new Portfolio();
        if ($portfolio->where('teacher_id', $teacherId)->exists()) {
            return false;
        }
        $portfolio->teacher_id = $teacherId;
        $portfolio->save();
        return $portfolio;
    }
    public function find(int $teacherId)
    {
        return Portfolio::where('teacher_id', $teacherId)->first();
    }
    public function afficherTeacherPortfolio(int $teacherId)
    {
        return Portfolio::with(['educations', 'experiences'])
            ->where('teacher_id', $teacherId)
            ->first();
    }
}
