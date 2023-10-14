<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
// use App\Rules\UsernameValidation;
use Illuminate\Support\Str;

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
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::DASHBOARD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the login page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
  
    public function showLoginForm()
    {

        $data = [
            'page_name' => 'login',
        ];

        return view('auth.login', compact('data'));
    }

    /**
     * Handle an authentication attempt.
     *
     * @return void
     */
  
    public function login(Request $request): RedirectResponse
    {

        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard')->with('login', 'Login successfully!');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records!',
        ])->onlyInput('email');
    }
}
