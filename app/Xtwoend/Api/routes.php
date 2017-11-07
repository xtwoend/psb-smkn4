<?php

/**
 * Route
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the MIT License.
 *
 * This source file is subject to the MIT License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://opensource.org/licenses/MIT
 *
 * @package    API
 * @version    1.0.0
 * @author     Abdul Hafidz A <aditans88@gmail.com>
 * @license    MIT License
 */


/**
 * OAuth Authorize
 * Authorize with OAuth2 Server & Sentry 2
 */
Route::group(['namespace'=>'Xtwoend\Api\V1'], function()
{
	
	Route::post('oauth/access_token', function()
	{
	    return AuthorizationServer::performAccessTokenFlow();
	});

	Route::get('oauth/authorize', array('before' => 'check-authorization-params|authSentry', function()
	{
	    // get the data from the check-authorization-params filter
	    $params = Session::get('authorize-params');

	    // get the user id
	    $params['user_id'] = \Sentry::getUser()->id;

	    // display the authorization form
	    return View::make('authorization-form', array('params' => $params));
	}));
		

	Route::resource('oauth', 'OAuthController');
});

/**
 * Resource Api
 *
 */
Route::group(['namespace'=>'Xtwoend\Api\V1','prefix' => 'api'], function()
{
	
});



