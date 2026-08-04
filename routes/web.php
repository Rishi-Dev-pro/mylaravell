<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', function (){
    return view('home');
});



Route::get('/employee', [EmployeeController::class, 'index'])
->name('emloyeIndex');

Route::get('/employee/header', [EmployeeController::class, 'head'])
->name('employeeheader');


Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);
