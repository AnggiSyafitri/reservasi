<?php

use App\Http\Controllers\AditionalOfferController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookInformationController;
use App\Http\Controllers\BookMenuController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SittingAreaController;
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

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function(){
    Route::get('/', [AdminController::class, 'view'])->name('dashboard.index');
    Route::get('/profile', [AdminController::class, 'profileView'])->name('dashboard.profile');
    Route::post('/edit-profile', [AdminController::class, 'editProfile'])->name('editProfile');
    Route::post('/ganti-password', [AdminController::class, 'updatePassword'])->name('editPassword');

    Route::group(['middleware' => 'adminOnly'], function(){
        Route::resource('users', UserController::class);
        Route::resource('menus', MenuController::class);
        Route::resource('informations', InformationController::class);
        Route::resource('aditionalOffers', AditionalOfferController::class);
        Route::resource('sittingAreas', SittingAreaController::class);
        Route::resource('questions', QuestionController::class);
    });


    Route::resource('books', BookInformationController::class);
    Route::get('/books/{id}/verify', [BookInformationController::class, 'verify'])->name('books.verify');
    Route::get('/books/{id}/reject', [BookInformationController::class, 'reject'])->name('books.reject');
});


Route::get('/',[ClientController::class,'index'])->name('home');
Route::get('/reservation',[ClientController::class,'ReservationView']);
Route::get('/question',[ClientController::class,'QuestionView'])->name('question');
Route::get('/offers-detail/{slug}',[ClientController::class,'OffersDetail']);
Route::post('/reservation', [BookInformationController::class, 'store'])->name('reservation.create');

Route::get('/reservation/check', [BookInformationController::class, 'checkAvailability'])->name('reservation.check');

Route::get('/reservation/done',function(){
    return view('client.reservationDone');
})->name('reservation.done');
