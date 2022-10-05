<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Profile;
use App\Models\Subcategory;
use Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();

        view()->share([
            'categories'    => Category::all(),
            'subcategories' => Subcategory::all(),
            'newses'        => Blog::where('status', 1)->orderBy('id', 'desc')->get(),
            'popularNews'   => Blog::where('status', 1)->get()->sortByDesc('hit_count')->take(5),
            'religion'      => ['Islam', 'Hindu', 'Christan', 'Buddha', 'Others'],
            'occupation'    => ['Student', 'Teacher', 'Doctor', 'Web Developer', 'Engineer', 'Job Holder', 'Others'],
        ]);
    }
}
