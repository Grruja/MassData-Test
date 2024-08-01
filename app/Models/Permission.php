<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    protected $fillable = ['name'];

    public static function getPermissionId(string $permissionName): ?int
    {
        $permission = self::firstWhere('name', $permissionName);
        return $permission ? $permission->id : null;
    }
}
