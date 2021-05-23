<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\Comment;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param Post $post
     *
     * @return Response
     */
    public function commentByPost(Post $post): Response
    {
        $comments = Comment::where('post_id', $post->id)->get();

        return response($comments, Response::HTTP_ACCEPTED);
    }
}
