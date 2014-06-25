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

use StdClass;

abstract class AbstractRepository {
	
	  /**
   	 * @var Illuminate\Database\Eloquent\Model
   	 */
  	protected $model;


  	/**
   	 * Make a new instance of the entity to query on
   	 *
   	 * @param array $with
   	 */
  	public function make(array $with = array())
  	{
    	return $this->model->with($with);
  	}

  	/**
   	 * Retrieve all entities
   	 *
   	 * @param array $with
   	 * @return Illuminate\Database\Eloquent\Collection
   	 */
  	public function all(array $with = array())
  	{
    	$entity = $this->make($with);

    	return $entity->get();
  	}

  	/**
   	 * Find a single entity
   	 *
   	 * @param int $id
   	 * @param array $with
   	 * @return Illuminate\Database\Eloquent\Model
   	 */
  	public function find($id, array $with = array())
  	{
    	$entity = $this->make($with);

    	return $entity->find($id);
  	}


    /**
     * Find a single entity
     *
     * @param int $id
     * @param array $with
     * @return Illuminate\Database\Eloquent\Model
     */
    public function count(array $with = array())
    {
      $entity = $this->make($with);

      return $entity->count();
    }


  	/**
   	 * Search for many results by key and value
   	 *
   	 * @param string $key
   	 * @param mixed $value
   	 * @param array $with
   	 * @return Illuminate\Database\Query\Builders
   	 */
  	public function getBy($key, $value, array $with = array())
  	{
    	return $this->make($with)->where($key, '=', $value)->get();
  	}

    /**
     * Search for many results by key and value
     *
     * @param string $key
     * @param mixed $value
     * @param array $with
     * @return Illuminate\Database\Query\Builders
     */
    public function findBy($key, $value, array $with = array())
    {
      return $this->make($with)->where($key, '=', $value)->first();
    }


    /**
     * Search for many results by key and value
     *
     * @param string $key
     * @param mixed $value
     * @param array $with
     * @return Illuminate\Database\Query\Builders
     */
    public function getByOrderBy($limit , array $wheres = array(), array $orderby = array() , array $with = array())
    {
      
      $query = $this->make($with);

      if(is_array($wheres) and !empty($wheres)) 
      {
        foreach ($wheres as $key => $value) {
          $query->where($key, '=', $value);   
        } 
      }

      if(is_array($orderby) and !empty($orderby)) 
      {
        foreach ($orderby as $key => $value) {
         $query->orderBy($key, $value);
        }
      }
      return $query->take($limit)->get();
    }

    /**
     * Search for many results by key and value
     *
     * @param string $key
     * @param mixed $value
     * @param array $with
     * @return Illuminate\Database\Query\Builders
     */
    public function getSearch(array $search, array $with = array())
    { 
      $query = $this->make($with);
      if(is_array(!empty($search))){
        foreach ($search as $key => $value) {
          $query->orWhere($key, "LIKE", "%{$value}%");
        }
      }
      return $query;
    }

    /**
     * Sort for many results by key and value
     *
     * @param string $key
     * @param mixed $value
     * @param array $with
     * @return Illuminate\Database\Query\Builders
     */
    public function getSort(array $sort, array $with = array())
    { 
      $query = $this->make($with);
      if(is_array(!empty($sort))){
        foreach ($sort as $key => $value) {
          $query->orderBy($key, $value);
        }
      }
      return $query;
    }


    /**
     * Get Results by Page
     *
     * @param int $page
     * @param int $limit
     * @param array $with
     * @return StdClass Object with $items and $totalItems for pagination
     */
    public function getByPage($page = 1, $limit = 10, $with = array())
    {
      $result             = new StdClass;
      $result->page       = $page;
      $result->limit      = $limit;
      $result->totalItems = 0;
      $result->items      = array();

      $query = $this->make($with);

      $models = $query->skip($limit * ($page - 1))
                   ->take($limit)
                   ->get();

      $result->totalItems = $this->model->count();
      $result->items      = $models->all();

      return $result;
    }
}