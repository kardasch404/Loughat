<?php

namespace App\Repositories;

use App\Models\Commande;
use Illuminate\Console\Command;

class CommandeRepository
{
    public function create(array $data, $coursId, $userId)
    {
        $commande = new Commande();
        $commande->status = $data['status'];
        $commande->montant = $data['montant'];
        $commande->cours_id = $coursId;
        $commande->user_id = $userId;
        $commande->save();

        return $commande;
    }
    public function find($id)
    {
        $commande = Commande::find($id);
        return $commande;
    }
    public function all()
    {
        $commandes = Commande::all();
        return $commandes;
    }
    public function getAllCommandeFromTeacher($teacherId)
    {
        $commandes = Commande::whereHas('cours', function ($query) use ($teacherId) {
            $query->where('teacher_id', $teacherId);
        })->with(['user', 'cours.teacher'])->get();

        return $commandes;
    }
    public function getAllCommandeFromStudent($studentId)
    {
        $commandes = Commande::where('user_id', $studentId)
            ->with(['cours', 'payments'])
            ->get();

        if ($commandes->isEmpty()) {
            return false;
        }

        return $commandes;
    }

    public function getAllCommandesForStudentPaidOrNotPaid($studentId)
    {
        $commandes = Commande::where('user_id', $studentId)
            ->with(['cours', 'payment'])
            ->get();
        // dd($commandes);

        if ($commandes->isEmpty()) {
            return false;
        }

        $filteredCommandes = $commandes->groupBy('cours_id')->map(function ($group) {
            $paidCommande = $group->firstWhere('payment', '!=', null);
            if ($paidCommande) {
                return $paidCommande;
            }
            return $group->first();
        })->values();

        return $filteredCommandes->isEmpty() ? false : $filteredCommandes;
    }
    public function getCommandsByStudent($studentId)
    {
        return Commande::where('user_id', $studentId)
            ->get();
    }
    public function hasPaidCommandForTeacher($studentId, $teacherId)
    {
        return Commande::join('cours', 'commandes.cours_id', '=', 'cours.id')
            ->join('payments', 'commandes.id', '=', 'payments.command_id')
            ->where('commandes.user_id', $studentId)
            ->where('cours.teacher_id', $teacherId)
            ->exists();
    }
}
