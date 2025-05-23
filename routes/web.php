<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;


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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/admin/logout', [Admincontroller::class, 'logout' ])->name('admin.logout');

// All Routes regarding User Management

Route::prefix('users')->group(function(){

    Route::get('/veiw', [UserController::class, 'UserView' ])->name('user.view');
    Route::get('/add', [UserController::class, 'UserAdd' ])->name('user.add');
    Route::post('/store', [UserController::class, 'UserStore' ])->name('user.store');
    Route::get('/edit/{id}', [UserController::class, 'UserEdit' ])->name('user.edit');
    Route::post('/update/{id}', [UserController::class, 'UserUpdate' ])->name('user.update');
    Route::get('/delete/{id}', [UserController::class, 'UserDelete' ])->name('user.delete');
    
});


// All Routes regarding Profile and Password

Route::prefix('profile')->group(function(){

    Route::get('/veiw', [ProfileController::class, 'ProfileView' ])->name('profile.veiw');
    Route::get('/edit', [ProfileController::class, 'ProfileEdit' ])->name('profile.edit');
    Route::post('/store', [ProfileController::class, 'ProfileStore' ])->name('profile.store');
    Route::get('/password/veiw', [ProfileController::class, 'PasswordView' ])->name('password.veiw');
    Route::post('/password/update', [ProfileController::class, 'PasswordUpdate' ])->name('password.update');
   
});