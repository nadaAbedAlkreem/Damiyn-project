<?php 
namespace App\Actions\Fortify;
 use App\Models\User ; 
 use App\Models\Admin ; 
 use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Hash;
 use Laravel\Fortify\Fortify;
 use Illuminate\Support\Facades\Crypt;
 use Illuminate\Support\Facades\Auth;
 use Illuminate\Support\Facades\Session;

class AuthenticateUser      
{
    
   public function authenticate($request)
   {  


      if (config('fortify.guard') === 'admin') 
      {
         $email = $request['email'] ;
         $password = $request['password'] ;
            $user = Admin::where('email', $email)->where('password' , md5($password))->first();
          if ($user ) {
               Session::put('admin_session', true);
                return $user;
             }else
            {

 
             return false ; 
            }
      }
      else
      {
       $phone = $request['phone'] ;
       $user = User::where('phone' , $phone)->first() ; 
         if($user){
         return $user ; 
        }
 
        return false ;
 
      }
   
 
 
 
    
      
   }





}

?>

