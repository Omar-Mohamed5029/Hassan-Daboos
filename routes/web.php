<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlantsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\admin\AdminPlantsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'index']);
Route::get('/about',[AboutController::class,'index']);
Route::get('/services',[ServicesController::class,'index']);
Route::get('/contact',[ContactController::class,'index']);
Route::get('/plants',[PlantsController::class,'index']);

Route::resource('/admin/allplants',AdminPlantsController::class); 

Route::post('/store',[adminCategoryController::class,'store'])->name('front.store_category');
    Route::get('/admin/create_category',[adminCategoryController::class,'create']);
    Route::resource('allcategories',adminCategoryController::class);
