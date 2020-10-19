<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CommentController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    /**
     * Persist a new comment.
     *
     * @param Category $category
     * @param Post $post
     *
     * @return Response
     */
    public function store(Post $post)
    {
        $post->addComment([
            'body' => request('body'),
            'user_id' => auth()->id()
        ])->load('user');

        return redirect()->back()
            ->with('successMessage', 'Comment added successfully.!');
    }

    /**
     * Update an existing reply.
     *
     * @param Comment $comment
     * @throws AuthorizationException
     */
    public function update(Comment $comment)
    {
        $this->authorize('update', $comment);

        $comment->update(
            request()->validate(['body' => 'required']) //|spamfree
        );

        return redirect()->back()
            ->with('successMessage', 'Comment updated successfully.!');
    }

    /**
     * Delete the given comment.
     *
     * @param  Comment $comment
     *
     * @return Response
     * @throws AuthorizationException
     */
    public function destroy(Comment $comment)
    {
        $this->authorize('update', $comment);

        $comment->delete();

        return redirect()->back()
            ->with('successMessage', 'Comment delete successfully.!');
    }
}
