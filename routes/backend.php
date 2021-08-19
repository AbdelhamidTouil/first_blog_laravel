<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\backend\PostsController;
use App\Http\Controllers\backend\customers\CustomersController;


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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::get('/backend',[PostsController::class,'backend']);
Route::get('/home',[PostsController::class,'home']);
Route::get('/contact',[PostsController::class,'contact']);


Route::namespace('cutomers')->group(function(){

    Route::get('/AddCustomers',[CustomersController::class,'AddCustomers']);
});
//this Route for create post
Route::namespace('backend')->group(function(){

    Route::get('/AddPost',[PostsController::class,'create'])->name('AddPost');
    Route::post('/AddPost/store',[PostsController::class,'store'])->name('post.store');
    Route::get('/showPost',[PostsController::class,'index'])->name('index');
    Route::get('/edit/{id}',[PostsController::class,'edit'])->name('edit');
    Route::post('/update/{id}',[PostsController::class,'update'])->name('update');
    Route::get('/delete/{id}',[PostsController::class,'destroy'])->name('delete');
});

