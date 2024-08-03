<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class ImportService
{
    public function getAvailableImportTypes(): array
    {
        $availableImportTypes = [];

        $userPermissions = Auth::user()->userPermissions()->with('permission')->get();
        $userPermissionsArray = $userPermissions->pluck('permission')->toArray();

        $importTypes = config('import');

        foreach ($importTypes as $key => $importType) {
            foreach ($userPermissionsArray as $userPermission) {
                if ($importType['permission_required'] === $userPermission['name']) {
                    $availableImportTypes[$key] = $importType;
                    $availableImportTypes[$key]['permission_id'] = $userPermission['id'];
                }
            }
        }

        return $availableImportTypes;
    }
}
