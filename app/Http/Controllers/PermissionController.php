<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePermissionRequest;
use App\Http\Requests\GrantPermissionRequest;
use App\Models\Permission;
use App\Models\User;
use App\Models\UserPermission;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PermissionController extends Controller
{
    public function createPermission(CreatePermissionRequest $request): RedirectResponse
    {
        Permission::create(['name' => $request->get('name')]);
        return redirect()->back()->with('success', 'Permission created successfully.');
    }

    public function editPermission(Permission $permission): View
    {
        return view('permissions.edit', compact('permission'));
    }

    public function updatePermission(Permission $permission, CreatePermissionRequest $request): RedirectResponse
    {
        $permission->update(['name' => $request->get('name')]);
        return redirect()->route('permissions')->with('success', 'Permission updated successfully.');
    }

    public function givePermission(Permission $permission): View
    {
        return view('permissions.give', compact('permission'));
    }

    public function grantPermission(Permission $permission, GrantPermissionRequest $request): RedirectResponse
    {
        $user = User::firstWhere('email', $request->get('email'));
        UserPermission::create(['user_id' => $user->id, 'permission_id' => $permission->id,]);

        return redirect()->route('permissions')->with('success', 'Permission granted.');
    }

    public function deletePermission(Permission $permission): RedirectResponse
    {
        $permission->delete();
        return redirect()->back()->with('success', 'Permission deleted successfully.');
    }
}
