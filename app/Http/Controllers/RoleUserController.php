<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Services\AlertService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class RoleUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $admins = Admin::all();
        return view('admin.role-user.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $roles = Role::all();
        return view('admin.role-user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:admins,email'],
            'password' => ['required', 'min:4', 'confirmed'],
        ]);

        $role = Role::findOrFail($request->role);

        if ($role->name == 'Super Admin') {
            AlertService::error('You cannot create Super Admin user.');
            return to_route('admin.role-user.index');
        }

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->save();

        $admin->assignRole($role);

        AlertService::created();

        return to_route('admin.role-user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $role_user): View
    {
        $admin = $role_user;
        $roles = Role::all();
        return view('admin.role-user.edit', compact('admin', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $role_user)
    {
        if ($role_user->hasRole('Super Admin')) {
            AlertService::error('You cannot update the Super Admin user.');
            return to_route('admin.role-user.index');
        }

         $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:admins,email,'.$role_user->id],

        ]);

        $role = Role::findOrFail($request->role);

        if ($role->name == 'Super Admin') {
            AlertService::error('You cannot create Super Admin user.');
            return to_route('admin.role-user.index');
        }

        $admin = $role_user;
        $admin->name = $request->name;
        $admin->email = $request->email;
        if ($request->filled('password')) {
            $request->validate([
                'password' => ['required', 'min:4', 'confirmed'],
            ]);
            $admin->password = bcrypt($request->password);
        }

        $admin->save();

        $admin->assignRole($role);

        AlertService::updated();

        return to_route('admin.role-user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $role_user):JsonResponse
    {
        if ($role_user->hasRole('Super Admin')) {
            return response()->json(['status' => 'error', 'message' => 'You cannot delete the Super Admin user.']);
        }

        try {
            // remove roles from user
            foreach ($role_user->getRoleNames() as $role) {
                $role_user->removeRole($role);
            }
            $role_user->delete();
            AlertService::deleted();
            return response()->json(['status' => 'success', 'message' => 'Deleted successfully.']);
        } catch (\Throwable $th) {
            Log::error('Role Delete Error: ', $th);
            return response()->json(['status' => 'error', 'message' => $th->getMessage()]);
        }
    }
}
