<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;
use App\User;


class WelcomeController extends Controller
{
    public function welcome()
    {
        return view('welcome')->with('categories',Category::all())->with('tags',Tag::all())->with('posts',Post::all())->with('users',User::all());
    }
}
