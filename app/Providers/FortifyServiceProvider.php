<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewCustomer;
use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use App\Actions\Fortify\ValidateRecaptcha;
use Laravel\Fortify\Features;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        config()->set('fortify.redirects.logout', RouteServiceProvider::LOGIN);

        if (request()->headers->get('origin') === config('app.frontend_url')) {
            // if(request()->is('auth/*')) {
            config()->set('fortify.views', false);
            // config()->set('fortify.prefix', 'auth');
            config()->set('fortify.guard', 'customers');
            config()->set('fortify.passwords', 'customers');
            // config()->set('fortify.middleware', ['api']);
            config()->set('fortify.features', [
                Features::registration(),
                Features::resetPasswords(),
                Features::emailVerification(),
                Features::updateProfileInformation(),
                Features::updatePasswords(),
                // Features::twoFactorAuthentication([
                //     'confirmPassword' => true,
                // ]),
            ]);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(ValidateRecaptcha::class, function ($app) {
            return new ValidateRecaptcha($app->make(LoginRateLimiter::class), config('recaptcha.secret_key'));
        });

        // Fortify::authenticateThrough(function (Request $request) {
        //     return array_filter([
        //         config('fortify.limiters.login') ? null : EnsureLoginIsNotThrottled::class,
        //         Features::enabled(Features::twoFactorAuthentication()) ? RedirectIfTwoFactorAuthenticatable::class : null,
        //         // ValidateRecaptcha::class,
        //         AttemptToAuthenticate::class,
        //         PrepareAuthenticatedSession::class,
        //     ]);
        // });

        Fortify::createUsersUsing(request()->headers->get('origin') === config('app.frontend_url') ? CreateNewCustomer::class : CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(20)->by($request->email . $request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
