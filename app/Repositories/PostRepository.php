<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository
{
    public function getAll($filters)
    {
        $query = Post::query();

        if (isset($filters['title'])) {
            $query->where('title', 'like', '%' . $filters['title'] . '%');
        }

        if (isset($filters['content'])) {
            $query->where('content', 'like', '%' . $filters['content'] . '%');
        }

        if (isset($filters['created_at'])) {
            $query->whereDate('created_at', '=', $filters['created_at']);
        }

        if (isset($filters['updated_at'])) {
            $query->whereDate('updated_at', '=', $filters['updated_at']);
        }

        return $query->with('user')->paginate(10);
    }

    public function findById($id)
    {
        return Post::findOrFail($id);
    }

    public function create(array $data)
    {
        $post = new Post();
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->user_id = auth()->id();
        $post->save();

        return $post;
    }

    public function update(Post $post, array $data)
    {
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->save();

        return $post;
    }

    public function delete(Post $post)
    {
        return $post->delete();
    }
}
