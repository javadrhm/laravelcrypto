<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Post;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Define gates for authorization
        Gate::define('manage-posts', function (User $user) {
            return $user->isAdmin();
        });

        // More specific gate for post management
        Gate::define('create-post', function (User $user) {
            return $user->isAdmin();
        });

        Gate::define('update-post', function (User $user, Post $post) {
            return $user->isAdmin() || $user->id === $post->user_id;
        });

        Gate::define('delete-post', function (User $user, Post $post) {
            return $user->isAdmin() || $user->id === $post->user_id;
        });
    }
}
