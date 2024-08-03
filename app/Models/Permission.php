<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Permission extends Model
{
    protected $table = 'permissions';

    protected $fillable = ['name'];

    public function userPermissions(): HasMany
    {
        return $this->hasMany(UserPermission::class);
    }

    public static function getPermissionId(string $permissionName): ?int
    {
        $permission = self::firstWhere('name', $permissionName);
        return $permission ? $permission->id : null;
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => strtolower(str_replace(' ', '-', $value)),
        );
    }
}
