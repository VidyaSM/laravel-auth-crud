<?php

namespace App\Http\Controllers;

use App\User;
use Mail;
use Illuminate\Http\Request;

class UserController extends Controller

{

  public function validation($code)
  {
    $user = User::where('token', '=', $code)->where('activated','=',0);

      if($user->count())
      {
        $user = $user->first();

        //Update user to activate state
        $user->activated = 1;
        $user->token = '';

        $user->save();

        if($user)
        {
            return redirect('/')->with('status', 'Your account has been activated!');
        }
        else
        {
            return redirect('/')->with('status', 'We can not activate your account');
        }
      }
      else {
        return redirect('/')->with('status', 'We can not activate your account');
      }

  }

  public function sendValidation($email)
  {
    $code = str_random(25);
    $user = User::where('email','=',$email);

    if($user->count())
    {

      Mail::send('auth.emails.validation', ['code' => $code], function ($m) use ($email){
          $m->to($email, 'user')->subject('Validasi Akun');
      });

      $user = $user->first();

      //Update user to activate state
      $user->token = $code;

      $user->save();

      if($user)
      {
          return redirect('/')->with('status', 'We have sent you an activation code, check e-email!');
      }
      else
      {
          return redirect('/')->with('status', 'We can not send the activation code');
      }
    }
    else {
      return redirect('/')->with('status', 'We can not send the activation code');
    }
  }

}

?>
