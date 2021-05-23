<?php


namespace App\Http\Controllers\Api;

use App\Filters\Thumbnail;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

const PAGE_SIZE = 30;

class PostController extends Controller
{
    /**
     * Create a new PostController instance.
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
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request): Response
    {
        $posts = $this->getPosts($request);

        return response([
            "posts" => $posts
        ], Response::HTTP_ACCEPTED);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     * @throws AuthorizationException
     */
    public function store(Request $request): Response
    {
        $this->authorize('admin', auth()->user());

        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);

        $post = Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'thumbnail' => $request->file('thumbnail') ? $this->thumbnail->storeThumbnail($request, 'posts') : null,
            'category_id' => request('category_id'),
            'user_id' => auth()->id()
        ]);

        return response($post, Response::HTTP_ACCEPTED);
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     *
     * @return Response
     */
    public function show(Post $post): Response
    {
        $post->increment('visits');

        return response($post, Response::HTTP_ACCEPTED);
    }

    /**
     * Update the given post.
     *
     * @param Request $request
     * @param Post $post
     *
     * @return Application|ResponseFactory|\Illuminate\Http\Response
     * @throws AuthorizationException
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('admin', auth()->user());

        $request->validate([
            'title' => 'required|unique:posts,title,'.$post->id,
            'body' => 'required',
        ]);

        if ($post->thumbnail)
            !$request->file('thumbnail') ?: $this->thumbnail->deleteThumbnail($post->thumbnail);

        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category_id,
            'thumbnail' => $request->file('thumbnail') ? $this->thumbnail->storeThumbnail($request, 'posts') : $post->thumbnail,
        ]);

        return response($post, Response::HTTP_ACCEPTED);
    }

    /**
     * Delete the given post.
     *
     * @param Post $post
     *
     * @return mixed
     * @throws AuthorizationException
     */
    public function destroy(Post $post)
    {
        $this->authorize('admin', auth()->user());

        $this->deleteThumbnail($post);

        $post->delete();

        return response(
            'Post was successfully deleted!',
            Response::HTTP_ACCEPTED
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @throws AuthorizationException
     */
    public function removeThumbnail(Post $post)
    {
        $this->authorize('admin', auth()->user());

        $this->deleteThumbnail($post);

        $post->update([
            'thumbnail' => null
        ]);

        return response(
            'Post thumbnail was successfully deleted!',
            Response::HTTP_ACCEPTED
        );
    }

    /**
     * @param Post $post
     */
    public function deleteThumbnail(Post $post): void
    {
        if ($post->thumbnail)
            $this->thumbnail->deleteThumbnail($post->thumbnail);
    }

    /**
     * Fetch all relevant threads.
     *
     * @param Request $request
     * @return mixed
     */
    protected function getPosts(Request $request)
    {
        $posts = Post::without('comments')->latest();

        $category = Category::where('slug', $request["category"])->first();

        if ($category && $category->exists)
            $posts->where('category_id', $category->id);

        return $posts->paginate(PAGE_SIZE);
    }
}
