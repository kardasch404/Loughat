<?php

namespace App\Repositories;

use App\Models\Role;

class RoleRepository
{

    public function create(array $data)
    {
        $role = Role::create($data);
        return $role;
    }
    public function update(array $data, $id)
    {
        $role = Role::findOrFail($id);
        $role->update($data);
        return $role;
    }
    public function all()
    {
        $roles = Role::all();
        return $roles;
    }
    public function delete($id)
    {
        $role = Role::find($id);
        if (! $role) {
            return false;
        }
        $role->delete();
    }
    public function find($id)
    {
        $role = Role::find($id);
        return $role ; 
    }
}
