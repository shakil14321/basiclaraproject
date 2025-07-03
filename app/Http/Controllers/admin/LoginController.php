<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $validator = Validated::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->passes()) {
           if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
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
}
