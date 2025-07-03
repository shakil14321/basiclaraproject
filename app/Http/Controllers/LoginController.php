<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if ($validator->passes()) {
           if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('account.dashboard');
        } else {
            return redirect()->route('account.login')
                ->with('error','Either your email or password is incorrect');
        }
    } else {
            return redirect()->route('account.login')
                ->withInput()
                ->withErrors($validator);
        }
    }

    public function register()
    {
        return view('register');
    }

    public function processRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        if ($validator->passes()) {

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password); // Hash the password using Laravel's Hash facade
            $user->role = 'customer';
            $user->save();


            return redirect()->route('account.login')
                ->with('success', 'Registration successful! You can now log in.');
        }    else {
            return redirect()->route('account.register')
                ->withInput()
                ->withErrors($validator);
        }  
    }

    public function logout(){

        Auth::logout();
        return redirect()->route('account.login');
    }    
}
