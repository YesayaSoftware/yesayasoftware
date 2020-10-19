<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SubscriptionController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    /**
     * Store a new category subscription.
     *
     * @param Category $category
     * @return Response
     */
    public function store(Category $category)
    {
        $category->subscribe();

        return redirect()->back()
            ->with('successMessage', 'You subscribed to the `{$category.name}` category!'); 
    }

    /**
     * Delete an existing category subscription.
     *
     * @param Category $category
     * @return Response
     */
    public function destroy(Category $category)
    {
        $category->unsubscribe();

        return redirect()->back()
            ->with('successMessage', 'You unsubscribed to the `{$category.name}` category!');
    }
}
