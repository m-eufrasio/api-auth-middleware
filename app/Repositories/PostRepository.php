<?php
namespace App\Repositories;

use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;

class PostRepository implements PostRepositoryInterface
{
    protected $model;

    public function __construct(Post $post)
    {
        $this->model = $post;
    }

    /**
     * Capture all registers
     */
    public function all(): mixed
    {
        return $this->model->select('*')->get();
    }

    /**
     * Fetch a specified resource by paramater
     */
    public function findBy($id): mixed
    {
        return $this->model->where('user_id', $id)->first();
    }

    /**
     * Fetch a specified resource by id
     */
    public function find($id): mixed
    {
        return $this->model->find($id);
    }

    /**
     * Insert one resource
     */
    public function create($data): mixed
    {
        return $this->model->create($data);
    }

    /**
     * Update one resource
     */
    public function update($data, $id): mixed
    {
        return $this->model->find($id)->update($data);
    }

    /**
     * Delete one resource
     */
    public function delete($postId): mixed
    {
        return $this->model->findOrFail($postId)->delete($postId);
    }
}