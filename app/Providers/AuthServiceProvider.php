<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {

        $this->registerPolicies();

        $gate->define('admin-access', function($user){
            return $user->role == 'admin';
        });

        $gate->define('moderator-access', function($user){
            return $user->role == 'moderator' || $user->role == 'admin';
        });

        $gate->define('user-access', function($user){
            return $user->role == 'user' || $user->role == 'admin' || $user->role == 'moderator';
        });
    }
}
