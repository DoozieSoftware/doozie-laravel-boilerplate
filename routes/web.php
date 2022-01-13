<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

//Company Master
Route::get('/company', [CompanyController::class, 'index'])->middleware(['auth'])->name('company');
Route::get('/company/{id}/edit', [CompanyController::class, 'edit'])->middleware(['auth'])->name('company.edit');
Route::put('/company/{id}', [CompanyController::class, 'update'])->middleware(['auth'])->name('company.update');

//Category Master
Route::get('/category', [CategoryController::class, 'index'])->middleware(['auth'])->name('category.index');
Route::get('/category/edit', [CategoryController::class, 'edit'])->name('editCategory');
route::post('/category/update', [CategoryController::class, 'update'])->name('updateCategory');
Route::post('/category/store', [CategoryController::class, 'store'])->name('storeCategory');
Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('deleteCategory');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

//Facebook login
Route::get('auth/facebook', [SocialController::class, 'facebookRedirect']);
Route::get('auth/facebook/callback', [SocialController::class, 'loginWithFacebook']);

//Google login
Route::get('auth/google', [SocialController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [SocialController::class, 'handleGoogleCallback']);

require __DIR__.'/auth.php';
