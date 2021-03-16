<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    
    public function dashboard(){

        $blogCount = Post::where('cat_id','=','1')->count(); // cat_id is 1 for Blog posts
        $newsCount = Post::where('cat_id','=','2')->count();// cat_id is 2 for News posts
        $caseCount = Post::where('cat_id','=','3')->count();// cat_id is 3 for Case Studies posts

        return view('backend.dashboard',['blogCount' => $blogCount, 'newsCount' => $newsCount, 'caseCount' => $caseCount]);
    }
}
