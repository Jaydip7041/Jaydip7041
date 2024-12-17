<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BlogController;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/', [UserController::class, 'index'])->name('index');
Route::get('/create', [UserController::class, 'create'])->name('create');
Route::post('/store', [UserController::class, 'store'])->name('store');
Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [UserController::class, 'update'])->name('update');
Route::delete('/delete/{id}', [UserController::class, 'delete'])->name('delete');

Route::get('category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('category/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('category/{id}/delete', [CategoryController::class, 'delete'])->name('category.delete');

// Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup.form');
// Route::post('/signup', [AuthController::class, 'signup'])->name('signup');

// Route::get('/signin', [AuthController::class, 'showSigninForm'])->name('signin.form');
// Route::post('/signin', [AuthController::class, 'signin'])->name('signin');

// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Route::get('/dashboard', function () {
//     return view('dashboard'); // Replace with your dashboard view
// // })->middleware('auth');
// Route::get('/auth/login', [AuthController::class, 'index'])->name('login');
// Route::post('/auth/login', [AuthController::class, 'login'])->name('login');
// Route::get('/auth/register', [AuthController::class, 'registr_view'])->name('register');
// Route::post('/auth/register', [AuthController::class, 'register'])->name('register');
// Route::get('home', [AuthController::class, 'home'])->name('home');
// Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/auth/login', [AuthController::class, 'index'])->name('login');
    Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login')->middleware('throttle:2,1');
    Route::get('/auth/register', [AuthController::class, 'registr_view'])->name('register');
    Route::post('/auth/register', [AuthController::class, 'register'])->name('auth.register')->middleware('throttle:2,1');
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('home', [AuthController::class, 'home'])->name('home');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
Route::get('customer', [CustomerController::class, 'index'])->name('customers.index');
Route::get('customer/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('customer/store', [CustomerController::class, 'store'])->name('customers.store');

Route::resource('blogs', BlogController::class)->except('show');
Route::post('blogs/search', [BlogController::class, 'search'])->name('blogs.search');
Route::get('blogs/trashed', [BlogController::class, 'trashed'])->name('blogs.trashed');
Route::post('blogs/{id}/restore', [BlogController::class, 'restore'])->name('blogs.restore');
Route::delete('blogs/{id}/force-delete', [BlogController::class, 'forceDelete'])->name('blogs.forceDelete');
Route::get('blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');
// Route to display the edit form
Route::get('blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');

// Route to handle the form submission and update the blog
Route::put('blogs/{blog}', [BlogController::class, 'update'])->name('blogs.update');
