<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\HandlesAuthorization;

class Tablespolicy
{
    use HandlesAuthorization;

    public static function tablePolicies(){
        Gate::define('table', function ($user) {
            return $user->hasAccess(['table']);
        });

        Gate::define('table-add', function ($user) {
            return $user->hasAccess(['table-add']);
        });

        Gate::define('table-edit', function ($user) {
            return $user->hasAccess(['table-edit']);
        });

        Gate::define('table-delete', function ($user) {
            return $user->hasAccess(['table-delete']);
        });
    }
}
