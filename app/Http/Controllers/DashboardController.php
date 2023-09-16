<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Customers;

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
    public function profile(Request $request)
    {
        $user = $request->user();

        if( $user->usertype == 'admin'){
            return redirect( route('dashboard') );
        }

        $data = [
            'page_name' => 'profile',
            'customer' => DB::table('users')
                ->join('customers', 'users.id', 'customers.user_id')
                ->where('users.id', $user->id)
                ->get(),
        ];

        return view('customer.profile', compact('data'));
    }
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard(Request $request)
    {
        
        if( $request->user()->usertype == 'admin'){
            $data = [
                'page_name' => 'dashboard',
                'analytics' => [],
            ];
            return view('admin.dashboard', compact('data'));
        }
        
        $data = [
            'page_name' => 'dashboard',
            'analytics' => [],
        ];
        return view('customer.dashboard', compact('data'));
    }
    
    /**
     * Show the store products.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function products(Request $request)
    {
        $user = $request->user();

        if( $user->usertype == 'admin'){
            return $this->manageProducts();
        }

        return $this->customerProducts( $user->id );
        
    }
    
    /**
     * Show the store products.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    private function manageProducts()
    {
        $data = [
            'page_name' => 'products',
            'products' => [],
        ];
        return view('admin.products', compact('data'));
        
    }

    /**
     * Show a customer's products.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    private function customerProducts( $id )
    {
        $data = [
            'page_name' => 'products',
            'products' => [],
        ];

        return view('customer.products', compact('data'));
    }

    /**
     * Show the add products page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addProduct()
    {
        $data = [
            'page_name' => 'products',
            'products' => [],
        ];

        return view('admin.product_add', compact('data'));
    }

    /**
     * Show the customers' orders.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function orders(Request $request)
    {
        $user = $request->user();

        if( $user->usertype == 'admin'){
            return $this->allOrders();
        }

        return $this->customerOrders( $user->id );
    }

    /**
     * Show all orders.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    private function allOrders()
    {
        $data = [
            'page_name' => 'orders',
            'orders' => [],
        ];
        
        return view('admin.orders', compact('data'));
    }

    /**
     * Show a customer's orders.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    private function customerOrders( $id )
    {

        $data = [
            'page_name' => 'orders',
            'orders' => [],
        ];

        return view('customer.orders', compact('data'));
    }
    
    /**
     * Show the customers.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function customers()
    {
        $data = [
            'page_name' => 'customers',
            'customers' => DB::table('users')->join('customers', 'users.id', 'customers.user_id')
            ->get(),
        ];

        return view('admin.customers', compact('data'));
    }

    /* 
    *********************************************************************
        POSTS
    
    *********************************************************************
    */

    
    /**
     * Save a product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function saveProduct(Request $request)
    {
        dd( $request->all() );        
    }


    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect(route('login'));
    }
}
