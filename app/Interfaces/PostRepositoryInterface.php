<?php
namespace App\Interfaces;

interface PostRepositoryInterface
{
    public function all(): mixed;
    public function findBy($id): mixed;
    public function find($id): mixed;
    public function create($data): mixed;
    public function update($data, $id): mixed;
    public function delete($postId): mixed;
}