<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::query()->paginate(20);
        return view('admin.post.list',compact('posts'));
    }
    public function create(): View
    {
        $categories = Category::select('id', 'name')->get();
        return view('admin.post.create',compact('categories'));
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate(Post::rules(),Post::message());
        $slug = Str::slug($request->name);
        $checkSlug = Post::where('slug',$slug)->first();
        if ($checkSlug){
            $slug = $checkSlug->slug . Str::random(2);
        }
        if($request->hasFile('image')){
            $file = $request->file('image');
            $nameFile = $file->getClientOriginalName();

            $extension = strtolower($file->getClientOriginalExtension());
            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            if (in_array($extension, $allowedExtensions)) {
                $image = Str::random(5) ."_". $nameFile;
                $destinationPath = "image/post";
                while (file_exists($destinationPath."/". $image)){
                    $image = Str::random(5) ."_". $nameFile;
                }
                $file->move($destinationPath,$image);
            }
        }
        Post::create([
            'title' => $request->title,
            'description'=> $request->description,
            'content'=> $request->txtContent,
            'image' => $image,
            'view_count' => 0,
            'user_id' => 1, //Auth::id()
            'new_post' => $request->new_post ? 1 : 0,
            'slug' => $slug,
            'category_id' => $request->category_id,
            'highlight_post' => $request->highlight_post ? 1 : 0,
        ]);
        return redirect()->route('admin.post.index')->with('success', 'Post created successfully');
    }
    public function edit($id): View
    {
        $post = Post::find($id);
        $categories = Category::select('id', 'name')->get();
        return view('admin.post.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate(Post::rules($id),Post::message($id));
        $slug = Str::slug($request->name);
        $checkSlug = Post::where('slug',$slug)->first();
        if ($checkSlug){
            $slug = $checkSlug->slug . Str::random(2);
        }
        if($request->hasFile('image')){
            $file = $request->file('image');
            $nameFile = $file->getClientOriginalName();

            $extension = strtolower($file->getClientOriginalExtension());
            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            if (in_array($extension, $allowedExtensions)) {
                $image = Str::random(5) ."_". $nameFile;
                $destinationPath = "image/post";
                while (file_exists($destinationPath."/". $image)){
                    $image = Str::random(5) ."_". $nameFile;
                }
                $file->move($destinationPath,$image);
            }
        }
        $post = Post::find($id);
        $post->update([
            'title' => $request->title,
            'description'=> $request->description,
            'content'=> $request->txtContent,
            'image' => $image ?? $post->image,
            'new_post' => $request->new_post ? 1 : 0,
            'slug' => $slug,
            'category_id' => $request->category_id,
            'highlight_post' => $request->highlight_post ? 1 : 0,
        ]);
        return redirect()->route('admin.post.edit',$id)->with('success', 'Updated successfully');
    }
    public function delete($id): RedirectResponse
    {
//        Category::where('id',$id)->delete();
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('admin.category.index')->with('success', 'Post deleted successfully');
    }
}
