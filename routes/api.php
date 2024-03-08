<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CertificateController;

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
    return $request->user();
});

//Returns all certificates:
Route::get('/', [CertificateController::class,'index'])->name('certificates.all');

//Adding a certificate:
Route::get('/certificate/create', [CertificateController::class . 'create'])->name('certificate.create');

//Returns certificate details:
Route::get('/certificate/{certificate_id}', [CertificateController::class,'show'])->name('certificate.show');

//Editing a certificate:
Route::get('/certificate/{certificate_id}/edit', [CertificateController::class,'edit'])->name('certificate.edit');

//Updates a certificate
Route::put('/certificate/{certificate_id}', [CertificateController::class,'update'])->name('certificate.update');

//Deletes a certificate
Route::delete('/certificate/{certificate_id}', [CertificateController::class,'destroy'])->name('certificate.destroy');
