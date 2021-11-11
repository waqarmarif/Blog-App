<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;

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

require __DIR__.'/auth.php';


Route::get('/',[PageController::class,'home']);
Route::get('/about',[PageController::class,'about']);
Route::get('/contact',[PageController::class,'contact']);

Route::resource('post',PostController::class);

Route::get('blog/{slug}',[BlogController::class,'getSingle'])
->where('slug','[@\w\d\-\_]+')
->name('blog.single');