<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

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
    return view('home');
})->middleware('auth');

Route::get('/profile/create/{id}', function ($id) {
    $profile =  DB::table('profiles')->where('user_id',$id)->first();
    return View('profile.create',['profile'=>$profile,'id'=>$id]);
})->middleware(['auth','role:admin']);

Route::get('/order/profile/{id}', function ($id) {
    $profile =  DB::table('profiles')->where('user_id',$id)->first();
    return View('profile.show',['profile'=>$profile,'id'=>$id]);
})->middleware(['auth','role:editor']);

Route::resource('product',ProductController::class)->middleware(['auth','role:editor']);
Route::resource('user',UserController::class)->middleware(['auth','role:admin']);
Route::resource('profile',ProfileController::class)->middleware(['auth','role:admin']);
Route::resource('order',OrderController::class)->middleware(['auth','role:editor']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
