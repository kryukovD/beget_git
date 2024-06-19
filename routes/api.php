<?php

use Illuminate\Http\Request;
use App\Http\Controllers\TechnologiesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RequestFormController;
use App\Http\Controllers\PricesController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
uSe App\Http\Controllers\PortfoliosController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group(function(){
    Route::post("/updatePrices",[PricesController::class,'update']);
    Route::post("/addPortfolio",[PortfoliosController::class,'add']);
    Route::post("/updateJob",[JobController::class,'update']);
    Route::post("/addJob",[JobController::class,'add']);
    Route::post("/updatePortfolio",[PortfoliosController::class,'update']);
    Route::get("/deletePortfolio/{id}/",[PortfoliosController::class,'delete']);
    Route::get("/deleteJob/{id}/",[JobController::class,'delete']);
    Route::get("/allRequest",[RequestFormController::class,'all']);
});
Route::get("/getStack",[TechnologiesController::class,'getCategories']);
Route::get("/getTechnologies",[TechnologiesController::class,'getTechnologies']);
Route::get("/getPortfolio",[PortfoliosController::class,'getAll']);
Route::get("/getPortfolioById/{id}/",[PortfoliosController::class,'getById']);
Route::get("/getJobById/{id}/",[JobController::class,'getById']);
Route::get("/getPrices",[PricesController::class,'getAll']);
Route::get("/getJobs",[JobController::class,'getAll']);

Route::post("/sendForm",[RequestFormController::class,'send']);
/*Логин */
Route::post("/auth/login",[AuthController::class,'login']);
Route::get("/auth/getUser",[AuthController::class,'me']);


