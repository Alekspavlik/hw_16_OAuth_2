<?php

namespace App\Providers;

use App\Http\Controllers\AdsController;
use App\Models\Ads;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
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
//        Gate::define('edit-delete', function (User $user, $ad) {
//            if ($user) {
//                return $user->id == $ad->user_id;
//            }
//            return false;
//        });
    }
}
