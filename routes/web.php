<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
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


Route::get('/', [BookingController::class, 'index']);
Route::get('login', function () {
    return view('login');
});

Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('logout', [AuthController::class, 'logout']);

Route::post('booked', [BookingController::class, 'addbooking']);

Route::group(['middleware' => ['VerifyAdmin']], function () {

    Route::get('dashboard', function () {
        return view('dashboard');
    });

    Route::get('booking', [BookingController::class, 'booking']);
    Route::get('edit_booking/{id}', [BookingController::class, 'edit_booking']);
    Route::get('delete_booking/{id}', [BookingController::class, 'delete_booking']);
    Route::post('update_booking/{id}', [BookingController::class, 'update_booking']);
  

 });
