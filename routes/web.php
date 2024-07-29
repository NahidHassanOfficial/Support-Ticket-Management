<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketFormController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('form', TicketFormController::class);
Route::resource('tickets', TicketController::class);
Route::get('ticket-image/{filename}', [ImageController::class, 'showImage'])->name('showImage')->middleware('throttle:60:1');
