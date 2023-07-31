<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Factory ; 
use Illuminate\Database\Eloquent\SoftDeletes;
use Exception;
use Twilio\Rest\Client;
use Laravel\Fortify\TwoFactorAuthenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, SoftDeletes ,Notifiable  ,  TwoFactorAuthenticatable;
   

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'two_factor_enabled',

     ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [  
        'phone'  , 
         'remember_token',
    ];
    protected $phone = 'phone';

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
     
    protected function credentials(Request $request)
    {
        return $request->only($phone);
    }

    public function orders()
    {
     return $this->hasMany('App\Models\Order', 'user_id' , 'id');
    }

    public function isTwoFactorEnabled()
{
    // Implement your logic to determine if 2FA is enabled for the user
    return $this->two_factor_enabled;
}
    public function generateCode($id)
    {

         $code = rand(10000, 99999);
         $user = User::find($id);
    
          $user->code = $code;
          $user->save();
   

        // $receiverNumber = auth()->user()->phone;
        // $message = "2FA login code is ". $code;
    
        // try {
   
        //     $account_sid = getenv("TWILIO_SID");
        //     $auth_token = getenv("TWILIO_TOKEN");
        //     $twilio_number = getenv("TWILIO_FROM");
    
        //     $client = new Client($account_sid, $auth_token);
        //     $client->messages->create($receiverNumber, [
        //         'from' => $twilio_number, 
        //         'body' => $message]);
    
        // } catch (Exception $e) {
        //     info("Error: ". $e->getMessage());
        // }
    }
     public function rating()
     {
        return $this->hasMany('App\Models\Rating',  'user_id' , 'id');

     }
}
