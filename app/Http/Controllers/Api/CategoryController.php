<?php

namespace App\Http\Controllers\Api;

use App\Filters\Thumbnail;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    private Thumbnail $thumbnail;

    /**
     * Create a new CategoryController instance.
     */
    public function __construct()
    {
        $this->middleware(['auth:api', 'verified'])
            ->except(['index', 'show']);

        $this->thumbnail = new Thumbnail();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $categories = Category::latest()->get();

        return response($categories, Response::HTTP_ACCEPTED);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request): Response
    {
//        $this->authorize('admin', auth()->user());

        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => auth()->id()
        ]);

        return response($category, Response::HTTP_ACCEPTED);
    }


    /**
     * Display the specified resource.
     *
     * @param Category $category
     *
     * @return Response
     */
    public function show(Category $category): Response
    {
        return response($category, Response::HTTP_ACCEPTED);
    }

    /**
     * Update the given category.
     *
     * @param Request $request
     * @param Category $category
     *
     * @return Response
     */
    public function update(Request $request, Category $category): Response
    {
//        $this->authorize('admin', auth()->user());

        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
            'description' => 'required',
        ]);

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response($category, Response::HTTP_ACCEPTED);
    }

    /**
     * Delete the given category.
     *
     * @param Category $category
     *
     * @return mixed
     * @throws Exception
     */
    public function destroy(Category $category)
    {
//        $this->authorize('admin', auth()->user());

        $this->thumbnail->deleteThumbnail($category->thumbnail);

        $category->delete();

        return response(1, Response::HTTP_ACCEPTED);
    }
}
