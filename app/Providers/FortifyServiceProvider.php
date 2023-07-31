<?php

namespace App\Providers;
use Illuminate\Support\Facades\Config;
use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Actions\Fortify\AttemptToAuthenticate;
use App\Actions\Fortify\AuthenticateUser;
use App\Models\Admin; 
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;
use App\Models\User ; 
use Auth; 
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\RedirectResponse;
class FortifyServiceProvider extends ServiceProvider   
{
    /**
     * Register any application services.
     */
 

    public function register(): void
    {

        $request = request();
         if($request->is('admin/*'))
        {
             Config::set('fortify.guard', 'admin');
             Config::set('fortfiy.prefix' , 'admin');
             $this->app['config']->set('fortify.guard', 'admin');
            //  $this->app['config']->set('fortify.passwords', 'admins');
             $this->app['config']->set('fortify.prefix', 'admin');
             $this->app['config']->set('fortify.home',  RouteServiceProvider::DASHBORAD );
 
        }else
        {
            Config::set('fortify.guard', 'web');
             $this->app['config']->set('fortify.guard', 'web');
             $this->app['config']->set('fortify.passwords', 'web');
 
         }

    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {  

        if (config('fortify.guard') === 'web') 
        {
            $this->app['config']->set('fortify.home',  RouteServiceProvider::HOME );
            Fortify::authenticateUsing([new AuthenticateUser , 'authenticate' ]);
            Fortify::viewPrefix('auth.');
        } else 
        {

             $this->app['config']->set('fortify.home',  RouteServiceProvider::DASHBORAD );
 
             Fortify::authenticateUsing([new AuthenticateUser , 'authenticate' ]);

              Fortify::viewPrefix('dashborad.auth.');

         

        }
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

   
        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
   

     
    }
    

}
