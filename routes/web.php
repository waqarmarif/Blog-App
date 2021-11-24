<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TagController;
use App\Models\Post;
use GuzzleHttp\Middleware;

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



Route::get('/dashboard',[DashboardController::class,'index'])->name('dash');


Route::get('/downloads', function () {
    return view('downloads');
})->middleware(['auth'])->name('downloads');

Route::group(['middleware'=>['auth'],'prefix'=>'posts'],function(){
    Route::resource('post',PostController::class);
    Route::resource('email',EmailController::class);
    Route::get('/restore/{id}',[PostController::class,'restore'])->name('post.restore');
    // Route::get('/email',[PostController::class,'email'])->name('email');
    // Route::post('/sendemail',[PostController::class,'sendemail'])->name('sendemail');

    

});

Route::group(['middleware'=>['auth'],'prefix'=>'categories'],function(){

    Route::resource('category',CategoryController::class,['except'=>'create']);
    Route::get('/restore/{id}/',[CategoryController::class,'restore'])->name('category.restore');


});

Route::group(['middleware'=>['auth'],'prefix'=>'tags'],function(){

    Route::resource('tag',tagController::class);
    Route::get('/restore/{id}',[TagController::class,'restore'])->name('tag.restore');
    


});

require __DIR__.'/auth.php';


Route::get('/',[PageController::class,'home']);
Route::get('/about',[PageController::class,'about']);
Route::get('/contact',[PageController::class,'contact']);


Route::get('blog/{slug}',[BlogController::class,'getSingle'])
->where('slug','[@\w\d\-\_]+')
->name('blog.single');

