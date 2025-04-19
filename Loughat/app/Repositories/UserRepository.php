<?php

namespace App\Repositories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{

    public function createUser(array $data)
    {   
        // $status = ($data['role'] === 'Teacher') ? 'pending' : 'Valide';
        $user = User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => 'pending',
            'photo' => 'https://s3.amazonaws.com/37assets/svn/765-default-avatar.png'
        ]);

        $this->assignUserRole($user);
        return $user;
    }
    public function assignUserRole(User $user)
    {   
        $userRole = Role::where('name', 'user')->first();
        if ($userRole) {
            $user->roles()->attach($userRole->id);
        }
    }

    public function getUserByCredentials(array $credentials)
    {
        return User::where('email', $credentials['email'])->first();
    }

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
    public function getAdmin()
    {
        return User::whereHas('roles', function ($query) {
            $query->where('name', 'admin');
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
        $user->save();
        return $user;
    }

    public function find($id)
    {
        $user = User::find($id);
        return $user;
    }

    public function updatePassword (array $data, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return false;
        }
        if (!Hash::check($data['old_password'], $user->password))
        {
            return 'old pass incorect'; 
        }
        $user->password = Hash::make($data['new_password']);
        $user->save();
        return $user;
           
    }
       
    

    
}
