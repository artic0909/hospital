<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of blog articles.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $status = $request->query('status');
        $category = $request->query('category');

        $query = Blog::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('author_name', 'like', "%{$search}%")
                  ->orWhere('publisher_or_source', 'like', "%{$search}%");
            });
        }

        if ($status && in_array($status, ['published', 'draft'])) {
            $query->where('status', $status);
        }

        if ($category) {
            $query->where('category', $category);
        }

        $blogs = $query->orderBy('published_at', 'desc')->orderBy('id', 'desc')->paginate(10)->withQueryString();

        $stats = [
            'total' => Blog::count(),
            'published' => Blog::where('status', 'published')->count(),
            'draft' => Blog::where('status', 'draft')->count(),
            'featured' => Blog::where('is_featured', true)->count(),
        ];

        $categories = Blog::whereNotNull('category')->distinct()->pluck('category');

        return view('admin.blog.index', compact('blogs', 'stats', 'search', 'status', 'category', 'categories'));
    }

    /**
     * Show the form for creating a new blog article.
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created blog article in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blogs,slug',
            'category' => 'nullable|string|max:100',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'author_name' => 'nullable|string|max:150',
            'publisher_or_source' => 'nullable|string|max:150',
            'reading_time' => 'nullable|string|max:50',
            'status' => 'required|in:published,draft',
            'is_featured' => 'nullable|boolean',
            'published_at' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
        ]);

        $validated['slug'] = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']);
        $validated['is_featured'] = $request->has('is_featured');
        $validated['author_name'] = $validated['author_name'] ?? 'HealGoFly Team';
        $validated['published_at'] = $validated['published_at'] ?? ($validated['status'] === 'published' ? now() : null);

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('uploads/blogs');

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $validated['image'] = 'uploads/blogs/' . $filename;
        }

        Blog::create($validated);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog article created successfully.');
    }

    /**
     * Show the form for editing the specified blog article.
     */
    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified blog article in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blogs,slug,' . $blog->id,
            'category' => 'nullable|string|max:100',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'author_name' => 'nullable|string|max:150',
            'publisher_or_source' => 'nullable|string|max:150',
            'reading_time' => 'nullable|string|max:50',
            'status' => 'required|in:published,draft',
            'is_featured' => 'nullable|boolean',
            'published_at' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
        ]);

        $validated['slug'] = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']);
        $validated['is_featured'] = $request->has('is_featured');
        
        if ($validated['status'] === 'published' && empty($blog->published_at)) {
            $validated['published_at'] = now();
        }

        if ($request->hasFile('image')) {
            if ($blog->image && File::exists(public_path($blog->image)) && str_starts_with($blog->image, 'uploads/')) {
                File::delete(public_path($blog->image));
            }

            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('uploads/blogs');

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $validated['image'] = 'uploads/blogs/' . $filename;
        }

        $blog->update($validated);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog article updated successfully.');
    }

    /**
     * Remove the specified blog article from storage.
     */
    public function destroy(Blog $blog)
    {
        if ($blog->image && File::exists(public_path($blog->image)) && str_starts_with($blog->image, 'uploads/')) {
            File::delete(public_path($blog->image));
        }

        $blog->delete();

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog article deleted successfully.');
    }

    /**
     * Toggle status between published and draft.
     */
    public function toggleStatus(Blog $blog)
    {
        $newStatus = $blog->status === 'published' ? 'draft' : 'published';
        $updateData = ['status' => $newStatus];
        if ($newStatus === 'published' && !$blog->published_at) {
            $updateData['published_at'] = now();
        }

        $blog->update($updateData);

        return back()->with('success', 'Blog status changed to ' . ucfirst($newStatus) . '.');
    }
}

