<?php

use App\Http\Controllers\APIController;
use Illuminate\Support\Facades\Route;

Route::get('/calculate', [APIController::class, 'calculate']);
