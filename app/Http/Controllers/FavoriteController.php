<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FavoriteController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    /**
     * Store a new favorite in the database.
     *
     * @param Post $post
     * @return Response
     */
    public function store(Post $post)
    {
        $post->favorite();

        return redirect()->back()
            ->with('successMessage', 'You liked the post.!'); 
    }

    /**
     * Delete the favorite.
     *
     * @param Post $post
     * @return Response
     */
    public function destroy(Post $post)
    {
        $post->unfavorite();

        return redirect()->back()
            ->with('successMessage', 'You unliked the post.!'); 
    }
}
