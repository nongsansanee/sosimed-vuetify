<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\ApplicationLoginController;


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

// Route::get('/welcome', function () {
//     return view('welcome');
// })->name('welcome');

Route::get('/', function () {
    return redirect('login');
});

// Route::get('/login', function () {
//     return view('login');
// })->name('login');


// Route::post('/login',function(){
//     \Log::info('test login');
//     return "bbbbbbb";
// });
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('guest');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');

Route::get('/portal', PortalController::class)->middleware('auth')->name('portal');

// applications login
Route::post('/applications/{application}/login', ApplicationLoginController::class);