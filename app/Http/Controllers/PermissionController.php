<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePermissionRequest;
use App\Models\Permission;
use Illuminate\Http\RedirectResponse;

class PermissionController extends Controller
{
    public function createPermission(CreatePermissionRequest $request): RedirectResponse
    {
        Permission::create(['name' => $request->get('name')]);
        return redirect()->back();
    }
}
