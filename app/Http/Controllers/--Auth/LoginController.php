<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User ; 
use Auth; 
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Actions\AttemptToAuthenticate;
use Laravel\Fortify\Actions\PrepareAuthenticatedSession;
use Laravel\Fortify\Contracts\LoginViewResponse;
use Laravel\Fortify\Contracts\LoginResponse;
use Illuminate\Validation\ValidationException;
  class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login( Request $request  
    , AttemptToAuthenticate $attemptToAuthenticate, LoginResponse $loginResponse){
     
    //    $phone =  $request['phone'] ; 
    //      $user = User::where('phone' , $phone)->first();
    //     // if($user != null){
        // Auth::login($user);
        // $request->session()->regenerate();
        // //user is logged in.
        // return redirect('home');
          
        $credentials = $request->only('phone');
         $user = $attemptToAuthenticate->handle($request, $credentials);
         if ($user) {
            $this->guard->login($user);

            return $loginResponse->toResponse($request);
        }

        throw ValidationException::withMessages([
            Fortify::username() => [trans('auth.failed')],
        ]);

    }

       
     
 


    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
