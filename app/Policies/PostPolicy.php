<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;

class PostPolicy
{
    public function managePosts(User $user)
    {
        return $user->isAdmin(); // Assuming you have an isAdmin method in your User model
    }
}
