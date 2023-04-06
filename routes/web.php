<?php

use App\Http\Controllers\HelloController;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\AgeCalculatorController;

use Illuminate\Support\Facades\Route;


Route::get('/hello', [HelloController::class, 'index'])->name('hello');
Route::get('/hello-submit', [HelloController::class, 'submit'])->name('hello-submit');


Route::get('/calculadora/{num1}/{num2}/{operation?}', [\App\Http\Controllers\CalculatorController::class, 'calculate'])
->where(['num1' => '[0-9]+', 'num2' => '[0-9]+'])
->name('calculator');


Route::get('/idade/{ano}/{mes?}/{dia?}', [AgeCalculatorController::class, 'calculateAge'])->name('calcular_idade');



