<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UserWithoutPermission implements ValidationRule
{
    protected int $permissionId;

    public function __construct(int $permissionId)
    {
        $this->permissionId = $permissionId;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $user = User::firstWhere('email', $value);
        if (!$user) return;

        $userHasPermission = $user->userPermissions()->where('permission_id', $this->permissionId)->exists();

        if ($userHasPermission) $fail("This user already has permission.");
    }
}
