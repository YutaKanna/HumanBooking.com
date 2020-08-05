<?php

namespace App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Agency;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var stringp
     */
    protected $redirectTo = '/agency';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:agency')->except('logout');
    }

    public function showLoginForm()
    {
        return view('agencies.login');
    }

    public function authenticate(Request $request)
    {
        $this->validateLogin($request);
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->guard()->validate($this->credentials($request))) {
            $inputs = $request->all(['email', 'password', 'remember']);
            $user = Agency::where(['email' => $inputs['email']])->first();
            $rememberMe = $inputs['remember'] ?? false;

            $credentials = ['email' => $inputs['email'], 'password' => $inputs['password']];

            $this->guard()->attempt($credentials, $rememberMe);
            return redirect()->route('agencies.index');
        } else {
            $this->errorMessage = __('auth.failed');
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    protected function guard()
    {
        return Auth::guard('agency');
    }

    public function logout(Request $request)
    {
        Auth::guard('agency')->logout();
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect('/agency/login');
    }
}
