<?php

use Illuminate\Http\Request;
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

$controller_path = 'App\Http\Controllers';

// Main Page Route

// pages

Route::get('/public', function (Request $request) {
    dd('HOLA');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
$controller_path = 'App\Http\Controllers';

    //home
    Route::get('/', $controller_path . '\pages\HomePage@index')->name('pages-home');
    Route::get('/page-2', $controller_path . '\pages\Page2@index')->name('pages-devices');

    //users
    Route::get('/users', $controller_path . '\pages\Users@index')->name('users.index');
    Route::get('/users/create', $controller_path . '\pages\Users@create')->name('users.create');
    Route::post('/users/store', $controller_path . '\pages\Users@store')->name('users.store');
    Route::get('/users/edit/{user_id}', $controller_path . '\pages\Users@edit')->name('users.edit');
    Route::put('/users/update/{user_id}', $controller_path . '\pages\Users@update')->name('users.update');
    Route::get('/users/destroy/{user_id}', $controller_path . '\pages\Users@destroy')->name('users.destroy');

    //types
    Route::get('/types', $controller_path . '\pages\Types@index')->name('types.index');
    Route::get('/types/create', $controller_path . '\pages\Types@create')->name('types.create');
    Route::post('/types/store', $controller_path . '\pages\Types@store')->name('types.store');
    Route::get('/types/edit/{type_id}', $controller_path . '\pages\Types@edit')->name('types.edit');
    Route::put('/types/update/{type_id}', $controller_path . '\pages\Types@update')->name('types.update');
    Route::get('/types/destroy/{type_id}', $controller_path . '\pages\Types@destroy')->name('types.destroy');
    Route::get('/types/switch/{type_id}', $controller_path . '\pages\Types@switch')->name('types.switch');

    //sos
    Route::get('/sos', $controller_path . '\pages\SistemasOperativos@index')->name('sos.index');
    Route::get('/sos/create', $controller_path . '\pages\SistemasOperativos@create')->name('sos.create');
    Route::post('/sos/store', $controller_path . '\pages\SistemasOperativos@store')->name('sos.store');
    Route::get('/sos/edit/{sos_id}', $controller_path . '\pages\SistemasOperativos@edit')->name('sos.edit');
    Route::put('/sos/update/{sos_id}', $controller_path . '\pages\SistemasOperativos@update')->name('sos.update');
    Route::get('/sos/destroy/{sos_id}', $controller_path . '\pages\SistemasOperativos@destroy')->name('sos.destroy');
    Route::get('/sos/switch/{sos_id}', $controller_path . '\pages\SistemasOperativos@switch')->name('sos.switch');


    //devices
    Route::get('/devices', $controller_path . '\pages\Devices@index')->name('devices.index');
    Route::get('/devices/create', $controller_path . '\pages\Devices@create')->name('devices.create');
    Route::post('/devices/store', $controller_path . '\pages\Devices@store')->name('devices.store');
    Route::get('/devices/edit/{devices_id}', $controller_path . '\pages\Devices@edit')->name('devices.edit');
    Route::put('/devices/update/{devices_id}', $controller_path . '\pages\Devices@update')->name('devices.update');
    Route::get('/devices/destroy/{devices_id}', $controller_path . '\pages\Devices@destroy')->name('devices.destroy');
    Route::get('/devices/switch/{devices_id}', $controller_path . '\pages\Devices@switch')->name('devices.switch');
    Route::get('/devices/export/', $controller_path . '\pages\Devices@export')->name('devices.export');

    //backups
    Route::get('/backups', $controller_path . '\pages\Backups@index')->name('backups.index');
    Route::get('/backups/create', $controller_path . '\pages\Backups@create')->name('backups.create');
    Route::get('/backups/delete/{backup_id}', $controller_path . '\pages\Backups@destroy')->name('backups.destroy');


    //switch de roles
    Route::get('/roles/switch/{user_id}', $controller_path . '\pages\Users@switch')->name('users.switch-role');

    //reports
    Route::get('/reports', $controller_path . '\pages\Reports@index')->name('reports.index');
    Route::get('/reports/create', $controller_path . '\pages\Reports@create')->name('reports.create');
    Route::get('/reports/delete/{report_id}', $controller_path . '\pages\Reports@destroy')->name('reports.destroy');

    
});
