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

// Route::patch('ubahpassword','Auth\AuthController@update');
Route::get('/ubahpassword','Auth\AuthController@ubahpassword');
Route::post('/ubahpassword/save','Auth\AuthController@updatepassword');


Auth::routes();
Route::get('/halamanAdmin','HalamanAdminController@index');
Route::get('/halamanKepala','HalamanKepalaController@index')->middleware('kepala');
Route::get('/halamanPegawai','HalamanPegawaiController@index')->middleware('pegawai');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('dashboard','DashboardController@index')->middleware('authlogin');
Route::get('/ajukancuti','AjukancutiController@index')->middleware('authlogin');
Route::get('/pengajuan','PengajuanController@index')->middleware('authlogin');
Route::post('/editdetail/{id}','PermohonancutiController@updateDetail')->name('updateDetail');
Route::post('/updatetindakan/{id}','PermohonancutiController@tambahAlasan');

Route::resource('/permohonancuti','PermohonancutiController')->middleware('kepala');
Route::get('/ubahstatus/{id}/{status}','PermohonancutiController@updateStatus');
Route::get('/detailcuti/{id}','PermohonancutiController@show')->middleware('kepala');

Route::get('/ubahstatus_ppk/{id}/{status_ppk}','PermohonancutiController@updateStatus_ppk')->middleware('kepala');
Route::post('/ajukancuti','AjukancutiController@store')->middleware('authlogin');
Route::get('/delete/{id}', 'PengajuanController@destroy')->middleware('authlogin');



Route::get('/ubahstatusbaca/{id}/{status_baca}','PengajuanController@updateStatusbaca');
// Route::get('/histori','HistoriController@histori');
Route::get('/cetak/{id}','PrintController@show');



Route::resource('/manajemenuser','ManajemenUserController');
Route::get('/daftarUser','ManajemenUserController@index');
Route::get('/daftarLibur','ManajemenUserController@libur');
Route::get('/hapuslibur/{id}','ManajemenUserController@destroy');
Route::get('/perbaharuilibur/{id}','ManajemenUserController@hapuslibur');
Route::post('/tambahlibur','ManajemenUserController@store');
Route::get('/profile','ManajemenUserController@profileuser');
// Route::get('alert/{AlertType}','sweetalertController@alert')->name('alert')
// Route::get('/logout',function(){


Route::get('/home', 'HomeController@index')->name('home');
