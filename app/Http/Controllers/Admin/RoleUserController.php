<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
            'password' => ['required', 'confirmed']
        ]);

        $role = Role::findOrFail($request->role);

        if ($role->name == 'Super Admin') {
            AlertService::error('You cannot create Super Admin role.');
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
    public function update(Request $request, Admin $role_user): RedirectResponse
    {
        if ($role_user->hasRole('Super Admin')) {
            AlertService::error('You cannot update Super Admin user.');
            return to_route('admin.role-user.index');
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:admins,email,' . $role_user->id],
        ]);

        $role = Role::findOrFail($request->role);

        if ($role->name == 'Super Admin') {
            AlertService::error('You cannot create Super Admin role.');
            return to_route('admin.role-user.index');
        }

        $admin = $role_user;
        $admin->name = $request->name;
        $admin->email = $request->email;
        if ($request->filled('password')) {
            $request->validate([
                'password' => ['required', 'confirmed']
            ]);
            $admin->password = bcrypt($request->password);
        }
        $admin->save();

        $admin->assignRole($role);

        AlertService::created();

        return to_route('admin.role-user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $role_user): JsonResponse
    {
        if ($role_user->hasRole('Super Admin')) {
            return response()->json(['status' => 'error', 'message' => 'You cannot delete Super Admin user.'], 403);
        }

        try {
            // remove all roles from the user before deleting
            foreach ($role_user->getRoleNames() as $role) {
                $role_user->removeRole($role);
            }
            $role_user->delete();
            AlertService::deleted();
            return response()->json(['status' => 'success', 'message' => 'Deleted successfully.']);
        } catch(\Throwable $th) {
            Log::error('Role Deletion Error: ', $th);
            return response()->json(['status' => 'error', 'message' => 'Failed to delete role user.'], 500);
        }
    }
}
