<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\MailController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(PostController::class)->group(function(){
    Route::get('posts', 'index');
    Route::post('posts', 'store')->name('posts.store');
});

Route::get('users', [UserController::class, 'index']);
Route::get('users/{id}', [UserController::class, 'show'])->name('users.show');

Route::get('product', [ProductController::class, 'index']);

Route::get('lang/home', [LangController::class, 'index']);
Route::get('lang/change', [LangController::class, 'change'])->name('changeLang');

Route::get('send-mail', [MailController::class, 'index']);

Route::get('email-test', function(){
  
    $details['email'] = 'your_email@gmail.com';
  
    dispatch(new App\Jobs\SendEmailJob($details));
  
    dd('done');
});
