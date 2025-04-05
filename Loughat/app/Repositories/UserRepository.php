<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository{


    public function all()
    {
        $users = User::all();
        return $users;
    }
}
