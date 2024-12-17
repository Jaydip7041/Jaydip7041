<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categorys = Category::paginate(3);

        return view('category.index', compact('categorys'));
    }
    public function create()
    {

        return view('category.create');
    }
    public function store(Request $request)
    {
        // Validate the form inputs
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'srname' => 'required|string|max:50',
            'email' => 'required|email',
            'city' => 'required|string|max:50',
            'mobile' => 'required|digits:10',
        ]);

        // Store the data in the database
        Category::create([
            'name' => $validated['name'],
            'srname' => $validated['srname'],
            'email' => $validated['email'],
            'city' => $validated['city'],
            'mobileno' => $validated['mobile'],
        ]);

        // Redirect to the category list page
        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        // This will handle the PUT request and update the category.
        $request->validate([
            'name' => 'required|string|max:255',
            'srname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'city' => 'required|string|max:255',
            'mobileno' => 'required|digits:10',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('category.index')->with('success', 'Category updated successfully!');
    }


    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Category deleted successfully!');
    }
}
