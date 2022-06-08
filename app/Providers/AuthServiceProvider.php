<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Policies\CommentPolicy;
use App\Policies\PostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
        //     Comment::class => CommentPolicy::class
        // \App\Models\Post::class => \App\Policies\PostPolicy::class,
        // Post::class => PostPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('admin',function(User $user){
            return $user->username == 'admin';
        });
        Gate::define('comment',function( $user, $comment){
            return $user->id == $comment->user_id;
        });

        Gate::resource('post', PostPolicy::class);
        Gate::define('post.create', 'App\Policies\PostPolicy@create');
        Gate::define('post.draft', PostPolicy::class . '@draft');
      
    }
}
