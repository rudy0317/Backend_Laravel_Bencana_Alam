<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BencanaController;

Route::apiResource('bencana', BencanaController::class);
