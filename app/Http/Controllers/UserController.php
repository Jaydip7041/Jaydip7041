<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class UserController extends Controller
{
    // Display list of products
    public function index()
    {
        $products = Product::all();
        return view('index', ['products' => $products]);
    }

    // Show the form to create a new product
    public function create()
    {
        return view('add');
    }

    // Store the new product in the database
    public function store(Request $request)
    {
        $request->validate([
            'FirstName' => 'required|string|max:255',
            'LastName' => 'required|string|max:255',
            'Email' => 'required|email|unique:products',
            'MobileNo' => 'required|string|max:10',
            'Gender' => 'required'
        ]);

        $data = $request->only(['FirstName', 'LastName', 'Email', 'MobileNo', 'Gender']);
        Product::create($data);

        return redirect()->route('index')->with('success', 'Product added successfully');
    }

    // Show the form to edit an existing product
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('update', compact('product'));
    }

    // Update the product in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'FirstName' => 'required|string|max:255',
            'LastName' => 'required|string|max:255',
            'Email' => "required|email|unique:products,Email,{$id}",
            'MobileNo' => 'required|string|max:10',
            'Gender' => 'required'
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->only(['FirstName', 'LastName', 'Email', 'MobileNo', 'Gender']));

        return redirect()->route('index')->with('success', 'Product updated successfully');
    }

    // Delete the product from the database
    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('index')->with('success', 'Product deleted successfully');
    }
}