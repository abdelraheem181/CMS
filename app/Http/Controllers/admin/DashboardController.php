<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function find()
    { /*
        $post_nu     = Post::count();
        $comment_nu  = Comment::count();
        $user_nu     = User::count();
        $category_nu = Category::count();
        return view('admin.find' , compact('post_nu' , 'comment_nu' , 'user_nu' , 'category_nu'));
        */
         //--------- Anther way ------------
        return view('admin.find')
                     ->with('post_nu', Post::count())
                     ->with('comment_nu', Comment::count())
                     ->with('user_nu' , User::count())
                     ->with('category_nu' , Category::count());
    }
}
