<?php

namespace App\Http\Controllers\backend;

use App\helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index()
    {
        return view('layouts.backend.blog.manage', ['blogs' => Blog::orderBy('id', 'desc')->get()]);
    }


    public function create()
    {
        return view('layouts.backend.blog.create', [
            'categories'    => Category::all(),
            'subcategories' => Subcategory::all(),
        ]);
    }


    public function store(Request $request)
    {

        $request->validate([
            'category_id'    => 'required',
            'subcategory_id' => 'required',
            'title'          => 'required|max:191',
            'image'          => 'required',
            'image_title'    => 'required|max:191',
            'content'        => 'required',
        ]);

        Blog::saveBlog($request);
        return redirect()->back()->with('success', 'Blog Added Successfully');
    }


    public function show($id)
    {
        Helper::changeStatus(Blog::find($id));
        return redirect()->back()->with('success', 'Status Changed successfully');
    }


    public function edit($id)
    {
        return view('layouts.backend.blog.edit', [
            'blog'          => Blog::find($id),
            'categories'    => Category::all(),
            'subcategories' => Subcategory::all(),
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id'    => 'required',
            'subcategory_id' => 'required',
            'title'          => 'required|max:191',
            'image_title'    => 'required|max:191',
            'content'        => 'required',
        ]);

        Blog::saveBlog($request, $id);
        return redirect()->route('blog.index')->with('success', 'Blog Updated Successfully');
    }


    public function destroy($id)
    {
        Blog::find($id)->delete();
        return redirect()->back()->with('success', 'Blog Deleted Successfully');
    }
}
