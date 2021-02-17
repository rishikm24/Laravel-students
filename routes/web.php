<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/dashboard',[StudentsController::class, 'index'])->name('dashboard');

    Route::get('/student',[StudentsController::class, 'add']);
    Route::post('/student',[StudentsController::class, 'create']);
    Route::post('/search/{query}',[StudentsController::class, 'searchStudent']);
    
    // Route::get('/task/{task}', [StudentsController::class, 'edit']);
    // Route::post('/task/{task}', [StudentsController::class, 'update']);
});