<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculatorsController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/
##example with parameter
/*Route::get('/user/{id}', function ($id) {
    return this is example id:' .id';
});*/
Route::get('/', [CalculatorsController::class,'index']);
Route::get('/differenceCalculatorGet', [CalculatorsController::class,'differenceCalculatorGet']);
Route::Post('/differenceCalculatorPost', [CalculatorsController::class,'differenceCalculatorPost']);
