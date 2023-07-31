<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Fortify\Http\Controllers\RegisteredUserController as FortifyRegisteredUserController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\StatefulGuard;
 use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Contracts\RegisterResponse;
use Laravel\Fortify\Contracts\RegisterViewResponse;
class CustomRegisteredUserController extends  FortifyRegisteredUserController
{
  
    public function register(Request $request )
     {
      Validator::make($request->all(), [
        'name' => ['required', 'string', 'max:255'],
        'email' => [
            'required',
            'string',
            'email',
            'max:255',
            Rule::unique(User::class),
        ],
        'phone'=> ['required','numeric' , 'unique:users,phone' ]
     ])->validate();
       $user = User::create([
        'name' => $request['name'],
        'email' => $request['email'],
        'phone' => $request['phone'],
 
    ]);

 
    return   view('auth.login');
     }














}
