<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $post = Post::query()->paginate(20);
        return view('admin.post.list',compact('post'));
    }
    public function create(): View
    {
        $categories = Category::select('id', 'name')->get();
        return view('admin.post.create',compact('categories'));
    }
}
