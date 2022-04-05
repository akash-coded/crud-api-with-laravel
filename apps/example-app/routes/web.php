<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

//--1
Route::get('/', function () {
    // using view helper method
    return view('welcome');
});

//--2
Route::get('/greeting', function (Request $request) {
    // using the View facade
    return View::make('greeting', ['name' => '']);
});

//--3 (Required Parameters)
Route::get('/worker/{id}', function ($id) {
    return 'The id received in the route parameter is: '.$id;
})->where('id', '[0-9]+');

//--4 (Dependency Injection)
Route::get('/user/{name}', function (Request $request, $name) {
    return view('greeting', ['name' => $name]);
})->where('name', '[A-Za-z]+');

//--5 (Optional Parameters)
Route::get('/userDetails/{id}/{name?}', function (Request $request, $id, $name = 'John') {
    return view('greeting', ['name' => $name]);
})->where([
    'id' => '[0-9]+',
    'name' => '[A-Za-z]+'
]);

//--6 (Regular Expression Constraints)
Route::get('/orderDetails/{orderNo}/{productName?}', function ($id, $name = null) {
    return view('greeting', ['name' => $name]);
})->whereNumber('orderNo')->whereAlpha('productName');

//--7
Route::get('/user', [UserController::class, 'index']);

//--8
Route::get('/user/greet/{name}', [UserController::class, 'greetUser']);
