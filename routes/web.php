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

// Employee Registration Routes
Route::get('/employee/register', function () {
    return view('employee-register');
})->name('employee.register');

Route::post('/employee/register', [EmployeeController::class, 'register'])
    ->middleware('password.length')
    ->name('employee.register.submit');

// Employee Login Routes
Route::get('/employee/login', function () {
    return view('employee-login');
})->name('employee.login');

Route::post('/employee/login', [EmployeeController::class, 'login'])
    ->middleware('password.length')
    ->name('employee.login.submit');


// Employee Dashboard Route
Route::get('/employee/dashboard', function () {
    return view('employee-dashboard');
})->middleware('auth.employee')->name('employee.dashboard');

Route::post('/employee/logout', [EmployeeController::class, 'logout'])
    ->middleware('auth.employee')
    ->name('employee.logout');