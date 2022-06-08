<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Password;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ForgotPasswordController extends Controller
{
      public function showForget()
      {
         return view('auth.forgetPassword');
      }
  
     
      public function submitForget(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:users',
          ]);
  
          $token = Str::random(64);
  
          DB::table('password_resets')->insert([
              'email' => $request->email, 
              'token' => $token, 
              'created_at' => Carbon::now()
            ]);
  
          Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
              $message->to($request->email);
              $message->subject('Reset Password');
          });
  
          return back()->with('message', 'We have e-mailed your password reset link!');
      }
      
      public function showReset($token) { 
         return view('auth.forgetPasswordLink', ['token' => $token]);
      }
  
      public function submitReset(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:users',
              'password' => 'required|string|min:1|confirmed',
              'password_confirmation' => 'required'
          ]);
  
          $updatePassword = DB::table('password_resets')
                            ->where([
                                'email' => $request->email, 
                                'token' => $request->token
                              ])->first();
  
          if(!$updatePassword){
              return back()->withInput()->with('error', 'Invalid token!');
          }
  
            User::where('email', $request->email)
                        ->update(['password' => Hash::make($request->password)]);
 
            DB::table('password_resets')->where(['email'=> $request->email])->delete();
  
          return redirect('/login')->with('message', 'Your password has been changed!');
      }
}
