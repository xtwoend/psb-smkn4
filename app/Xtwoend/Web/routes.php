<?php

/**
 * Route Web Frontend
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the MIT License.
 *
 * This source file is subject to the MIT License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://opensource.org/licenses/MIT
 *
 * @package    Web Frontend
 * @version    1.0.0
 * @author     Abdul Hafidz A <aditans88@gmail.com>
 * @license    MIT License
 */

Route::group(['namespace'=>'Xtwoend\Web\Controllers'], function()
{
	Route::get('/', 'HomeController@index');
});

Route::post('/test', function(){
	$date = Input::get('tanggal_lahir');
	return \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
});