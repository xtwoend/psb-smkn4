<?php namespace Xtwoend\Repositories;

/**
 * Repository Service Provider
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the MIT License.
 *
 * This source file is subject to the MIT License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://opensource.org/licenses/MIT
 *
 * @package    Repository
 * @version    1.0.0
 * @author     Abdul Hafidz A <aditans88@gmail.com>
 * @license    MIT License
 */


use Illuminate\Support\ServiceProvider;
use Xtwoend\Repositories\Registrasi\EloquentRegistrasiRepository;


class RepositoryServiceProvider extends ServiceProvider
{
	/**
   	 * Register Repo
     */
  	public function register()
  	{
    	$this->registerRegistrasiRepository();
  	}



  	/**
  	 * bind registrasi repository
  	 */
  	public function registerRegistrasiRepository()
  	{
  		$this->app->bind('Xtwoend\Repositories\Registrasi\RegistrasiRepository', function($app)
	    {
            //Create Eloquent Repository
            $model = 'Xtwoend\Models\Eloquent\Registrasi';
            $class = '\\'.ltrim($model, '\\');  
            return new EloquentRegistrasiRepository( new $class );
        });
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





