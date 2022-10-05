<?php

namespace App\Http\Controllers\backend;

use App\helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function index()
    {
        return view('layouts.backend.comment.manage', ['comments' => Comment::orderBy('id', 'desc')->get()]);
    }


    public function create()
    {
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        Helper::changeStatus(Comment::find($id));
        return redirect()->back()->with('success', 'Status Changed Successfully');
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required',
        ]);

        if (Auth::check() && Auth::user()->role == 'user'){
            Comment::saveComment($request, $id);
            Helper::increaseTotalComment(Blog::find($id));
            return redirect()->back();
        }
        return redirect()->route('login');
    }


    public function destroy($id)
    {
        Comment::find($id)->delete();
        return redirect()->back()->with('success', 'This Comment Deleted successfully');
    }
}
