<?php

namespace App\Http\Controllers\backend;

use App\helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        return view('layouts.backend.category.manage', ['categories' => Category::all()]);
    }

    public function create()
    {
        return view('layouts.backend.category.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:191',
        ]);

        Category::saveCategory($request);
        return redirect()->back()->with('success', 'Category Added Successfully');
    }


    public function show($id)
    {
        Helper::changeStatus(Category::find($id));
        return redirect()->back()->with('success', 'Status Changed Successfully');
    }


    public function edit($id)
    {
        return view('layouts.backend.category.edit', ['category' => Category::find($id)]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:191',
        ]);

        Category::saveCategory($request, $id);
        return redirect()->route('categories.index')->with('success', 'Category Updated Successfully');
    }


    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->back()->with('success', 'Category Deleted Successfully');
    }
}
