<?php

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\UserController;

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

// 404
Route::get('/404', [CertificateController::class,'error']);

//Login and recieve the user token in order to have access to the below routes
Route::post('/certificate/login_for_receiving_a_token', [UserController::class,'generateTocken']);



// Sanctum protected routes
Route::group(['middleware'=>'auth:sanctum'], function(){
    // 1.Returns all certificates:
    Route::get('/certificate/see_all', [CertificateController::class,'show']);

    // 2.Adding a certificate:
    Route::post('/certificate/create', [CertificateController::class, 'create']);

    // 3.Returns certificate details:
    Route::get('/certificate/{id?}', [CertificateController::class,'show']);

    // 4.Updates a certificate
    Route::put('/certificate/update/{id}', [CertificateController::class,'update']);

    // 5.Deletes a certificate
    Route::delete('/certificate/delete/{id}', [CertificateController::class,'delete']);

    // 6.Search for a certificate:
    Route::get('/certificate/search/{name}', [CertificateController::class, 'search'])->middleware(['auth:sanctum', 'ability:check-status']);

    // Revoke the token that was used to authenticate the current request
Route::post('/certificate/logout', [UserController::class,'makeLogout']);
});