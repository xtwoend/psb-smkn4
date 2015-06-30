<?php

/**
 * Route Backend App
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the MIT License.
 *
 * This source file is subject to the MIT License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://opensource.org/licenses/MIT
 *
 * @package    Backend
 * @version    1.0.0
 * @author     Abdul Hafidz A <aditans88@gmail.com>
 * @license    MIT License
 */

Route::group(['namespace'=>'Xtwoend\Backend\Controllers','prefix' => 'admin', 'before'=> 'authSentry'], function()
{
	Route::get('/', ['as' =>'dashboard', 'uses' => 'DashController@index']);

	//registrasi mode
	Route::get('api/registrasi/datatable', ['as'=>'admin.registrasi.datatable', 'uses'=>'RegistrasiController@getDatatable']);
	Route::get('registrasi/pdf/{id}', ['as'=>'admin.registrasi.pdf', 'uses'=>'RegistrasiController@pdf']);
	Route::get('registrasi/toexcel', ['as'=> 'admin.registrasi.toexcel', 'uses'=> 'RegistrasiController@toExcel']);
	Route::get('registrasi/import',['as'=> 'admin.registrasi.import', 'uses'=> 'UploadController@create']);
	Route::resource('registrasi', 'RegistrasiController');
	
	//passing grade jalur domisili
	Route::get('api/prosesgrade/datatable', ['as'=>'admin.prosesgrade.datatable', 'uses'=>'ProsesGradeController@dataGradeSementara']);
	Route::any('prosesgrade/proses', ['as'=> 'admin.prosesgrade.proses', 'uses'=> 'ProsesGradeController@proses']);
	Route::get('prosesgrade/umumexport', ['as'=> 'admin.prosesgrade.umumexport', 'uses'=> 'ProsesGradeController@umumexport']);
	Route::get('prosesgrade/prosesnilai', ['as'=> 'admin.prosesgrade.prosesnilai', 'uses' => 'ProsesGradeController@prosesnilai']);
	Route::resource('prosesgrade', 'ProsesGradeController', array('only' => array('index', 'show')));

	//passing input nilai
	Route::get('api/nilaitest/datatable', ['as'=>'admin.nilaitest.datatable', 'uses'=>'NilaiTestController@dataGradeSementara']);
	Route::post('nilaitest/search', ['as'=> 'admin.nilaitest.search' , 'uses' => 'NilaiTestController@searchByNomorPendaftaran']);
	Route::resource('nilaitest', 'NilaiTestController', array('only' => array('index', 'show', 'update', 'edit', 'create')));

	//daftar ulang
	Route::post('daftarulang/search', ['as'=> 'admin.daftarulang.search' , 'uses' => 'DaftarUlangController@searchByNomorPendaftaran']);
	Route::get('daftarulang/export', ['as'=> 'admin.daftarulang.export', 'uses' => 'DaftarUlangController@export']);
	Route::resource('daftarulang', 'DaftarUlangController', array('only' => array('index', 'show', 'update', 'edit', 'create')));

	Route::get('logout', ['as' =>'logout', 'uses' =>'AuthController@logout']);

	Route::post('upload/proses', ['as'=> 'admin.registrasi.upload', 'uses'=> 'UploadController@upload']);
	Route::resource('upload', 'UploadController');


	//api manage
	Route::get('admin/api/datatable', ['as'=>'admin.api.datatable', 'uses'=>'ApiController@datatable']);
	Route::resource('api', 'ApiController');

});

Route::group(['namespace'=>'Xtwoend\Backend\Controllers','prefix' => 'admin', 'before'=> 'guest'], function()
{
	Route::get('login', [ 'as' =>'login', 'uses' => 'AuthController@index']);
	Route::post('login', ['as' =>'login', 'uses' => 'AuthController@store']);
});