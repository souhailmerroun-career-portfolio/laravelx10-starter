<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Repositories\PostRepository;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use App\Events\PostCreated;
use App\Events\PostUpdated;
use App\Events\PostDeleted;

class PostController extends Controller
{
    protected $postRepository;
    protected $postService;

    public function __construct(PostRepository $postRepository, PostService $postService)
    {
        $this->middleware('auth');

        $this->postRepository = $postRepository;
        $this->postService = $postService;
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', Post::class);

        $filters = $request->only(['title', 'content', 'created_at', 'updated_at']);

        $posts = $this->postRepository->getAll($filters);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $this->authorize('create', Post::class);

        return view('posts.create');
    }

    public function store(StorePostRequest $request)
    {
        $this->authorize('create', Post::class);

        $post = $this->postService->createPost($request->validated());

        session()->flash('success', __('messages.post.created'));

        Event::dispatch(new PostCreated($post));

        return redirect()->route('posts.show', $post);
    }

    public function show(Post $post)
    {
        $this->authorize('view', $post);

        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('posts.edit', compact('post'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $this->authorize('update', $post);

        $this->postService->updatePost($post, $request->validated());

        session()->flash('success', __('messages.post.updated'));

        Event::dispatch(new PostUpdated($post));

        return redirect()->route('posts.show', $post);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $this->postService->deletePost($post);

        session()->flash('success', __('messages.post.deleted'));

        Event::dispatch(new PostDeleted($post));

        return redirect()->route('posts.index');
    }
}
