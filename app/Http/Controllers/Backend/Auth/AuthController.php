<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Services\Auth\JwtGuard;
use Illuminate\Support\Facades\Auth;
use Session;
use App\User;
use Validator;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;


 
class AuthController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectPath        = '/admin/dashboard';
    protected $redirectAfterLogout = '/admin/login';
    protected $guard               = 'admin';
    protected $username            = 'username';
    protected $loginView           = 'backend.auth.login';
    protected $registerView        = 'backend.auth.register';

    public function __construct()
    { 
        $this->middleware('guest', ['except' => 'logout']);
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if (Session::has('pre_login_url')) {
            $url = Session::get('pre_login_url');
            Session::forget('pre_login_url');
            return redirect()->intended($url);
        } else {
            return $this->authenticated($request, $this->guard('admins')->user())
            ?: redirect()->intended($this->redirectPath());
        }
    }

    protected function credentials(Request $request)
    {
        $credentials = $request->only($this->username(), 'password');
        return array_add($credentials, 'status', '1');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();
        $request->session()->regenerate();

        return redirect($this->redirectAfterLogout);
    }

    public function username()
    {
        return $this->username;
    }

    protected function guard()
    {
        return Auth::guard($this->guard);  
    }

    public function showLoginForm()
    {
        return view($this->loginView);
    }

    public function redirectPath()
    {
        return $this->redirectPath;
    }
}
