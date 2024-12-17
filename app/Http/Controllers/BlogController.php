<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Display all blogs, including soft-deleted ones
    public function index()
    {
        $blogs = Blog::withTrashed()->get(); // Fetch all blogs (active + trashed)
        return view('blog.index', compact('blogs'));
    }

    // Display trashed blogs only
    public function trashed()
    {
        $blogs = Blog::onlyTrashed()->get(); // Fetch only trashed blogs
        return view('blog.trashed', compact('blogs'));
    }

    // Show the form for creating a blog
    public function create()
    {
        return view('blog.create');
    }

    // Store a new blog
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'mno' => 'required',
            'image' => 'nullable|image',
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('images', 'public') : null;

        Blog::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'mno' => $request->mno,
            'image' => $imagePath,
        ]);

        return redirect()->route('blogs.index')->with('success', 'Blog added successfully!');
    }

    // Show the form for editing a blog
    public function edit(Blog $blog)
    {
        return view('blog.edit', compact('blog'));
    }

    // Update a blog
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'mno' => 'required',
            'image' => 'nullable|image',
        ]);

        $data = $request->only(['name', 'surname', 'mno']);
        // If there is a new image, handle the upload
        if ($request->hasFile('image')) {
            // Store the new image and add to the data array
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        // Update the blog record with the validated data
        $blog->update($data);

        // Redirect back to the blogs index with a success message
        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully!');
    }

    // Soft delete a blog
    public function destroy(Blog $blog)
    {
        $blog->delete(); // Soft delete
        return redirect()->route('blogs.index')->with('success', 'Blog soft deleted successfully!');
    }

    // Restore a soft-deleted blog
    public function restore($id)
    {
        $blog = Blog::onlyTrashed()->findOrFail($id);
        $blog->restore();

        return redirect()->route('blogs.index')->with('success', 'Blog restored successfully!');
    }

    // Permanently delete a blog
    public function forceDelete($id)
    {
        $blog = Blog::onlyTrashed()->findOrFail($id);
        $blog->forceDelete();

        return redirect()->route('blogs.index')->with('success', 'Blog permanently deleted!');
    }

    // Search blogs
    public function search(Request $request)
    {
        $searchTerm = $request->search;
        $blogs = Blog::where('name', 'like', '%' . $searchTerm . '%')
            ->orWhere('surname', 'like', '%' . $searchTerm . '%')
            ->orWhere('mno', 'like', '%' . $searchTerm . '%')
            ->get();

        return view('blog.index', compact('blogs'));
    }

    // Show a single blog
    public function show($id)
    {
        $blog = Blog::withTrashed()->findOrFail($id);
        return view('blog.show', compact('blog'));
    }
}
