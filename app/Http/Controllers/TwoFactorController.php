<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User ; 
class TwoFactorController extends Controller
{
  public function enable(Request $request)
    {
        $user = $request->user();
        $user->two_factor_enabled = true;
        $user->save();

        // Optionally, you can add any additional logic or redirect the user to a specific page.
    }
}
 
