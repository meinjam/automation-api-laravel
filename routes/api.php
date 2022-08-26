<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware( 'auth:sanctum' )->get( '/user', function ( Request $request ) {
    return $request->user();
} );

Route::get( '/products', [ProductController::class, 'index'] )->name( 'products.index' );
Route::post( '/products', [ProductController::class, 'store'] )->name( 'products.store' );
Route::get( '/products/{id}/delete', [ProductController::class, 'destroy'] )->name( 'products.destroy' );
Route::get( '/products/{id}', [ProductController::class, 'edit'] )->name( 'products.view.single' );
Route::post( '/products/{id}', [ProductController::class, 'update'] )->name( 'products.update.single' );
