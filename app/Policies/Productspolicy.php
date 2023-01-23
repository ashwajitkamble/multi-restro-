<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\HandlesAuthorization;

class Productspolicy
{
    use HandlesAuthorization;

    public static function menuPolicies(){
        Gate::define('menu', function ($user) {
            return $user->hasAccess(['menu']);
        });

        Gate::define('menu-add', function ($user) {
            return $user->hasAccess(['menu-add']);
        });

        Gate::define('menu-edit', function ($user) {
            return $user->hasAccess(['menu-edit']);
        });

        Gate::define('menu-delete', function ($user) {
            return $user->hasAccess(['menu-delete']);
        });
    }
}
