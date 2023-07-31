<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
 use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;

class Admin extends Model      implements Authenticatable 
{
    use HasApiTokens, HasFactory, SoftDeletes ,Notifiable;
    protected $table = 'admins';

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',

     ];
     protected function credentials(Request $request)
     {
         return $request->only('email' , 'password');
     }
     public function getAuthIdentifierName()
     {
         return 'id';
     }
 
     public function getAuthIdentifier()
     {
         return $this->getKey();
     }
 
     public function getAuthPassword()
     {
         return $this->password;
     }
     public function getRememberToken()
     {
         return $this->remember_token;
     }
 
     public function setRememberToken($value)
     {
         $this->remember_token = $value;
     }
 
     public function getRememberTokenName()
     {
         return 'remember_token';
     }
}
