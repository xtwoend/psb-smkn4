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


interface CrudInterface {
	
	public function create(array $attributes);
 
	public function find($id, array $with = array());

	public function update($id, array $input);
 	
 	public function delete($id);

	public function destroy($ids);
}