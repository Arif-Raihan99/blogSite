<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\BackendController;
use App\Http\Controllers\front\FrontController;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\SubcategoryController;
use App\Http\Controllers\backend\BlogController;
use App\Http\Controllers\backend\CommentController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\manageUserController;



Route::get('/', [FrontController::class, 'home'])->name('home');
Route::get('/edit-user', [FrontController::class, 'editUser'])->name('edit.user');
Route::get('/view-user', [FrontController::class, 'viewUser'])->name('view.user');
Route::get('/add-user', [FrontController::class, 'addUser'])->name('add.user');
Route::get('/about', [FrontController::class, 'about'])->name('about');
Route::post('/search', [FrontController::class, 'search'])->name('search');
Route::get('/contact', [FrontController::class, 'contact'])->name('contact');
Route::get('/create-post', [FrontController::class, 'createPost'])->name('create.post');
Route::get('/single-post/{id}', [FrontController::class, 'singlePost'])->name('single.post');
Route::get('/single-category/{id}', [FrontController::class, 'singleCategory'])->name('single.category');
Route::post('/check-form', [FrontController::class, 'checkForm'])->name('check.form');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::middleware('is_admin')->group(function (){
        Route::resource('roles', RoleController::class);
        Route::resource('manageUsers', manageUserController::class);
    });

    Route::middleware('is_admin_moderator')->group(function (){
        Route::resource('categories', CategoryController::class);
        Route::resource('subcategories', SubcategoryController::class);
        Route::resource('blogs', BlogController::class);
        Route::resource('comments', CommentController::class);
        Route::resource('profiles', ProfileController::class);
    });

    Route::middleware('is_admin_moderator_user')->group(function (){

        Route::get('/dashboard', [BackendController::class, 'dashboard'])->name('dashboard');
        Route::get('/self.profile/{id}', [BackendController::class, 'profile'])->name('self.profile');

    });
});
