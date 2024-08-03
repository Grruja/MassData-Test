<?php

namespace App\Providers;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('user-management', function (User $user): bool {
            $permissionId = Permission::getPermissionId('user-management');
            return $user->hasPermission($permissionId);
        });

        Paginator::useBootstrapFive();
    }
}
