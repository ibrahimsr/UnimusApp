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

Route::get('/', 'DashboardController@index')->name('dashboard');
Auth::routes((['register' => false]));

Route::group(['middleware' => ['auth','checkRole:admin']], function () {
    Route::get('lecturers/{id}/profile', 'LecturerController@profile')->name('lecturers.profile');
    Route::get('students/{id}/profile', 'StudentController@profile')->name('students.profile');
    
    Route::resource('lecturers', 'LecturerController');
    Route::resource('students', 'StudentController');  
});

Route::group(['middleware' => ['auth','checkRole:dosen']], function () {
    Route::get('myprofile', 'LecturerController@profilSaya')->name('lecturers.myprofile');
    Route::put('lecturers/updateBaru/{id}','LecturerController@updateBaru')->name('lecturers.updateBaru');
});

Route::group(['middleware' => ['auth','checkRole:mahasiswa']], function () {
    Route::get('profilsaya', 'StudentController@profilSaya')->name('students.profilsaya');
    Route::put('students/updateBaru/{id}','StudentController@updateBaru')->name('students.updateBaru');
});