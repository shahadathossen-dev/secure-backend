<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PackageController;
use App\Http\Resources\ApiResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:customers')->get('/user', function (Request $request) {
    return new ApiResource($request->user());
});

Route::middleware('auth:customers')->post('stripe/checkout', [PackageController::class, 'stripeCeckout']);
Route::middleware('auth:customers')->post('paypal/checkout', [PackageController::class, 'paypalCheckout']);
Route::get('countries', [CountryController::class, 'index']);
