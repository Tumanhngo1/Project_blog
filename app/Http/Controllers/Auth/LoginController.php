<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function create(){
        return view('auth.login');
    }

    public function store(){
        $attributes = request()->validate([
            'email' => 'required|email',
            'password'=>'required'
        ]);

        if(Auth::attempt($attributes)){
            session()->regenerate();
            return redirect('/');//->with('success','come back');
        }

        throw ValidationException::withMessages([
            'email' => 'Sai ten hoac mat khau vui long kiem tra lai'
        ]);
    }
    
    public function destroy(){
        Auth::logout();
        return redirect('/');
    }
}
