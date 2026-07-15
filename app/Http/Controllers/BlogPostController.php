<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogPostController extends Controller
{
    public function index()
    {
        $posts = BlogPost::orderBy('created_at', 'desc')->get();
        return view('blogs.index', compact('posts'));
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'read_time' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'cover_gradient' => 'required|string|max:255',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        
        // Ensure unique slug
        $count = BlogPost::where('slug', 'like', $validated['slug'] . '%')->count();
        if ($count > 0) {
            $validated['slug'] .= '-' . ($count + 1);
        }

        BlogPost::create($validated);

        return redirect()->route('blogs.index')->with('status', 'Blog post created successfully.');
    }

    public function edit(BlogPost $blog)
    {
        return view('blogs.edit', compact('blog'));
    }

    public function update(Request $request, BlogPost $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'read_time' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'cover_gradient' => 'required|string|max:255',
        ]);

        if ($validated['title'] !== $blog->title) {
            $validated['slug'] = Str::slug($validated['title']);
            $count = BlogPost::where('slug', 'like', $validated['slug'] . '%')->where('id', '!=', $blog->id)->count();
            if ($count > 0) {
                $validated['slug'] .= '-' . ($count + 1);
            }
        }

        $blog->update($validated);

        return redirect()->route('blogs.index')->with('status', 'Blog post updated successfully.');
    }

    public function destroy(BlogPost $blog)
    {
        $blog->delete();
        return redirect()->route('blogs.index')->with('status', 'Blog post deleted successfully.');
    }
}
