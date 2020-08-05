<?php

namespace App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;
use Illuminate\Httpe\Request;
use App\Agency;

class AgencyController extends Controller
{
    public function index()
    {
        $agencies = Agency::all();
        return view('agencies.index', ['agencies' => $agencies]);
    }

    protected function login(Request $request)
    {
        $this->validateLogin($request);
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->guard()->validate($this->credentials($request))) {
            $inputs = $request->all(['email', 'password', 'remember']);
            $user = User::where(['email' => $inputs['email']])->first();
            $rememberMe = $inputs['remember'] ?? false;

            $credentials = ['email' => $inputs['email'], 'password' => $inputs['password']];

            // todo:use enum
            if ($user->isAdmin()) {
                $this->guard()->attempt($credentials, $rememberMe);
                return redirect()->route('admin.index');
            } else {
                $this->errorMessage = __('auth.role');
            }
        } else {
            $this->errorMessage = __('auth.failed');
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
}
