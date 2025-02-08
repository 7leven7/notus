<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;

use App\Http\Controllers\Api\CategoryController as PublicCategoryController;
use App\Http\Controllers\Api\ProductController as PublicProductController;
use App\Http\Controllers\Api\CommentController as PublicCommentController;


use App\Http\Controllers\Admin\Api\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\Api\ProductController as AdminProductController;
use App\Http\Controllers\Admin\Api\CommentController as AdminCommentController;
use App\Http\Controllers\Admin\Api\UserController as AdminUserController;


Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

Route::get('/categories', [PublicCategoryController::class, 'index']);
Route::get('/categories/{id}', [PublicCategoryController::class, 'show']);

Route::get('/products', [PublicProductController::class, 'index']);
Route::get('/products/{id}', [PublicProductController::class, 'show']);

Route::post('/comments', [PublicCommentController::class, 'store']);



Route::middleware(['auth:sanctum', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/categories', [AdminCategoryController::class, 'index']);
    Route::get('/categories/{id}', [AdminCategoryController::class, 'show']);
    Route::post('/categories', [AdminCategoryController::class, 'store']);
    Route::put('/categories/{id}', [AdminCategoryController::class, 'update']);
    Route::delete('/categories/{id}', [AdminCategoryController::class, 'destroy']);


    Route::get('/products', [AdminProductController::class, 'index']);
    Route::get('/products/{id}', [AdminProductController::class, 'show']);
    Route::post('/products', [AdminProductController::class, 'store']);
    Route::put('/products/{id}', [AdminProductController::class, 'update']);
    Route::delete('/products/{id}', [AdminProductController::class, 'destroy']);

    Route::get('/comments', [AdminCommentController::class, 'index']);
    Route::get('/comments/{id}', [AdminCommentController::class, 'show']);
    Route::put('/comments/{id}', [AdminCommentController::class, 'update']);
    Route::delete('/comments/{id}', [AdminCommentController::class, 'destroy']);

    Route::get('/users', [AdminUserController::class, 'index']);
    Route::get('/users/{id}', [AdminUserController::class, 'show']);
    Route::post('/users', [AdminUserController::class, 'store']);
    Route::put('/users/{id}', [AdminUserController::class, 'update']);
    Route::delete('/users/{id}', [AdminUserController::class, 'destroy']);
});
