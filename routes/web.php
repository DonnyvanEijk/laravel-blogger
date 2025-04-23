<?php

use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

Route::get("/", [MessageController::class, "index"])->name("index");

Route::post("/", [MessageController::class, "store"])->name("store");

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});
