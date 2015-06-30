<?php namespace Xtwoend\Repositories\Registrasi;

/**
 * Repo
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

use Xtwoend\Repositories\AbstractRepository;
use Xtwoend\Repositories\CrudInterface;
use Xtwoend\Repositories\Repository;
use Xtwoend\Repositories\Paginator;
use Illuminate\Database\Eloquent\Model;

class EloquentRegistrasiRepository extends AbstractRepository implements Repository, CrudInterface, Paginator,  RegistrasiRepository
{   
    /**
     * Construct
     *
     * @param Illuminate\Database\Eloquent\Model $user
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function update($id, array $input)
    {
        $entity = $this->model->find($id);
        
        $entity->fill($input);
        
        return $entity->save(); 
    }

    public function delete($id)
    {    
        $register = $this->model->find($id);
        
        if($register)
        {
            return $register->delete();
        }
    }
    
    public function destroy($ids){
        return $this->model->destroy($ids);
    }
    
    public function other()
    {
        # code...
    }

    public function maxId()
    {
        return $this->model->max('id');
    }

    /**
     * Search for many results by key and value
     *
     * @param string $key
     * @param mixed $value
     * @param array $with
     * @return Illuminate\Database\Query\Builders
     */
    public function getGreadeOrderBy($limit , array $wheres = array(), array $orderby = array() , array $with = array())
    {
      
      $query = $this->make($with);
      
      if(is_array($wheres) and !empty($wheres)) 
      {
        $query->where(function($q) use ($wheres){
          $q->where('pilihan_1', $wheres['pilihan_1']);
          $q->orWhere(function($w) use ($wheres){
            $w->whereIn('pilihan_1', [3, 1, 4])->where('pilihan_2', $wheres['pilihan_2']);
            //$w->where('pilihan_2', $wheres['pilihan_2']);
          });
        });
      }
      
      $query->where('keterangan', 'DAFTAR');
      $query->where('gelombang', '<>', 0);
      $query->where('status_sekolah', '=', 2);
      $query->where('terima_1', 0);

      /*
      $query->where(function($q){
            //$q->where('pilihan_1', '<>', 4);
            $q->where('terima_1', '=', 0);
            $q->where('terima_2', '=', 0);
        });
        */
      //$query->where('terima_3', '=', 0);
      
      if(is_array($orderby) and !empty($orderby)) 
      {
        foreach ($orderby as $key => $value) {
         $query->orderBy($key, $value);
        }
      }
      return $query->take($limit)->get();
    }
}