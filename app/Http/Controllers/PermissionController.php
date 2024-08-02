<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePermissionRequest;
use App\Models\Permission;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PermissionController extends Controller
{
    public function createPermission(CreatePermissionRequest $request): RedirectResponse
    {
        Permission::create(['name' => $request->get('name')]);
        return redirect()->back();
    }

    public function editPermission(Permission $permission): View
    {
        return view('permissions.edit', compact('permission'));
    }

    public function updatePermission(Permission $permission, CreatePermissionRequest $request): RedirectResponse
    {
        $permission->update(['name' => $request->get('name')]);
        return redirect()->route('permissions');
    }

    public function deletePermission(Permission $permission): RedirectResponse
    {
        $permission->delete();
        return redirect()->back();
    }
}
