<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth; 
use Laravel\Fortify\Fortify;
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
use Laravel\Fortify\Http\Requests\LoginRequest;
use App\Models\User ;
use Illuminate\Foundation\Auth\RedirectsUsers;

class VerificationController  extends AuthenticatedSessionController

{
    use RedirectsUsers;
     
  
    // public function showForm(Request $request){

    //      $phone  =   $request['phone']   ;
 
    //      $user = new User();
    //      $status  = $user::where('phone' , $phone)->first() ; 
    //      if($status->two_factor_enabled  == 0){
    //         $user->generateCode($status['id']);

    //      }
    //     return view('Auth.verify' ,['phone' =>$phone] ); 
    // }


    public function actionVerification(LoginRequest $request){
       $phone  =   $request['phone'] ;   
 
       $code =intval($request['num1'].$request['num2'].$request['num3'].$request['num4'].$request['num5'] ); 
       $user = User::select('id')->where('phone' , $phone)->first(); 
       $veritify =  $user::where('code' , $code )->first();
        if($veritify != null)
       {
 
         $user->two_factor_enabled = 1  ; 
        $user->save() ; 
        return $this->loginPipeline($request)->then(function ($request) {
            return app(LoginResponse::class);
        });
        }
    


   }




}
