<?php namespace Xtwoend\Repositories;

/**
 * CRUD Interface
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the MIT License.
 *
 * This source file is subject to the MIT License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://opensource.org/licenses/MIT
 *
 * @package    Repo
 * @version    1.0.0
 * @author     Abdul Hafidz A <aditans88@gmail.com>
 * @license    MIT License
 */


interface Repository
{
	/**
	 * Retrieve all entities
	 *
	 * @param array $with
	 * @return Illuminate\Database\Eloquent\Collection
	 */
	public function all(array $with = array());

	/**
	 * Search by key and value
	 *
	 * @param string $key
	 * @param mixed $value
	 * @param array $with
	 * @return Illuminate\Database\Query\Builders
	*/
	public function getBy($key, $value, array $with = array());

}