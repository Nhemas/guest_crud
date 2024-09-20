<?php

use App\Http\Controllers\GuestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('guests', \App\Http\Controllers\GuestController::class)
    ->except('create', 'edit')
    ->missing(function (Request $request) {
        return abort(404, 'Resource not found.');
    });
