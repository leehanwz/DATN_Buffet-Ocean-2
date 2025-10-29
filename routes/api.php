<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/health', function (Request $request) {
    return response()->json([
        'status' => 'ok',
        'app' => config('app.name'),
        'time' => now()->toISOString(),
    ]);
});
