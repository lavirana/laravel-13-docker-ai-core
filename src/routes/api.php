<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgentController;

Route::get('/test', function () {
    return response()->json([
        'message' => 'API Working'
    ]);
});

// routes/api.php
Route::post('/agent/{agent}', [AgentController::class, 'run']);