<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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



Route::prefix('/')->middleware(['auth'])->group(function(){

    Route::get('/', 'DashboardController@index')->name('dashboard-index');
    Route::get('/dashboard/detail/{id}', 'DashboardController@detail')->name('dashboard-detail');
    Route::get('/notif','NotificationController@index')->name('notif-index');
    Route::delete('/notif/{id}','NotificationController@delete')->name('notif-delete');
    Route::resource('employee', 'EmployeeController');
    Route::resource('department', 'DepartmentController');
    Route::resource('dependent', 'DependentController');
    Route::resource('workson', 'WorksonController');
    Route::resource('project', 'ProjectController');
    Route::resource('deplocation', 'DeplocationController');
    });

Auth::routes();


