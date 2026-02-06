<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DebugController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\OrderController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);
Route::post('/logout',   [AuthController::class, 'logout'])->middleware('bearer-token');

// // Test endpoint (no auth)
// Route::post('/test-create-user-noauth', function (Request $request) {
//     try {
//         return response()->json(['message' => 'test endpoint works (no auth)']);
//     } catch (Exception $e) {
//         return response()->json(['error' => $e->getMessage()], 500);
//     }
// });

// // Test endpoint (with Bearer token)
// Route::post('/test-create-user', function (Request $request) {
//     try {
//         return response()->json(['message' => 'test endpoint works', 'user' => $request->user()]);
//     } catch (Exception $e) {
//         return response()->json(['error' => $e->getMessage()], 500);
//     }
// })->middleware('bearer-token');

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index']);   // List (public)
    Route::post('/', [UserController::class, 'store'])->middleware('bearer-token');  // Create (requires token)
    Route::get('{user}', [UserController::class, 'show']); // Show (public)
    Route::put('{user}', [UserController::class, 'update'])->middleware('bearer-token'); // Update (requires token)
    Route::delete('{user}', [UserController::class, 'destroy'])->middleware('bearer-token'); // Delete (requires token)
});

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index']);   // List (public)
    Route::get('{product}', [ProductController::class, 'show']); // Show (public)
    Route::post('/', [ProductController::class, 'store'])->middleware('bearer-token');  // Create (requires token)
    Route::put('{product}', [ProductController::class, 'update'])->middleware('bearer-token'); // Update (requires token)
    Route::delete('{product}', [ProductController::class, 'destroy'])->middleware('bearer-token'); // Delete (requires token)
});

Route::prefix('orders')->group(function () {
    Route::get('/', [OrderController::class, 'index']);   // List (public)
    Route::get('{order}', [OrderController::class, 'show']); // Show (public)
    Route::post('/', [OrderController::class, 'store'])->middleware('bearer-token');  // Create (requires token)
    Route::put('{order}', [OrderController::class, 'update'])->middleware('bearer-token'); // Update (requires token)
    Route::delete('{order}', [OrderController::class, 'destroy'])->middleware('bearer-token'); // Delete (requires token)
});

Route::get('/debug', [DebugController::class, 'info'])->middleware('bearer-token');
