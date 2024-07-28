<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Post $post): Response
    {
        return $user->id === $post->select('user_id')->first()->user_id
            ? Response::allow()
            : Response::denyWithStatus(403, 'You do not own this post.');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Post $post): Response
    {
        $userId = $post->select('user_id')
            ->where('user_id', $user->id)
            ->first()->user_id;

        return $user->id === $userId
            ? Response::allow()
            : Response::denyWithStatus(403, 'You do not own this post.');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): Response
    {
        $userId = $post->select('user_id')
            ->where('user_id', $user->id)
            ->first()->user_id;

        return $user->id === $userId
            ? Response::allow()
            : Response::denyWithStatus(403, 'You do not own this post.');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Post $post)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Post $post): Response
    {
        $userId = $post->select('user_id')
            ->where('user_id', $user->id)
            ->first()->user_id;

        return $user->id === $userId
            ? Response::allow()
            : Response::denyWithStatus(403, 'You do not own this post.');
    }
}
