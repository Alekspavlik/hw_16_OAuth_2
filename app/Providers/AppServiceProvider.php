<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        $parameters = [
            'response_type' => 'code',
            'client_id' => config('oauth.dropbox.app_key'),
            'redirect_uri' => config('oauth.dropbox.redirect_uri')
        ];
        View::share('oauth_dropbox_uri', 'https://www.dropbox.com/oauth2/authorize?' . http_build_query($parameters));
    }
}
