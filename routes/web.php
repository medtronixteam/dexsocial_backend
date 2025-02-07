<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TelegramController;


Route::get('/edit-data', [TelegramController::class, 'editData'])->name('edit-data');
Route::get('/token/edit/{id}', [TelegramController::class, 'editToken'])->name('token.edit');
Route::delete('/delete-data/{id}', [TelegramController::class, 'deleteData'])->name('delete-data');
Route::put('/promote-data/{id}', [TelegramController::class, 'promoteData'])->name('promote-data');
Route::put('/update-data/{id}', [TelegramController::class, 'updateData'])->name('update-data');
Route::get('tokens/latest', [TelegramController::class, 'latestData'])->name('latest-data');
Route::get('tokens/promoted', [TelegramController::class, 'promotedTokens'])->name('promoted-tokens');
Route::get('/updated-tokens', [TelegramController::class, 'updatedTokens'])->name('updated-tokens');


Route::get('token/create', [TelegramController::class, 'addTokenData'])->name('token.create');
Route::post('/add-manual-data', [TelegramController::class, 'addManualData'])->name('add-manual-data');
Route::get('/tokens/updated', [TelegramController::class, 'showManualData'])->name('show-manual-data');
Route::get('/token/{id}', [TelegramController::class, 'viewManualData'])->name('view-manual-data');
Route::get('/edit-manual-data/{id}', [TelegramController::class, 'editManualData'])->name('edit-manual-data');
Route::put('/update-manual-data/{id}', [TelegramController::class, 'updateManualData'])->name('update-manual-data');
Route::delete('/delete-manual-data/{id}', [TelegramController::class, 'deleteManualData'])->name('delete-manual-data');
Route::get('/', [TelegramController::class, 'indextoken'])->name('indextoken');


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
// Route::get('/home', [LoginController::class, 'index'])->name('home')->middleware('auth');
Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::get('register', [LoginController::class, 'register'])->name('register');
Route::post('register', [LoginController::class, 'registerUser'])->name('register.user')->middleware('guest');


Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/loginPost', [LoginController::class, 'authenticate'])->name('loginPost');


Route::get('reset-password/{key}', [LoginController::class, 'resetPassword'])->name('reset.password');
Route::post('reset-password', [LoginController::class, 'resetPasswordCh'])->name('reset.password.post');

Route::get('profile', [AdminController::class, 'profile'])->name('profile');
Route::post('profile', [AdminController::class, 'profileUpdate'])->name('profile.update');




Route::group(['middleware'=>'auth'], function () {

    Route::get('dashboard', [MainController::class, 'dashboard'])->name('dashboard');
    Route::post('admin/disable', [AdminController::class, 'disableIdBy'])->name('disableIdBy');
    Route::post('admin/promote', [AdminController::class, 'promoteUser'])->name('promoteit');
    Route::get('/token/view/{id}', [TelegramController::class, 'viewToken'])->name('viewToken');



})->middleware('auth');
Route::post('/fetch/tokens/all', [TelegramController::class, 'fetchTokens'])->name('fetchTokens');
