<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //

    protected $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        $roles = $this->roleRepository->all();
        return view('admindashboard.roles', compact('roles'));
    }
    public function create(RoleRequest $request)
    {
        try {

            $data = $request->validated();
            $role = $this->roleRepository->create($data);
            // return response()->json([
            //     'message' => 'role craeted seccss',
            //     'data' => $role
            // ]);
            return redirect()->back();

            return redirect()->back();
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function update(RoleRequest $request, $id)
    {
        try {

            $role = $this->roleRepository->find($id);

            if (! $role) {

                return response()->json([
                    'message' => 'role not found',
                ]);
            }
            $data = $request->validated();
            $updateRole = $this->roleRepository->update($data, $id);
            // return response()->json([
            //     'message' => 'role updated seccss',
            //     'data' => $updateRole
            // ]);
            return redirect()->back();
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function delete($id)
    {
        try {
            $role = $this->roleRepository->delete($id);
            if (! $role) {

                // return response()->json([
                //     'message' => 'role not found',
                // ]);
            }
            return redirect()->back();
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }
}
