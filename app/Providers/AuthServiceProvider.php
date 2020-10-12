<?php

namespace App\Providers;

use App\Docter;
use App\Manager;
use App\Policies\DocterPolicy;
use App\Policies\ManagerPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\User;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Docter' => 'App\Policies\ManagerPolicy',
        Docter::class => DocterPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('admin-user', function ($user) {
            return $user->hasRole('admin');
        });
        Gate::define('manager-user', function ($user) {
            return $user->hasRole('manager');
        });
        Gate::define('doctor-user', function ($user) {
            return $user->hasRole('doctor');
        });
        Gate::define('clerk-user', function ($user) {
            return $user->hasRole('clerk');
        });
        // Gate::define('patient-user', function ($user) {
        //     return $user->hasRole('patient');
        // });

        Gate::define('doctorCompelet', function ($user) {
            return $user->doctor_compelet(1);
        });
        Gate::define('clerk-compelet', function ($user) {
            return $user->doctor_compelet(1);
        });
        // Gate::define('doctor-checkFalse', function ($user) {
        //     return $user->loginFalse();
        // });
    }
}
