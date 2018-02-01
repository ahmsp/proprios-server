<?php

namespace Proprios\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;
use Route;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'Proprios\Model' => 'Proprios\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Route::group([
            'prefix' => 'api',
            'middleware' => 'cors'
        ], function() {
            Passport::routes(function ($router) {
                $router->forAccessTokens();
//                $router->forPersonalAccessTokens();
                $router->forTransientTokens();
            });
        });

        Passport::tokensExpireIn(Carbon::now()->addHour(1));
        Passport::refreshTokensExpireIn(Carbon::now()->addDay(1));
    }
}
