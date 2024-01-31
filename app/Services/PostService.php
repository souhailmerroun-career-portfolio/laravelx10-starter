<?php

namespace App\Services;

use App\Repositories\PostRepository;
use App\Models\Post;

class PostService
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getAllPosts()
    {
        return $this->postRepository->getAll();
    }

    public function getPostById($id)
    {
        return $this->postRepository->findById($id);
    }

    public function createPost(array $data)
    {
        // Additional business logic can be added here
        return $this->postRepository->create($data);
    }

    public function updatePost(Post $post, array $data)
    {
        // Additional business logic can be added here
        return $this->postRepository->update($post, $data);
    }

    public function deletePost(Post $post)
    {
        // Additional business logic can be added here
        return $this->postRepository->delete($post);
    }
}
