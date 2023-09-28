<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Product;


class ProductController extends Controller
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
 
}
