<?php

namespace App\Http\Controllers\front;

use App\helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;;


class FrontController extends Controller
{
    public function home(){

        if (Auth::check()){
            if (!Auth::user()->role=='user'){
                return redirect()->route('dashboard');
            }
        }
        return view('layouts.frontend.home', [
            'check'       => Auth::check() ? Profile::where('user_id', Auth::user()->id)->first() : null,

//            'currentTime' => Carbon::now(),
//            'addDayOnCurrentTime' => Carbon::now()->addDays(30),
//            'createDate' => Carbon::create(2012, 1, 31, 0),
        ]);
    }

    public function singlePost($id){

        $news = Blog::find($id);
        Helper::hitCount($news);
        return view('layouts.frontend.blog.single-post', [
            'comments'    => Comment::where('status', 1)->where('blog_id', $id)->get(),
            'singleNews'  => $news,
            'check'       => Auth::check() ? Profile::where('user_id', Auth::user()->id)->first() : null,
            'relatedNews' => Blog::where('status', 1)->where('subcategory_id', $news->subcategory_id)->orderBy('id', 'desc')->take(5)->get(),
        ]);
    }

    public function singleCategory($id){

        return view('layouts.frontend.blog.single-category',[
            'category'       =>Category::find($id),
            'categoryNewses' => Blog::where('status', 1)->where('category_id', $id)->orderBy('id', 'desc')->paginate(5),
            'check'          => Auth::check() ? Profile::where('user_id', Auth::user()->id)->first() : null,
        ]);
    }

    public function about(){

        return view('layouts.frontend.blog.about', [
            'authority'  => User::where('role', 'admin')->orWhere('role', 'moderator')->get(),
            'check'      => Auth::check() ? Profile::where('user_id', Auth::user()->id)->first() : null,
        ]);
    }

    public function contact(){

        return view('layouts.frontend.blog.contact', [
            'check'       => Auth::check() ? Profile::where('user_id', Auth::user()->id)->first() : null,
        ]);
    }

    public function createPost(){
        if(Auth::check()){
            return view('layouts.backend.blog.create');
        }
        return redirect()->route('login');
    }

    public function search(Request $request){

        return view('layouts.frontend.blog.search-result', [
            'searchNewses' => Blog::where('title', 'LIKE', "%{$request->search}%")->orWhere('content', 'LIKE', "%{$request->search}%")->paginate(5),
            'check'        => Auth::check() ? Profile::where('user_id', Auth::user()->id)->first() : null,
        ]);
    }

    public function viewUser(){
        if (Auth::check()){
            return view('layouts.frontend.user.view-profile', [
                'user'       => Profile::find(Auth::user()->id),
                'check'      => Auth::check() ? Profile::where('user_id', Auth::user()->id)->first() : null,
                'total_post' => Auth::check() ? count(Blog::where('user_id', Auth::user()->id)->get()) : null,
                'total_cmnt' => Auth::check() ? count(Comment::where('status', 1)->where('user_id', Auth::user()->id)->get()) : null,
            ]);
        }
        return redirect()->route('login');
    }

    public function addUser(){
        if (Auth::check()){
            return view('layouts.backend.profile.create', [
                'check' => Auth::check() ? Profile::where('user_id', Auth::user()->id)->first() : null,
            ]);
        }
        return redirect()->route('login');
    }

    public function editUser(){
        if (Auth::check()){
            return view('layouts.backend.profile.edit', [
                'profile'    => Profile::where('user_id', Auth::user()->id)->first(),
                'check'      => Auth::check() ? Profile::where('user_id', Auth::user()->id)->first() : null,
            ]);
        }
        return redirect()->route('login');
    }

}
