<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

use App\Models\Customer;
use App\Models\Product;

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
        $data = [
            'page_name' => 'contact'
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

        $data = [
            'page_name' => 'products',
            'filters' => ($validatedData)?$validatedData:['all'],
            'products' => $products,
        ];
        
        return view('shop', compact('data'));    }
}
