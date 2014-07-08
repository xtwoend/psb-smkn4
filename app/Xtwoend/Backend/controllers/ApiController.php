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
use Xtwoend\Models\Eloquent\OauthClient; 
use Xtwoend\Models\Eloquent\OauthClientEndpoint; 
use Xtwoend\Models\Eloquent\OauthScope;

class ApiController extends BaseController
{
	public function __construct()
	{	
		parent::__construct();
	}

	public function index()
	{
		$this->theme->setTitle('Manage Your API');
		return $this->theme->of('admin::api.index')->render();
	}


	public function create()
	{
		$this->theme->setTitle('Create New API ID');
		return $this->theme->of('admin::api.create')->render();
	}

	public function datatable()
	{
		$OauthClient = OauthClient::with('oauth_client_endpoints')->all();
		return Datatable::query($OauthClient)
	        ->showColumns('name','id','secret')
	        ->addColumn('uri', function($model)
	        	{
					return $model->endpoint()->first()->redirect_uri;
	        	}
	        )
	        ->searchColumns('name')
	        ->orderColumns('name')
	        ->make();
	}

	public function store()
	{	
		$endpoint = new OauthClientEndpoint(array('redirect_uri'=> Input::get('redirect_uri')));

		$client = new OauthClient;
		$client->fill(Input::all());
		$client->save();
		$client->endpoint()->save($endpoint);

		return Redirect::route('admin.api.index');
	}
}