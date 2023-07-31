<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Routing\Pipeline;
use Laravel\Fortify\Actions\AttemptToAuthenticate;
use Laravel\Fortify\Actions\EnsureLoginIsNotThrottled;
use Laravel\Fortify\Actions\PrepareAuthenticatedSession;
use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Contracts\LoginViewResponse;
use Laravel\Fortify\Contracts\LogoutResponse;
use Laravel\Fortify\Features;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Requests\LoginRequest;
use App\Models\User ;

use Illuminate\Support\Facades\Session;

 
class CustomAuthenticatedSessionController extends AuthenticatedSessionController
{

  // public function create(Request $request): LoginViewResponse
  // {
  //   return app(LoginViewResponse::class);
  // }

    public function store(LoginRequest $request)
    {  

         $phone = $request['phone'] ;
          $user = User::where('phone' , $phone)->first() ; 
 
         if($user)
         {
          if( $user->two_factor_enabled == 0 )
           {
  
            $user->generateCode( $user->id);

             return view('Auth.verify' ,['phone' =>$phone] ); 
  
           }else
           {
 
             return $this->loginPipeline($request)->then(function ($request) {
                return app(LoginResponse::class);
            });
           }
        
        
        }
    }

    public function destroy(Request $request): LogoutResponse
    {
      // Auth::guard('admin')->logout();3

        $this->guard->logout();
 
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return app(LogoutResponse::class);
    }
}
