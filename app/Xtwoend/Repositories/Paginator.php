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


interface Paginator
{
	/**
  	 * Get Results by Page
  	 *
  	 * @param int $page
  	 * @param int $limit
  	 * @param array $with
  	 * @return StdClass Object with $items and $totalItems for pagination
  	 */
  	public function getByPage($page = 1, $limit = 10, $with = array());

}