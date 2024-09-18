<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($request->only('email', 'password'))) {
        $user = Auth::user();
        $token = $user->createToken('API Token')->plainTextToken;
        return response()->json(['token' => $token], 200);
    }
    return response()->json(['message' => 'Unauthorized'], 401);
});

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/tasks', [TaskApiController::class, 'index']);
    Route::post('/tasks', [TaskApiController::class, 'store']);
    Route::get('/tasks/{task}', [TaskApiController::class, 'show']);
    Route::put('/tasks/{task}', [TaskApiController::class, 'update']);
    Route::delete('/tasks/{task}', [TaskApiController::class, 'destroy']);

    Route::post('/logout', function (Request $request) {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logged out'], 200);
    })->middleware('auth:sanctum');
});
