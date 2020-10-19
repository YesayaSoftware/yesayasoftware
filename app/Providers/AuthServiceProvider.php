<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\Team;
use App\Models\User;
use App\Models\Comment;
use App\Policies\PostPolicy;
use App\Policies\TeamPolicy;
use App\Policies\UserPolicy;
use App\Policies\CommentPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
        Post::class => PostPolicy::class,
        Comment::class => CommentPolicy::class,
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
