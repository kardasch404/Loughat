<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository{


    public function allStudents()
    {
        return User::whereHas('roles', function ($query) {
            $query->where('name', 'user');
        })->get();
    }
    public function allTeachers()
    {
        return User::whereHas('roles', function ($query) {
            $query->where('name', 'Teacher');
        })->get();
    }

    public function getAllusersWithRole()
    {
        $users = User::with('roles')->get();
        return $users;
    }
}
