<?php namespace Xtwoend\Backend\Controllers;

/**
 * Backend App
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



use View, Input, Response, Redirect;

use Cartalyst\Sentry\Facades\Laravel\Sentry;

class AuthController extends BaseController
{
	public function index()
	{
		return $this->theme->layout('login')->of('admin::auth.login')->render();
	}

	public function store()
	{
		try {
			$credentials = Input::only(array('username', 'password'));
			$remember	= Input::get('remember', false);
			$user = Sentry::authenticate($credentials, $remember);
			
			return Redirect::to('admin');
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
		    return 'Login field is required.';
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
		    return 'Password field is required.';
		}
		catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
		{
		    return 'Wrong password, try again.';
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    return 'User was not found.';
		}
		catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
		    return 'User is not activated.';
		}
		// The following is only required if the throttling is enabled
		catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
		{
		    return 'User is suspended.';
		}
		catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
		{
		    return 'User is banned.';
		}
	}

	public function logout()
	{
		Sentry::logout();
		return Redirect::to('admin/login');
	}
}