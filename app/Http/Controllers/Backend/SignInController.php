<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admins;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Services\Auth\JwtGuard;
use Illuminate\Support\Facades\Auth;
use Session;


class SignInController extends Controller
{
    public function form()
    {
        return view('backend.auth.login');
    }

    public function attempt(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|exists:admins,email',
            'password' => 'required',
        ]);

        $attempts = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($attempts, (bool) $request->remember)) {
            return redirect()->intended('/admin/dashboard');
        }

        return redirect()->intended('/admin/dashboard');
    }
}
