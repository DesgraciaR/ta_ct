<?php

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
Route::get('/', 'Auth\AuthController@showLoginForm');

Route::post('auth','Auth\AuthController@login');

Auth::routes();
Route::get('/halamanKepala','HalamanKepalaController@index')->middleware('kepala');
Route::get('/halamanPegawai','HalamanPegawaiController@index')->middleware('pegawai');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('dashboard','DashboardController@index')->middleware('authlogin');
Route::get('/ajukancuti','AjukancutiController@index')->middleware('authlogin');
Route::get('/pengajuan','PengajuanController@index')->middleware('authlogin');
Route::resource('/permohonancuti','PermohonancutiController')->middleware('kepala');
Route::post('/editdetail','DetailcutiController@updateDetail');
Route::post('/ajukancuti','AjukancutiController@store')->middleware('authlogin');
Route::get('/detailcuti/{id}','PermohonancutiController@show')->middleware('kepala');
Route::get('/ubahstatus/{id}/{status}','PermohonancutiController@updateStatus');
Route::get('/ubahstatus_ppk/{id}/{status_ppk}','PermohonancutiController@updateStatus_ppk');
Route::get('/ubahstatusbaca/{id}/{status_baca}','PermohonancutiController@updateStatusBaca');
Route::get('/histori','HistoriController@histori');
Route::get('/cetak','HistoriController@cetak');
Route::get('/delete/{id}', 'PengajuanController@destroy');


// Route::get('alert/{AlertType}','sweetalertController@alert')->name('alert')
// Route::get('/logout',function(){
// 	Auth::logout();
// 	return redirect('/');
// })->name('logout');
// Route::get('/register','RegisterController');

// Route::resource('contact','ContactController');
// Route::resource('group','GroupController');

// Route::post('import', 'ContactController@contactImport')->name('contact.import');
// Route::get('export', 'ContactController@contactExport')->name('contact.export');

Route::get('/home', 'HomeController@index')->name('home');
