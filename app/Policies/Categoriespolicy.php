<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\HandlesAuthorization;

class Categoriespolicy
{
    use HandlesAuthorization;

    public static function categoryPolicies(){
        Gate::define('category', function ($user) {
            return $user->hasAccess(['category']);
        });

        Gate::define('category-add', function ($user) {
            return $user->hasAccess(['category-add']);
        });

        Gate::define('category-edit', function ($user) {
            return $user->hasAccess(['category-edit']);
        });

        Gate::define('category-delete', function ($user) {
            return $user->hasAccess(['category-delete']);
        });
    }
}
