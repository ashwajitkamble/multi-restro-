<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\HandlesAuthorization;

class Storepolicy
{
    use HandlesAuthorization;

    public static function storePolicies(){
        Gate::define('store', function ($user) {
            return $user->hasAccess(['store']);
        });

        Gate::define('store-add', function ($user) {
            return $user->hasAccess(['store-add']);
        });

        Gate::define('store-edit', function ($user) {
            return $user->hasAccess(['store-edit']);
        });

        Gate::define('store-delete', function ($user) {
            return $user->hasAccess(['store-delete']);
        });
    }
}
