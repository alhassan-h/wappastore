<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

use App\Models\Customer;
use App\Models\Product;
use App\Models\ContactMessage;
use App\Rules\NameValidation;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    /**
     * Show the application homepage.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'page_name' => 'home'
        ];
        return view('home', compact('data'));
    }

    /**
     * Show login.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function login()
    {
        $data = [
            'page_name' => 'login'
        ];
        return view('auth.login', compact('data'));
    }

    /**
     * Show register.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function register()
    {
        $data = [
            'page_name' => 'rgister'
        ];
        return view('auth.register', compact('data'));
    }

    /**
     * Show the application about page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function about()
    {
        
        $data = [
            'page_name' => 'about'
        ];
        return view('about', compact('data'));
    }

    /**
     * Show the application contact page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact()
    {
        $messages = ContactMessage::get();
        
        $data = [
            'page_name' => 'contact',
            'messages' => ($messages)?$messages:[],
        ];
        return view('contact', compact('data'));    
    }

    /**
     * Show the application shop page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function shop(Request $request)
    {

        $products =  Product::get();

        $data = [
            'page_name' => 'shop',
            'filters' => ['all'],
            'products' => $products,
        ];
        
        return view('shop', compact('data'));    
    }

    /**
     * Filter the products in the application shop page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function filterShop(Request $request)
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

        return view('shop', compact('data'));    
    }

    /**
     * Show the application shop page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function saveMessage(Request $request)
    {

        $validatedData = $request->validate([
            'name' => ['required', new NameValidation],
            'email' => 'required|email:rfc',
            'subject' => 'sometimes',
            'message' => 'required',
        ]);

        $validatedData['sender_name'] = $validatedData['name'];
        $validatedData['sender_email'] = $validatedData['email'];

        // dd($validatedData);
        $contactMessage = ContactMessage::create($validatedData);
       
        return redirect()->back()->with('success', 'Message sent successfully!');

    }
}
