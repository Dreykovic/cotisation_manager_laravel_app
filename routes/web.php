<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CotisationController;
use App\Http\Controllers\MembreController;
use App\Http\Controllers\NatureController;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('pages.app');
    })->name('home');

    Route::get('/home', function () {
        return view('pages.app');
    })->name('home');
    /**
     * membres
     */

    Route::prefix('/membres')->group(function () {
        Route::get('/liste', [MembreController::class, 'index'])->name('membres.index');




        Route::delete('/delete/{id}', [MembreController::class, 'destroy'])->name('membres.delete');
        Route::prefix('/settings')->group(function () {
            Route::get('/info/{id}', [MembreController::class, 'edit'])->name('membres.info');
            Route::get('/cotisations/{id}', [MembreController::class, 'edit'])->name('membres.cotisations');
            Route::get('/mot-de-passe/{id}', [MembreController::class, 'edit'])->name('membres.password');
            Route::get('/cotisations-add/{id}', [MembreController::class, 'edit'])->name('membres.cotisations_add');
            Route::post('/info/update', [MembreController::class, 'update'])->name('membres.update');
        });
    });


    /**
     * Cotisations
     */
    Route::prefix('/cotisations')->group(function () {
        Route::get('/liste', [CotisationController::class, 'index'])->name('cotisations.index');
        Route::get('/add', [CotisationController::class, 'create'])->name('cotisations.create');
        Route::post('/store', [CotisationController::class, 'store'])->name('cotisations.store');
        Route::delete('/delete/{id}', [CotisationController::class, 'destroy'])->name('cotisations.delete');
    });

    /**
     * NAtures
     */
    Route::prefix('/natures')->group(function () {
        Route::get('/liste', [NatureController::class, 'index'])->name('natures.index');
        Route::post('/store', [NatureController::class, 'store'])->name('natures.store');
        Route::get('/details/{id}', [NatureController::class, 'show'])->name('natures.show');
        Route::delete('/delete/{id}', [NatureController::class, 'destroy'])->name('natures.delete');
    });


    /*
     * Logout
     */
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'guest'], function () {

    /*
     * Auth
     */
    Route::get('/login', [AuthController::class, 'loginFormGet'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [MembreController::class, 'create'])->name('register');
    Route::get('/membres/numero/{id}', [MembreController::class, 'show'])->name('membres.numro');
    Route::post('/membres/store', [MembreController::class, 'store']);


    Route::get('/login/forgot-password', [AuthController::class, 'forgotPasswordFormGet'])->name('forgot-password');
    Route::post('/forgot-password', [AuthController::class, 'sendEmail']);
    Route::get('/reset-password/{token}', [AuthController::class, 'resetPass'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'changePassword'])->name('password.update');
    Route::get('/pass/success', [AuthController::class, 'passwordChanged'])->name('password.changed');
});
