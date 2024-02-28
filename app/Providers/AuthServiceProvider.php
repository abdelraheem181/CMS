<?php

namespace App\Providers;

use App\Models\Permission;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

       ///////////// Posts Permission And Roles ------------------------------------ 
        Permission::whereIn('name' , ['add-post','update-post','delete-post'])->get()->map(function($per){
            Gate::define($per->name , function($user , $post) use ($per){
              return $user->hasAllow($per->name) && ($user->id == $post->user_id || $user->isAdmin());
            });
        });
       ///////////// Users Permission And Roles ------------------------------------ 
       Permission::whereIn('name' , ['add-user','update-user','delete-user'])->get()->map(function($per){
             Gate::define($per->name , function($user) use ($per)  {
               return $user->hasAllow($per->name) && $user->isAdmin(); 
           });
       });

         Permission::whereIn('name' , ['add-comment','update-comment','delete-comment'])->get()->map(function($per){
           Gate::define($per->name , function($user , $comment) use ($per)  {
             return $user->hasAllow($per->name) && ($user->id == $comment->user_id || $user->isAdmin()); 
        });
     });
    }
}
