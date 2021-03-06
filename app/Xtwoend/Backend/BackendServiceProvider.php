<?php namespace Xtwoend\Backend;

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

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\ClassLoader;
use Xtwoend\Backend\Registrasi\Registrasi;

class BackendServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{	
		include __DIR__.'/filters.php';
		require_once __DIR__.'/routes.php';
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->addClassFolders();
	}
	
	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function addClassFolders()
	{	
		//load class
		ClassLoader::addDirectories(array(
			__DIR__ . '/controllers',
		));

		//register view
		app('view')->addLocation( __DIR__ . '/views');
    	app('view')->addNamespace('admin', __DIR__ . '/views');
	}
	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
