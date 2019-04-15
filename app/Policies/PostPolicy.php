<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the give user can create new post.
     *
     * @param User $user
     *
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine if the give user can update a post.
     *
     * @param User $user
     *
     * @return bool
     */
    public function edit(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine if the give user can update a post.
     *
     * @param User $user
     *
     * @return bool
     */
    public function delete(User $user): bool
    {
        return $user->isAdmin();
    }
}
