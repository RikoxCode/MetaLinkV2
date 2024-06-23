<?php

use App\Http\Controllers\ApiLogController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\SheetmusicController;
use App\Http\Requests\StorePerformanceRequest;
use App\Models\Performance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function () {
    // Sheetmusic routes
    Route::prefix('sheetmusics')->group(function () {
        Route::get('/', [SheetmusicController::class, 'index']);
        Route::get('/{slug}', [SheetmusicController::class, 'show']);
        Route::post('/', [SheetmusicController::class, 'store'])->middleware('check-login');
        Route::put('/{slug}', [SheetmusicController::class, 'update'])->middleware('check-login');
        Route::delete('/{slug}', [SheetmusicController::class, 'destroy'])->middleware('check-login');
    });

    // Performance routes
    Route::prefix('performances')->group(function () {
        Route::post('/', function (StorePerformanceRequest $request) {
            $performance = new Performance();
            $performance->fill($request->validated());
            $performance->save();
            return $performance;
        })->middleware('check-login');
    });

    // Group routes
    Route::prefix('groups')->group(function () {
        Route::get('/', [GroupController::class, 'index']);
        Route::get('/{slug}', [GroupController::class, 'show']);
        Route::post('/', [GroupController::class, 'store'])->middleware('check-login');
        Route::put('/{slug}', [GroupController::class, 'update'])->middleware('check-login');
        Route::delete('/{slug}', [GroupController::class, 'destroy'])->middleware('check-login');
    });

    // Log routes
    Route::prefix('logs')->group(function () {
        Route::get('/', [ApiLogController::class, 'index'])->middleware('check-login');
        Route::get('/{log}', [ApiLogController::class, 'show'])->middleware('check-login');
    });
});

