<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('', function () {
    return view('index');
});
// Route::get('compeletClerk', function () {
//     return view('clerk/compeletClerk');
// });
Route::get('phpinfo', function () {
    return phpinfo();
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/errorLogin', 'HomeController@index')->name('errorLogin');
Route::post('store', 'AdminController@store')->name('store');
Route::prefix('admin')->name('admin.')->middleware('can:admin-user')->group(function () {
    Route::get('/createManager', 'AdminController@createManager')->name('createManager');
    Route::get('/listManager', 'AdminController@listManager')->name('listManager');
    Route::post('/storeManager', 'AdminController@storeManager')->name('storeManager');
});
Route::prefix('manager')->name('manager.')->middleware('can:manager-user')->group(function () {
    Route::get('/listRequest', 'ManagerController@listRequest')->name('listRequest');
    Route::get('/madrakDocter/{dir}', 'ManagerController@madrakDocter')->name('madrak');
    Route::get('/listRequestClerk', 'ManagerController@listRequestClerk')->name('listRequestClerk');
    Route::get('/madrak', 'ManagerController@madrak')->name('madrak');
    Route::get('/skill', 'ManagerController@skill')->name('skill');
    Route::get('/listDoctors', 'ManagerController@listDoctors')->name('listDoctors');
    Route::post('/StoreSkill', 'ManagerController@StoreSkill')->name('StoreSkill');
    Route::post('/Storemadrak', 'ManagerController@Storemadrak')->name('Storemadrak');
    Route::get('/MakeShift', 'ManagerController@MakeShift')->name('MakeShift');
    Route::delete('/{id}/deleteSkill', 'ManagerController@deleteSkill')->name('deleteSkill');
    Route::delete('/{id}/deleteShift', 'ManagerController@deleteShift')->name('deleteShift');
    Route::delete('/{id}/deleteMadrak', 'ManagerController@deleteMadrak')->name('deleteMadrak');
    Route::post('/{id}/docterAccept', 'ManagerController@docterAccept')->name('docterAccept');
    Route::post('/{id}/clerkAccept', 'ManagerController@clerkAccept')->name('clerkAccept');
    Route::get('/{id}/clerkReject', 'ManagerController@clerkReect')->name('clerkReject');
    Route::post('/StoreShift', 'ManagerController@StoreShift')->name('StoreShift');
    Route::get('/{id}/docterReject', 'ManagerController@docterReject')->name('docterReject');
});
Route::prefix('clerk')->name('clerk.')->middleware('can:clerk-user')->group(function () {
    Route::get('/clerkComplete', 'ClerkController@Complete')->name('compeletClerk');
    Route::post('/storeClerk', 'ClerkController@storeClerk')->name('storeClerk');
});
Route::prefix('doctor')->name('doctor.')->middleware('can:doctor-user')->group(function () {
    // Route::get('/createDoctor', 'DoctorController@index')->name('createDoctor');
    Route::post('/storeDoctor', 'DoctorController@storeDoctor')->name('storeDoctor');
    Route::post('/storeTurn', 'DoctorController@storeTurn')->name('storeTurn');
    Route::post('/{shiftId}/storeShift', 'DoctorController@storeShift')->name('storeShift');
    Route::get('/index', 'DoctorController@index')->name('index');
    Route::get('/listTurn', 'DoctorController@listTurn')->name('listTurn');
    Route::get('/showShift', 'DoctorController@showShift')->name('showShift');
    Route::get('/edit', 'DoctorController@edit')->name('edit');
    Route::get('/madrak/{dir}', 'DoctorController@madrak')->name('madrak');
    Route::get('/listShift', 'DoctorController@listShift')->name('listShift');
    Route::get('/MakeTurn', 'DoctorController@MakeTurn')->name('MakeTurn');
    Route::get('/compelet', 'DoctorController@compelet')->name('compelet');
    Route::put('/{id}/editStore', 'DoctorController@update')->name('editStore');
    Route::delete('/{id}/deleteShift', 'DoctorController@deleteShift')->name('deleteShift');
});

Route::prefix('patient')->name('patient.')->group(function () {
    Route::get('/doctorslist', 'PatientController@listDoctors')->name('doctorslist');
    Route::get('/ListTakeTurn', 'PatientController@ListTakeTurn')->name('ListTakeTurn');
    Route::get('/ListVisit', 'PatientController@ListVisit')->name('ListVisit');
    Route::get('/{user}/TakeTurn', 'PatientController@TakeTurn')->name('TakeTurn');
    Route::post('/{shiftId}/{docterId}/TakeVisit', 'PatientController@TakeVisit')->name('TakeVisit');
    Route::delete('/{visitId}/{shiftId}/{docterId}/deleteVisit', 'PatientController@deleteVisit')->name('deleteVisit');
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
