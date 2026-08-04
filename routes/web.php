<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AuthMiddleware;

Route::middleware(['auth.custom'])->group(function (){
Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', function (){
    return view('home');
});



Route::get('/employee', [EmployeeController::class, 'index'])
->name('emloyeIndex');

Route::get('/employee/header', [EmployeeController::class, 'head']);  

Route::get('/register', [AuthController::class, 'showRegister']);

Route::get('/login', [AuthController::class, 'showLogin']);


// Route::get('/employee/header', function () {
    
// })->middleware('auth.custom');




});


Route::middleware(['password.length'])->group(function () {
    
    Route::post('/register', [AuthController::class, 'register']);

    
    Route::post('/login', [AuthController::class, 'login']);
});