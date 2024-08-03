<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class ImportService
{
    public function getAvailableImportTypes(): array
    {
        $userPermissions = Auth::user()->userPermissions()->with('permission')->get();
        $userPermissionsArray = $userPermissions->pluck('permission.name')->toArray();

        $importTypes = config('import');

        return array_filter($importTypes, function ($importType) use ($userPermissionsArray) {
            return in_array($importType['permission_required'], $userPermissionsArray);
        });
    }
}
