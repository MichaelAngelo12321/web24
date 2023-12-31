<?php

use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\EmployeesController;
use App\Http\Controllers\Api\PostController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

});

Route::apiResource('company',CompanyController::class);
Route::apiResource('employee',EmployeesController::class);


