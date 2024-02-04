<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\MemberPolicy;
use App\Policies\OwnerPolicy;
use App\Policies\StaffPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('chechmember',[MemberPolicy::class,'chechmember']);
        Gate::define('checkowner',[OwnerPolicy::class,'checkowner']);
        Gate::define('checkstaff',[StaffPolicy::class,'checkstaff']);
        //
    }
}
