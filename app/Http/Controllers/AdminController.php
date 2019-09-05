<?php

namespace App\Http\Controllers;

use App\Category;
use App\Reminder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Comment;
use App\User;
use App\Tag;

class AdminController extends Controller
{
    public function index()
    {
        $numofPosts = Post::count();
        $numofComments = Comment::count();
        $numofUsers = User::count();
        $numOfCategories = Category::count();
        $reminders = Reminder::latest()->paginate(5);
        return view('admin.index', compact('numofPosts', 'numofComments', 'numofUsers', 'numOfCategories', 'reminders'));
    }

    public function posts(){
        $posts = Post::get()->all();
        return view('admin.posts', compact('posts'));
    }
    public function users(){
        $users = User::get()->all();
        return view('admin.users', compact('users'));
    }

    public function addpost(){
        $categories = Category::get()->all();
        $tags = Tag::get()->all();
        return view('admin.addpost', compact('categories', 'tags'));
    }

    public function addtag(){
        $tags = Tag::get()->all();
        return view('admin.addtag', compact('tags'));
    }

    public function addcategory(){
        $categories = Category::get()->all();
        return view('admin.addcategory', compact('categories'));
    }

    public function theme(){
        return view('admin.theme');
    }
    public function slider(){
        return view('admin.slider');
    }
}
