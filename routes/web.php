<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

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

