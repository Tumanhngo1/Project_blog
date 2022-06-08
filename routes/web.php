<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Users\PostController;
use App\Http\Controllers\Admin\PostCategoriesController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\OderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Users\CartController;
use App\Http\Controllers\Users\OrderController;
use App\Http\Controllers\Users\PostCommentController;
use App\Http\Controllers\Users\ProductCommentController;
use App\Http\Controllers\Users\ProductController as UsersProductController;
use App\Http\Controllers\ViewRenderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// home/user
Route::get('/',[PostController::class,'index'])->name('home');
Route::get('users/{post}',[PostController::class,'show']);
Route::get('users/comment/{post}',[PostCommentController::class,'comment'])->name('comment');
Route::put('users/comment/edit/{post}',[PostCommentController::class,'update'])->name('editComment');
Route::get('users/comment/delete/{post}',[PostCommentController::class,'delete'])->name('deleteComment');
Route::get('users/replay/{comment}',[PostCommentController::class,'replay'])->name('replay');
// Route::post('users/{post:slug}/comments',[PostCommentController::class,'store']);
//phan quyen
// Route::get('/drafts', [PostController::class,'drafts'])->name('list_drafts') ->middleware('auth');;
// Route::get('/edit/{post}',[PostController::class,'edit'])->name('edit_post')->middleware('can:post.update,post');
// Route::post('/edit/{post}',[PostController::class,'update'])->name('update_post')->middleware('can:post.update,post');
// Route::get('/create', [PostController::class,'create'])->name('create_post')->middleware('can:post.create');
// Route::post('/create',[PostController::class,'store'] )->name('store_post')->middleware('can:post.create');
Route::group(['prefix' => 'posts'], function () {
    Route::get('/drafts', [PostController::class,'drafts'])
        ->name('list_drafts')
        ->middleware('auth');
    Route::get('/create', [PostController::class,'create'])
        ->name('create_post')
        ->middleware('can:post.create');
    Route::post('/create', [PostController::class,'store'])
        ->name('store_post')
        ->middleware('can:post.create');
    Route::get('/edit/{post}', [PostController::class,'edit'])
        ->name('edit_post')
        ->middleware('can:post.update,post');
    Route::post('/edit/{post}', [PostController::class,'update'])
        ->name('update_post')
        ->middleware('can:post.update,post');
    Route::get('/publish/{post}', [PostController::class,'publish'])
        ->name('publish_post')
        ->middleware('can:post.publish');
    Route::get('delete/{post}',[PostController::class,'destroy'])->name('post.delete');
});


//HOME/PRODCT
Route::get('products',[UsersProductController::class,'index']);
Route::get('products/{product}',[UsersProductController::class,'show']);
Route::post('products/{product:slug}/comments',[ProductCommentController::class,'store']);



//cart
Route::get('carts/{cart}',[CartController::class,'show'])->name('addToCart');
Route::get('show-carts',[CartController::class,'index'])->name('cart');
Route::get('update-carts',[CartController::class,'update'])->name('update');
Route::get('delete-carts',[CartController::class,'destroy'])->name('delete');


//order
Route::get('paymet-carts',[OrderController::class,'create']);
Route::post('order-carts',[OrderController::class,'store'])->name('payment');
Route::get('confirm/{token}/{customer}',[OrderController::class,'confirm'])->name('confirm');



//auth
Route::get('register',[RegisterController::class,'create'])->middleware('guest')->name('register');
Route::post('register',[RegisterController::class,'store'])->middleware('guest');
Route::get('login',[LoginController::class,'create'])->middleware('guest')->name('login');
Route::post('login',[LoginController::class,'store'])->middleware('guest');
Route::post('logout',[LoginController::class,'destroy'])->middleware('auth')->name('logout');

//reset_password
Route::get('forget-password', [ForgotPasswordController::class, 'showForget'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForget'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showReset'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitReset'])->name('reset.password.post');


//admin
Route::middleware('can:admin')->group(function(){
    Route::resource('admin/categories',PostCategoriesController::class);
    Route::resource('admin/posts',AdminPostController::class);
    Route::patch('admin/posts/{post:slug}',[AdminPostController::class,'update']);
    Route::resource('admin/productcategories',ProductCategoryController::class);
    Route::resource('admin/products',ProductController::class);
       

    Route::get('admin/attr/{product:slug}',[AttributeController::class,'show']);
    Route::post('admin/attr/{product:slug}',[AttributeController::class,'store']);
    Route::get('admin/attr/{product:slug}/edit',[AttributeController::class,'edit']);
    Route::get('admin/attr/{product:slug}/delete',[AttributeController::class,'destroy']);
   // Route::put('admin/attr/size/{product:slug}',[AttributeController::class,'update']);


    Route::get('admin/size/{product:slug}',[AttributeController::class,'size']);
    Route::post('admin/size/{product:slug}',[AttributeController::class,'storesize']);
    Route::get('admin/size/{product:slug}/edit',[AttributeController::class,'sizeedit']);
    Route::get('admin/size/{product:slug}/delete',[AttributeController::class,'sizedestroy']);


    //order
    Route::get('admin/order',[OderController::class,'index']);
    Route::get('admin/destroy/{id}',[OderController::class,'destroy']);

    //user
    Route::resource('admin/users',UserController::class);
 
});



