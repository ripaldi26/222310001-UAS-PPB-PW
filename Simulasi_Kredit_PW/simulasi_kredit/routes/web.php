<?php

use App\Http\Controllers\BanksController;
use App\Http\Controllers\JangkaWaktusController;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\NamaSkemaController;
use App\Models\banks;
use App\Models\JangkaWaktus;
use Brick\Math\Internal\Calculator;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('skema.modules.auth.login');
});
Route::get('/home',[banksController::class, 'home']);


Route::get('/createBank', function () {
    return view('skema.modules.screen2.create_bank');
});
Route::post('/store',[banksController::class, 'store']);
Route::get('/listbank',[banksController::class, 'index']);
Route::get('/detailsbank/{banks}', [banksController::class, 'getDataByID']);
Route::get('/delete/{banks}', [banksController::class, 'destroy']);
Route::get('/update/{banks}', [banksController::class, 'edit']);
Route::post('/update/{banks}/edit', [banksController::class, 'update']);



Route::post('/store2',[JangkaWaktusController::class, 'store']);
Route::get('/deleteJW/{JangkaWaktus}', [JangkaWaktusController::class, 'destroy']);
Route::get('/listJangkaWaktu',[JangkaWaktusController::class, 'index']);


Route::get('/',[BanksController::class, 'countUser']);
Route::get('/count',[BanksController::class, 'count']);
Route::get('/banks/{id}', [BanksController::class, 'getBanks']);
Route::get('/jangka/{id}', [BanksController::class, 'getjangkaWaktu']);


Route::post('/calculate', [CalculatorController::class, 'calculate']);
Route::post('/calculateUser', [CalculatorController::class, 'calculateUser']);
Route::get('/output', function () {
    return view('skema.modules.screen4.output');
});
