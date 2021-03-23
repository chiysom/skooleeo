<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/Chisom_Ogbuagu/companies', 'CompaniesController@index')->name('companies.home')->middleware('auth');
Route::get('/Chisom_Ogbuagu/employees', 'EmployeesController@index')->name('employees.home')->middleware('auth');

Auth::routes(['register' => false]);

Route::get('/home', 'CompaniesController@index')->name('home')->middleware('auth');
