<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

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
        $page_name = 'home';
        return view('home', compact('page_name'));
    }

    /**
     * Show the application about page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function about()
    {
        $page_name = 'about';
        return view('about', compact('page_name'));
    }

    /**
     * Show the application contact page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact()
    {
        $page_name = 'contact';
        return view('contact', compact('page_name'));    
    }

    /**
     * Show the application shop page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function shop()
    {
        $page_name = 'shop';
        return view('shop', compact('page_name'));    }
}
