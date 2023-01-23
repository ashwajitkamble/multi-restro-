<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Policies\Categoriespolicy;
use App\Policies\Groupspolicy;
use App\Policies\Orderspolicy;
use App\Policies\Productspolicy;
use App\Policies\Storepolicy;
use App\Policies\Tablespolicy;
use App\Policies\Userpolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Categoriespolicy::categoryPolicies();
        Groupspolicy::rolePolicies();
        Orderspolicy::orderPolicy();
        Productspolicy::menuPolicies();
        Storepolicy::storePolicies();
        Tablespolicy::tablePolicies();
        Userpolicy::userPolicies();
    }
}
