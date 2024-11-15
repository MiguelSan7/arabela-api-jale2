<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InfoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('login');
})->name('login')->middleware('guest.jwt');
Route::get('/register', function () {
    return view('register');
})->name('register');
Route::get('/verifiycode', function () {
    return view('verifycode');
})->name('verifiycode');
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

Route::post('/login', [UsersController::class, 'login'])->name('loginpost');
Route::post('/register/post', [UsersController::class, 'register'])->name('registerpost');
Route::post('/verifycodepost', [UsersController::class, 'verificarcodigo'])->name('Verifycodepost');
Route::get('/logout', [UsersController::class, 'logout'])->name('logout');
Route::get('/me', [UsersController::class, 'me'])->name('me');
Route::put('/editlocation', [UsersController::class, 'editlocation'])->name('editlocation');
Route::put('/edit/{id}', [UsersController::class, 'edit'])->name('edituser');
Route::post('/clear-cookie-and-login', [UsersController::class, 'clearCookieAndLogin'])->name('clearCookieAndLogin');
Route::delete('/desactivar/{id}',[UsersController::class,'desactivar'])->name('desactivaruser');
Route::post('/numdama', [InfoController::class, 'getNumDamaCount'])->name('graficas.numdama');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth.jwt');

// Protected routes for admins
Route::middleware(['auth.jwt', 'role:admin'])->group(function () {
    Route::get('/index', [UsersController::class, 'index'])->name('indexusers');
    Route::get('/show/{id}', [UsersController::class, 'show'])->name('showuser');
});

// Routes for all authenticated users
Route::middleware('auth.jwt')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});