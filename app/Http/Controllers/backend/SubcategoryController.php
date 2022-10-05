<?php

namespace App\Http\Controllers\backend;

use App\helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{

    public function index()
    {
        return view('layouts.backend.subcategory.manage', ['subcategories' => Subcategory::all()]);
    }


    public function create()
    {
       return view('layouts.backend.subcategory.create', ['categories' => Category::all()]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name'        => 'required|unique:categories|max:191',
        ]);

        Subcategory::saveSubcategory($request);
        return redirect()->back()->with('success', 'Subcategory Added Successfully');
    }


    public function show($id)
    {
        Helper::changeStatus(Subcategory::find($id));
        return redirect()->back()->with('success', 'Status Changed Successfully');
    }


    public function edit($id)
    {
        return view('layouts.backend.subcategory.edit', ['subcategory' => Subcategory::find($id), 'categories' => Category::all()]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'name'        => 'required|unique:categories|max:191',
        ]);

        Subcategory::saveSubcategory($request, $id);
        return redirect()->route('subcategories.index')->with('success', 'Subcategory Updated Successfully');
    }


    public function destroy($id)
    {
        Subcategory::find($id)->delete();
        return redirect()->back()->with('success', 'Subcategory Deleted Successfully');
    }
}
