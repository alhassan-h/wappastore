<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the register page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function showRegistrationForm()
    {

        $data = [
            'page_name' => 'register',
        ];

        return view('auth.register', compact('data'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'size:11', 'unique:customers'],
            'address' => ['required', 'string', 'max:255'],
            'profile' => ['sometimes', 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function createUser(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
 
    /**
     * Create a new customer instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Customer
     */
    protected function createCustomer(array $data)
    {
        return Customer::create([
            'user_id' => $data['user_id'],
            'phone' => $data['phone'],
            'profile' => $data['profile'],
            'address' => $data['address'],
        ]);
    }

    /**
     * recieve submitted data.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function register(Request $request)
    {
        
        $validatedData = $this->validator($request->all())->safe()->except(['_token']);
        
        $user = $this->createUser($validatedData);

        $validatedData['user_id'] = $user->id;
        $validatedData['profile'] = '';
        
        $customer = $this->createCustomer($validatedData);

        return redirect( route('login') )->with('success', 'Registration Successful! Please Login.');
    }
}
