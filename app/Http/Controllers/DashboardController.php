<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the customer profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile()
    {
        $page_name = 'profile';
        return view('customer.profile', compact('page_name'));
    }
 
    /**
     * Show a customer's orders.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function myorders(Request $request)
    {
        $page_name = 'myorders';
        return view('customer.orders', compact('page_name'));
    }
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        $page_name = 'dashboard';
        return view('admin.dashboard', compact('page_name'));
    }
    
    /**
     * Show the customers' products.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function products()
    {
        $page_name = 'products';
        return view('admin.products', compact('page_name'));
    }

    /**
     * Show the customers' orders.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function orders()
    {
        $page_name = 'orders';
        return view('admin.orders', compact('page_name'));
    }
    
    /**
     * Show the customers.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function customers()
    {
        $page_name = 'customers';
        return view('admin.customers', compact('page_name'));
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect(route('login'));
    }
}
