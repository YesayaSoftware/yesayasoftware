<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use App\Models\Category;
use App\Filters\PostFilters;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    /**
     * Create a new PostController instance.
     */
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified'])
            ->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Category $category
     * @param PostFilters $filters
     *
     * @return Response
     */
    public function index()
    {
        $posts = Post::latest()->get();

        return Inertia::render('Posts/Index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if (! auth()->user()->isAdmin()) {
            return redirect()->route('posts.index')
                ->with('errorMessage', 'You do not have permission to perform this action.!');
        }

        $categories = Category::orderBy('name')->get();

        return Inertia::render('Posts/Create', [
            'categories' => $categories, 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);

        $post = Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'thumbnail' => $request->file('thumbnail') ? $request->file('thumbnail')->store('post-thumbnails', 'public') : null,
            'category_id' => request('category_id'),
            'user_id' => auth()->id()
        ]);

        return redirect()->route('posts.index')
            ->with('successMessage', 'Post was successfully created!');
    }


    /**
     * Display the specified resource.
     *
     *
     * @param Category $category
     * @param Post $post
     *
     * @return Response
     */
    public function show(Category $category, Post $post)
    {
        // if (auth()->check()) 
        //     auth()->user()->read($post);

        $post->increment('visits');

        return Inertia::render('Posts/Show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @param Post $post
     * 
     * @return Response
     */
    public function edit(Category $category, Post $post)
    {
        if (! auth()->user()->isAdmin()) {
            return redirect()->route('posts.index')
                ->with('errorMessage', 'You do not have permission to perform this action.!');
        } 

        $categories = Category::get();

        return Inertia::render('Posts/Edit', [
            'category' => $category,
            'categories' => $categories,
            'post' => $post,
        ]);
    }

    /**
     * Update the given post.
     *
     * @param Category $category
     * @param Post $post
     *
     * @return Post
     */
    public function update(Request $request, Category $category, Post $post)
    {
        $this->authorize('update', $post);

        $request->validate([
            'title' => 'required|unique:posts,title,'.$post->id,
            'body' => 'required',
        ]);

        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category_id,
            'thumbnail' => $request->file('thumbnail') ? $request->file('thumbnail')->store('category-thumbnails', 'public') : $category->thumbnail,
        ]);

        return redirect()->route('posts.show', [
            'category' => $category->slug, 
            'post' => $post->slug
        ])->with('successMessage', 'Post was successfully updated!');
    }

    /**
     * Delete the given post.
     *
     * @param Category $category
     * @param Post $post
     *
     * @return mixed
     */
    public function destroy(Category $category, Post $post)
    {
        $this->authorize('update', $post);

        $post->delete();

        return redirect()->route('posts.index')
            ->with('successMessage', 'Post was successfully deleted!');
    }

    /**
     * Fetch all relevant posts.
     *
     *
     * @param Category $category
     * @param PostFilters $filters
     *
     * @return mixed
     */
    protected function getPosts(Category $category, PostFilters $filters)
    {
        $posts = Post::latest()->filter($filters);

        if ($category->exists) 
            $posts->where('category_id', $category->id);

        return $posts->paginate(25);
    }
}
