<?php namespace Xtwoend\Prosesgrade;

/**
 * Proses Grade Package
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
use Xtwoend\Prosesgrade\Prosesgrade;
use Xtwoend\Registrasi\Registrasi;

class ProsesgradeServiceProvider extends ServiceProvider {

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
		
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->registerProsesgrade();
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function registerProsesgrade()
	{
		$this->app->bind('prosesgrade', function($app)
	    {
	      return new Prosesgrade($app['registrasi']);
	    });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('prosesgrade');
	}

}
