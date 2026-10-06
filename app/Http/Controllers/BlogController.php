<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    /**
     * Display blog listing with optional filtering and search.
     */
    public function index(Request $request): View
    {
        $categories = BlogCategory::withCount(['posts' => function ($query) {
            $query->where('is_published', true);
        }])->get();

        $query = BlogPost::with('category')
            ->where('is_published', true);

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->query('category'));
            });
        }

        if ($request->filled('q')) {
            $keyword = '%' . trim($request->query('q')) . '%';
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', $keyword)
                  ->orWhere('excerpt', 'like', $keyword)
                  ->orWhere('content', 'like', $keyword);
            });
        }

        $posts = $query->latest('published_at')->paginate(9)->withQueryString();
        $selectedCategory = $request->query('category');
        $searchKeyword = $request->query('q');

        return view('blog.index', compact('posts', 'categories', 'selectedCategory', 'searchKeyword'));
    }

    /**
     * Display a single blog article.
     */
    public function show(string $slug): View
    {
        $post = BlogPost::with('category')
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        // Increment view counter
        $post->increment('views_count');

        $relatedPosts = BlogPost::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->where('is_published', true)
            ->latest('published_at')
            ->limit(3)
            ->get();

        return view('blog.show', compact('post', 'relatedPosts'));
    }
}
