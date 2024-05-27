<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    //this method will show products page
    public function index()
    {
        $show = Product::all(); // Fetch all products from the database
        return view('products.list', ['show' => $show]); // Return the correct view with data
    }


    //this method will show create product page
    public function create()
    {

        return view('products.create');
    }

    //this method will store a product in db
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'sku' => 'required|min:3',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);


        $store = new product();
        $store->name = $request->input('name');
        $store->sku = $request->input('sku');
        $store->price = $request->input('price');
        $store->description = $request->input('description');




        // Check if an image is uploaded
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/products'), $imageName);
            $store->image = $imageName;
        }
        $store->save();
        return redirect()->route('products.index')->with('message', 'product added successfully');
    }

    //this method will show edit product page
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products/update', compact('product'));
    }

    //this method will update a product
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|max:50',
            'sku' => 'required|min:3',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);


        $update = Product::find($id);
        $update->name = $request->input('name');
        $update->sku = $request->input('sku');
        $update->price = $request->input('price');
        $update->description = $request->input('description');




        // Check if an image is uploaded
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/products'), $imageName);
            $update->image = $imageName;
        }
        $update->save();
        return redirect()->route('products.index')->with('message', 'product updated successfully');
    }

    //this method will delete a product 
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Product not found');
        }

        $product->delete();

        return redirect()->route('products.index')->with('message', 'Product deleted successfully');
    }
}
