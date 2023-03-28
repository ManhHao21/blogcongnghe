<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\homeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\web\AuthController as WebAuthController;
use App\Http\Controllers\Web\WebController;
use Illuminate\Support\Facades\Route;


Route::get('/', [WebController::class, 'index'])->name('index');
Route::get('/category', [WebController::class, 'category'])->name('category');
Route::get('/category/{id}', [WebController::class, 'category'])->name('category');
Route::get('/post/{id}', [WebController::class, 'post'])->name('post');
Route::get('/contact', [WebController::class, 'contact']);
Route::post('/contact', [WebController::class, 'sendContact']);
Route::get('login', [WebAuthController::class, 'formLogin'])->name('Auth.index');
Route::post('login', [WebAuthController::class, 'login'])->name('Auth.login');
Route::get('logout', [WebAuthController::class, 'logout'])->name('Auth.logout');



Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'checkLogin'])->name('check-login');
});


Route::prefix('admin')->middleware('admin.login')->name('admin.')->group(function(){
    Route::get('/', [homeController::class, 'index'])->name('index');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');



    Route::prefix('category')->name('category.')->group(function(){
    Route::get('', [CategoryController::class, 'index'])->name('index');
    Route::get('create', [CategoryController::class, 'create'])->name('create');
    Route::post('store', [CategoryController::class, 'store'])->name('store');
    Route::get('edit/{id}', [CategoryController::class, 'edit'])-> name('edit');
    Route::put('update/{id}', [CategoryController::class, 'update'])-> name('update');
    Route::get('delete/{id}', [CategoryController::class, 'delete'])-> name('delete');
    });

    Route::prefix('post')->name('post.')->group(function(){
        Route::get('', [PostController::class, 'index'])->name('index');
        Route::get('create', [PostController::class, 'create'])->name('create');
        Route::post('store', [PostController::class, 'store'])->name('store');
        Route::get('edit/{id}', [PostController::class, 'edit'])-> name('edit');
        Route::put('update/{id}', [PostController::class, 'update'])-> name('update');
        Route::get('delete/{id}', [PostController::class, 'delete'])-> name('delete');
        });

        Route::prefix('user')->name('user.')->group(function(){
            Route::get('', [UserController::class, 'index'])->name('index');
            Route::get('create', [UserController::class, 'create'])->name('create');
            Route::post('store', [UserController::class, 'store'])->name('store');
            Route::get('edit/{id}', [UserController::class, 'edit'])-> name('edit');
            Route::put('update/{id}', [UserController::class, 'update'])-> name('update');
            Route::get('delete/{id}', [UserController::class, 'delete'])-> name('delete');
        });

        Route::prefix('contact')->name('contact.')->group(function(){
            Route::get('', [ContactController::class, 'index'])->name('index');
            Route::get('delete/{id}', [ContactController::class, 'delete'])-> name('delete');
        });


        // Route::prefix('comment')->name('contact.')->group(function(){
        //     Route::get('', [CommentControllerr::class, 'index'])->name('index');
        //     Route::get('create', [CommentController::class, 'createComent'])->name('createComment');
        //     Route::post('store', [CommentController::class, 'store'])->name('store');
        //     Route::get('edit/{id}', [CommentController::class, 'getEdit'])-> name('edit');
        //     Route::post('update/{id}', [CommentController::class, 'postEdit'])-> name('post-edit');
        //     Route::get('delete/{id}', [CommentController::class, 'delete'])-> name('delete');
        // });
   
});