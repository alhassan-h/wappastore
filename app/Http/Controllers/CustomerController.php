<?php

namespace App\Http\Controllers;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

class CustomerController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');

        $this->middleware(function (Request $request, Closure $next) {

            if( !$request->user()->isAdmin() ){
                return $next($request);
            }

            return redirect(route('dashboard'));
    
        });
    }

       /**
     * Show the customer profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile(Request $request)
    {
        $user = $request->user();

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
     * Get the customer edit profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getEditProfile(Request $request)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required|',
        ]);

        $customer_id = $validatedData['customer_id'];

        $redirect = route('profile');

        return redirect( "$redirect/edit/$customer_id");
    }
     
    /**
     * Show the customer edit profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editProfile($id)
    {
        
        // $customer_id = $validatedData['customer_id'];
        // $customer = Customer::find($customer_id);
        $data = [
            'page_name' => 'profile',
            'customer' => DB::table('users')
                ->join('customers', 'users.id', 'customers.user_id')
                ->where('customers.id', $id)
                ->get(),
        ];

        return view('customer.profile_edit', compact('data'));
    }
    
     
    /**
     * Show the customer edit profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateProfile(Request $request)
    {
        $user = $request->user();
        $customer = $user->customer;
        
        $validatedData =  $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($customer->user)],
            'phone' => ['required', 'string', 'size:11', Rule::unique('customers')->ignore($customer)],
            'address' => ['required', 'string', 'max:255'],
            // 'profile' => ['sometimes', 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'],
        ]);

        if( isset($request->password) ){
            $validatedData['password'] = Hash::make($request->validate(
                ['password' => ['string', 'min:8']])['password']
            );
        }

        $user->update($validatedData);
        $customer->update($validatedData);

        return redirect()->back()->with('success', 'Profile updated successfully!');

    }


    public function products(Request $request)
    {
        $customer = $request->user()->customer;

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

        return view('customer.products', compact('data'));
        
    }

    /**
     * Show the customers' orders.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function orders(Request $request)
    {
        $customer = $request->user()->customer;

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
    public function cart(Request $request)
    {
        $user = $request->user();

        $customer = $user->customer;

        
        $cart = ($customer->cart)?$customer->cart:[];
        
        // dd($customer->cart);
        $data = [
            'page_name' => 'cart',
            'cart' => $cart,
        ];

        return view('customer.cart', compact('data'));
    }

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
        
        $product = Product::find($product_id);
        $available_quantity = intval($product->quantity);

        if( $available_quantity < $quantity ){
            return redirect()->back()->with('error', 'Product quantity insufficient!');
        }

        if( $customer->hasInCart($product) ){
            return redirect()->back()->with('warning', 'Product already in cart!');
            // $cart_product = $customer->getFromCart($product);
            // $cart_product->increment('quantity');
            // $new_quantity = $available_quantity - $quantity;
            // $product->update(['quantity' => $new_quantity]);

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

        return redirect()->back()->with('success', 'Product removed from cart successfully!');
        
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

        foreach( $cart_products as $cart_product ){
            $validatedData['product_id'] = $cart_product->product->id;
            $validatedData['customer_id'] = $customer->id;
            $quantity = intval($cart_product->quantity);
            $paid_price = $quantity * $cart_product->product->price;
            $validatedData['quantity'] = $quantity;
            $validatedData['paid_price'] = $paid_price;

            Order::create($validatedData);
            $cart_product->delete();

        }
        
        return redirect( route('orders') )->with('success', 'You have successfully placed an order!');
        
    }
    
}
