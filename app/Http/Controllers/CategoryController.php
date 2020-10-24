<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Create a new CategoryController instance.
     */
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified'])->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = Category::get();

        return Inertia::render('Categories/Index', [
            'categories' => $categories
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
            return redirect()->route('categories.index')
                ->with('errorMessage', 'You do not have permission to perform this action.!');
        }

        return Inertia::render('Categories/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $category = Category::create([
            'name' => request('name'),
            'description' => request('description'),
            'thumbnail' => $request->file('thumbnail') ? $request->file('thumbnail')->store('category-thumbnails', 'public') : null,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('categories.index')
            ->with('successMessage', 'Category was successfully created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  Category $category
     * @return Response
     */
    public function show(Category $category)
    {
        $category = $category->load('posts');
        
        return Inertia::render('Categories/Show', [
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category $category
     * @return Response
     */
    public function edit(Category $category)
    {
        if (! auth()->user()->isAdmin()) {
            return redirect()->route('categories.index')
                ->with('errorMessage', 'You do not have permission to perform this action.!');
        } 

        return Inertia::render('Categories/Edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Category $category
     * @return Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,'.$category->id,
            'description' => 'required',
        ]);

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'thumbnail' => $request->file('thumbnail') ? $request->file('thumbnail')->store('category-thumbnails', 'public') : $category->thumbnail,
        ]);

        return redirect()->route('categories.show', $category->slug)
            ->with('successMessage', 'Category was successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Category  $category
     * @return Response
     */
    public function destroy(Category $category)
    {
         $category->delete();

        return redirect()->route('categories.index')
            ->with('successMessage', 'Category was successfully deleted!');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  Category  $category
     * @return Response
     */
    public function deleteThumbnail(Category $category)
    {
        Storage::delete($category->thumbnail);
        
        $category->update([
            'thumbnail' => null,
        ]);

        return redirect()->back()
            ->with('successMessage', 'Category thumbnail was successfully deleted!');
    }
}
