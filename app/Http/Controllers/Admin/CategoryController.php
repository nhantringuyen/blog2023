<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        //get category
//        $categories = Category::query()->paginate(5);
        $categories = Category::all();
        return view('admin.category.list',compact('categories'));
    }
    public function create(): View
    {
        $categories = Category::select('id', 'name')->get();
        return view('admin.category.create',compact('categories'));
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate(Category::rules(),Category::message());
        $slug = Str::slug($request->name);
//        $checkSlug = Category::where('slug',$slug)->first();
//        if ($checkSlug){
//            $slug = $checkSlug->slug . Str::random(2);
//        }
        Category::create([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
            'parent' => $request->parent,
            'order' => $request->txtOrder,
        ]);
        return redirect()->route('admin.category.index')->with('success', 'Category created successfully');
    }
    public function edit($id): View
    {
        $category = Category::find($id);
        $categories = Category::select('id', 'name')->get();
        return view('admin.category.edit',compact(['category','categories']));
    }
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate(Category::rules($id),Category::message());
        $slug = Str::slug($request->name);
//        $originalSlug = $slug;
//        $count = 1;
//        $existingSlugs = Category::pluck('slug')->all();
//        while (in_array($slug, $existingSlugs)) {
//            $slug = $originalSlug . '-' . $count;
//            $count++;
//        }
        $category = Category::find($id);
        $category->update([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
            'parent' => $request->parent,
            'order' => $request->txtOrder,
        ]);
        return redirect()->route('admin.category.edit',$id)->with('success', 'Category updated successfully');
    }
    public function delete($id): RedirectResponse
    {
//        Category::where('id',$id)->delete();
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('admin.category.index')->with('success', 'Category deleted successfully');
    }
}
