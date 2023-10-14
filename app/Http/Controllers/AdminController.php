<?php

namespace App\Http\Controllers;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

class AdminController extends Controller
{
       
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function (Request $request, Closure $next) {

            if( $request->user()->isAdmin() ){
                return $next($request);
            }

            return redirect(route('dashboard'));
    
        });
    }
     
    /**
     * Show the store products.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function products(Request $request)
    {
        $user = $request->user();

        $data = [
            'page_name' => 'products',
            'filters' => ['all'],
            'products' => Product::get(),
        ];
    
        return view('admin.products', compact('data'));
        
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

        return view('admin.products', compact('data'));
        
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
     * Save new product.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function saveProduct(Request $request)
    {
        
        $validatedData = $request->validate([
         'name' => 'required',
         'category' => 'required|in:shirts,trousers',
         'gender' => 'required|in:boys,girls',
         'color' => 'required|in:black,white,red',
         'quantity' => 'required|gt:0|lte:15',
         'price' => 'required',
         'product-image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        
        $validatedData['image'] = $validatedData['product-image'];
        
        $fileName = time() . '.' . $validatedData['image']->extension();
        $validatedData['image']->storeAs('public/images', $fileName);
        $validatedData['image'] = $fileName;

        $product = Product::create($validatedData);
 
        return redirect()->back()->with('success', 'Product added successfully!');
 
    }
 

    /**
     * Get edit product page.
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getEditProduct(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|numeric',
        ]);
           
        $product_id = $validatedData['product_id'];
        
        $redirect = route('products');
 
        return redirect( "$redirect/edit/$product_id");
 
    }
 

    /**
     * Get edit product page.
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editProduct($id)
    {
        
        $product_id = $id;

        $product = Product::find($product_id);

        // dd($product);

        $data = [
            'page_name' => 'products',
            'product' => $product,
        ];
 
        return view('admin.product_edit', compact('data'));
 
    }

    
    /**
     * Update a product.
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateProduct(Request $request)
    {
        
        $validatedData = $request->validate([
         'product_id' => 'required',
         'name' => 'required',
         'category' => 'required|in:shirts,trousers',
         'gender' => 'required|in:boys,girls',
         'color' => 'required|in:black,white,red',
         'quantity' => 'required|gt:0|lte:15',
         'price' => 'required',
         'product-image' => 'sometimes|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        // dd($validatedData);
        $product_id = $validatedData['product_id'];

        // if changing the product's image, save it.
        if(isset($validatedData['product-image'])){
            $validatedData['image'] = $validatedData['product-image'];
            $fileName = time() . '.' . $validatedData['image']->extension();
            $validatedData['image']->storeAs('public/images', $fileName);
            $validatedData['image'] = $fileName;
        }
        
        $product = Product::find($product_id);
        $update = $product->update($validatedData);
 
        return redirect()->back()->with('success', 'Product Updated successfully!');
 
    }
 
 
    /**
     * Delete a product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function removeProduct(Request $request)
    {

        $validatedData = $request->validate([
            'product_id' => ['required','numeric'],
        ]);
        
        $product_id = $validatedData['product_id'];
        $product = Product::find($product_id);
        $product->delete();

        return redirect()->back()->with('success', 'Product removed from shop successfully!');
    }
 
    /**
     * Show the customers' orders.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function orders(Request $request)
    {
        $delivered_orders = Order::where('status', 'delivered')->get();
        $undelivered_orders = Order::where('status', 'undelivered')->get();

        $data = [
            'page_name' => 'orders',
            'delivered_orders' => $delivered_orders,
            'undelivered_orders' => $undelivered_orders,
        ];
        
        return view('admin.orders', compact('data'));
    }
    
    /**
     * Show the customers' orders.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function validateOrders(Request $request)
    {
        $validatedData = $request->validate([
            'order_id' => 'required|numeric',
           ]);
           
            $order_id = $validatedData['order_id'];
            $order = Order::find($order_id);
            $order->validate();

           return redirect()->back()->with('success', 'Product marked as delivered successfully!');
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
    public function customer($id)
    {

        $customer = Customer::find($id);

        $data = [
            'page_name' => 'customers',
            'customer' => DB::table('users')
                ->join('customers', 'users.id', 'customers.user_id')
                ->where('customers.id', $customer->id)
                ->get(),
        ];

        return view('admin.customer', compact('data'));
    }
    


}
