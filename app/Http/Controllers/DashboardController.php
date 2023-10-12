<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

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
        $user = $request->user();
        
        if( $user->isAdmin() ){
            $data = [
                'page_name' => 'dashboard',
                'analytics' => [],
            ];
            return view('admin.dashboard', compact('data'));
        }

        $analytics = [
            'products' => $user->customer->deliveredOrders()->count(),
            'orders' => $user->customer->undeliveredOrders()->count(),
        ];
        
        $data = [
            'page_name' => 'dashboard',
            'analytics' => $analytics,
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

        return $this->customerProducts( $user );
        
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
            'filters' => ['all'],
            'products' => Product::get(),
        ];

        return view('admin.products', compact('data'));
        
    }

    /**
     * Show a customer's products.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    private function customerProducts( $user )
    {
        $customer = $user->customer;

        $products = $customer->deliveredOrders();

        $data = [
            'page_name' => 'products',
            'products' => $products,
        ];

        return view('customer.products', compact('data'));
    }
    
    /**
     * Show the store products (filter).
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function filterProducts(Request $request)
    {
        $user = $request->user();

        // dd($request->all());

        $validatedData = $request->validate([
            'category' => 'sometimes|in:shirts,trousers',
            'gender' => 'sometimes|in:boys,girls',
            'color' => 'sometimes|in:black,white,red',
        ]);

        $conditions = [];

        if (isset($validatedData['category'])) {
            $conditions[] = ['category', $validatedData['category'] ];
        }
        if (isset($validatedData['gender'])) {
            $conditions[] = ['gender', $validatedData['gender'] ];
        }
        if (isset($validatedData['color'])) {
            $conditions[] = ['color', $validatedData['color'] ];
        }

        $products =  Product::where($conditions)->get();

        $filters = [
            'category' => (isset($validatedData['category']))?$validatedData['category']:'',
            'gender' => (isset($validatedData['gender']))?$validatedData['gender']:'',
            'color' => (isset($validatedData['color']))?$validatedData['color']:'',
        ];

        $data = [
            'page_name' => 'products',
            'filters' => ($validatedData)?$validatedData:['all'],
            'products' => $products,
        ];
        
        if( $user->usertype == 'admin'){
            return view('admin.products', compact('data'));
        }

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

        return $this->customerOrders( $user );
    }

    /**
     * Show all orders.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    private function allOrders()
    {
        $orders = Order::all();

        // dd($orders);

        $data = [
            'page_name' => 'orders',
            'orders' => $orders,
        ];
        
        return view('admin.orders', compact('data'));
    }

    /**
     * Show a customer's orders.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    private function customerOrders( $user )
    {

        $customer = $user->customer;

        $orders = $customer->undeliveredOrders();

        $data = [
            'page_name' => 'orders',
            'orders' => $orders,
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
    
    /**
     * Show the customers.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cart(Request $request)
    {
        $user = $request->user();

        $customer = $user->customer;

        $cart = $customer->cart;

        // dd($cart);

        $data = [
            'page_name' => 'cart',
            'cart' => $cart,
        ];

        return view('customer.cart', compact('data'));
    }

    /* 
    *********************************************************************
        POSTS
    
    *********************************************************************
    */

    
    /**
     * add a product to cart.
     *
     * @return;
     */
    public function addToCart(Request $request)
    {
        $user = $request->user();

        $validatedData = $request->validate([
            'product_id' => ['required','numeric'],
        ]);

        $customer = $user->customer;
      
        $product_id = $validatedData['product_id'];
        $quantity = 1;
        
        $product = Product::where('id', $product_id)->first();
        $available_quantity = intval($product->quantity);

        if( $available_quantity < $quantity ){
            return redirect()->back()->with('error', 'Product quantity insufficient!');
        }

        if( $customer->hasInCart($product) ){
            $cart_product = $customer->getFromCart($product);
            $cart_product->increment('quantity');
            
            $new_quantity = $available_quantity - $quantity;
            $product->update(['quantity' => $new_quantity]);

        }else{
            $new_quantity = $available_quantity - $quantity;
            $product->update(['quantity' => $new_quantity]);
    
            $validatedData['customer_id'] = $customer->id;
            $validatedData['quantity'] = $quantity;
    
            $cart = Cart::create($validatedData);
        }
        

        return redirect()->back()->with('success', 'Product added to cart successfully!');
        
    }

    
    /**
     * add a product to cart.
     *
     * @return;
     */
    public function updateCart(Request $request)
    {
        $user = $request->user();

        $validatedData = $request->validate([
            'cart_product_id' => ['required','numeric'],
            'cart_product_quantity' => ['required','numeric'],
        ]);
        
        $cart_product_id = $validatedData['cart_product_id'];
        $cart_product_quantity = $validatedData['cart_product_quantity'];
        
        $cart_product = $user->customer->cart->where('id', $cart_product_id)->first();
        $product = $cart_product->product;
        $available_quantity = intval($product->quantity);
        
        // increment or decrement
        $diff = intval($cart_product_quantity) - intval($cart_product->quantity);
        
        if( $available_quantity < $cart_product_quantity){
            return redirect()->back()->with('error', 'Product quantity insufficient!');
        }
        
        $new_quantity = $available_quantity - $diff;

        // $total_price = intval($cart_product_quantity) * intval($product->$price);
        $cart_product->update(['quantity' => $cart_product_quantity]);
        $product->update(['quantity' => $new_quantity]);

        return redirect()->back()->with('success', 'Product quantity updated successfully!');
        
    }

    /**
     * delete a product from cart.
     *
     * @return;
     */
    public function deleteCart(Request $request)
    {
        $user = $request->user();

        $validatedData = $request->validate([
            'cart_product_id' => ['required','numeric'],
        ]);
        
        $cart_product_id = $validatedData['cart_product_id'];
        
        $cart_product = $user->customer->cart->where('id', $cart_product_id)->first();
        $cart_product_quantity = $cart_product->quantity;
        $product = $cart_product->product;
        $available_quantity = intval($product->quantity);        
        $new_quantity = $available_quantity + $cart_product_quantity;

        $product->update(['quantity' => $new_quantity]);
        $cart_product->delete();

        return redirect()->back()->with('success', 'Product quantity updated successfully!');
        
    }

    /**
     * make order.
     *
     * @return;
     */
    public function checkout(Request $request)
    {
        $customer = $request->user()->customer;
        $cart_products = $customer->cart;  
        $validatedData = [];

        // dd($cart_products);
        foreach( $cart_products as $cart_product ){
            $validatedData['product_id'] = $cart_product->product->id;
            $validatedData['customer_id'] = $customer->id;
            $quantity = intval($cart_product->quantity);
            $paid_price = $quantity * $cart_product->product->price;
            $validatedData['quantity'] = $quantity;
            $validatedData['paid_price'] = $paid_price;

            Order::create($validatedData);
            $cart_product->delete();
            // dd($validatedData);
        }
        
        return redirect( route('orders') )->with('success', 'You have successfully placed an order!');
        
    }



    
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect(route('login'));
    }
}
