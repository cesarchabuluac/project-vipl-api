<?php

use App\Http\Controllers\API\BannerApiController;
use App\Http\Controllers\API\UserApiController;
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

Route::get('banners', [BannerApiController::class, 'index']);
Route::post('register', [UserApiController::class, 'register']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
