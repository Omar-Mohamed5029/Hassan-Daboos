<?php

use App\Http\Controllers\Api\PlantsController;
use App\Http\Controllers\Api\AuthController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



//apilink
//https://documenter.getpostman.com/view/23690146/2s8Z73zBRR

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);    
});

Route::get('/plants',[PlantsController::class,'index']);
Route::get('/search/{name}',[PlantsController::class,'search']);

Route::middleware(['jwt.verify'])->group(function(){  
    Route::get('/plant/{id}',[PlantsController::class,'show']);
    Route::post('/plant',[PlantsController::class,'store']);
    Route::post('/plant/{id}',[PlantsController::class,'update']);
    Route::post('/delete/plant/{id}',[PlantsController::class,'destroy']);
});

// Route::get('/plants',[PlantsController::class,'index']);
// Route::get('/plant/{id}',[PlantsController::class,'show']);
// Route::post('/plant',[PlantsController::class,'store']);
// Route::post('/plant/{id}',[PlantsController::class,'update']);
// Route::post('/delete/plant/{id}',[PlantsController::class,'destroy']);
