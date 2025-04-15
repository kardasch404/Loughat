<?php

namespace App\Repositories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{


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

    public function update(array $data, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return false;
        }
        if (isset($data['firstname'])) {
            $user->firstname = $data['firstname'];
        }
        if (isset($data['lastname'])) {
            $user->lastname = $data['lastname'];
        }
        if (isset($data['phone'])) {
            $user->phone = $data['phone'];
        }
        if (isset($data['photo'])) {
            $user->photo = $data['photo'];
        }
        if (isset($data['email'])) {
            $user->email = $data['email'];
        }
        return $user;
    }

    public function find($id)
    {
        $user = User::find($id);
        return $user;
    }
}
