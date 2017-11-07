<?php namespace Xtwoend\Registrasi;

/**
 * Registrasi
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


use Xtwoend\Repositories\Registrasi\RegistrasiRepository;
use Xtwoend\Registrasi\Validators\CreateValidator;
use Xtwoend\Registrasi\Validators\EditValidator;
use Xtwoend\Registrasi\Validators\FindByNomorPendaftaranValidator;
use Xtwoend\Validators\Validable;
use Carbon\Carbon;
use Cartalyst\Sentry\Facades\Laravel\Sentry;

use Xtwoend\Models\Eloquent\Registrasi as Pendaftar;

use Exception;
use Illuminate\Support\MessageBag;
use Illuminate\View\Factory as View;


class Registrasi
{	

	/**
   	 * The UserRepository
   	 *
   	 * @param Cribbb\Repositories\User\UserRepository
   	 */
  	protected $registerRepository;

  	/**
   	 * The errors MesssageBag instance
   	 *
   	 * @var Illuminate\Support\MessageBag
   	 */
  	protected $errors;

  	/**
   	 * An array of Validable classes
   	 *
   	 * @param array
   	 */
  	protected $validators;

    /** 
     * view handle
     * @return void
     */
    protected $view;

    /**
     * Excell
     */
    protected $excel;

    /**
     * Pdf
     */
    protected $pdf;


  	public function __construct(RegistrasiRepository $registerRepository, View $view)
  	{
  		$this->registerRepository = $registerRepository;
    	$this->errors = new MessageBag;
  	  $this->view = $view;
      $this->excel = new ExportExcel($view);
      $this->pdf = new ExportPDF($view);
    }

  	public function find($id)
  	{
  		return $this->registerRepository->find($id);
  	}

    public function findBy($attribute, $value)
    {
      return $this->registerRepository->findBy($attribute, $value);
    }

  	public function create(array $data)
  	{	
  		if($this->runCreateValidator($data))
    	{  
        $data['tanggal_lahir']  = Carbon::createFromFormat('d/m/Y', $data['tanggal_lahir'])->format('Y-m-d');
        $data['user_id']        = Sentry::getUser()->id;
        $data['nomor_pendaftaran']  = $this->getGenateNumber();
        $data['total_un']       = ($data['nilai_mtk'] + $data['nilai_ing'] + $data['nilai_ind'] + $data['nilai_ipa']);
        return $this->registerRepository->create($data);
    	}
  	}

  	public function update($id, array $data)
  	{	
  		if($this->runEditValidator($data))
    	{ 
        $data['tanggal_lahir']  = Carbon::createFromFormat('d/m/Y', $data['tanggal_lahir'])->format('Y-m-d');
        $data['user_id']        = Sentry::getUser()->id;
        $data['total_un']       = ($data['nilai_mtk'] + $data['nilai_ing'] + $data['nilai_ind'] + $data['nilai_ipa']);
  			return $this->registerRepository->update($id, $data);
  		}
  	}

    public function setTerima($id, array $data)
    {
      return $this->registerRepository->update($id, $data);
    }

    public function resetTerima($id, array $data)
    {
      return $this->registerRepository->update($id, $data);
    }


    public function count()
    {
      return $this->registerRepository->count();
    }

    public function inputnilai($id, array $data)
    { 
      return $this->registerRepository->update($id, $data);
    }

  	public function destroy($ids)
  	{
  		return is_array($ids)? $this->registerRepository->destroy($ids) : $this->registerRepository->delete($ids);
  	}

  	public function getSearch(array $params)
  	{
  		return $this->registerRepository->getSearch($params);
  	}

    public function getByOrderBy($limit, array $wheres, array $orderby)
    {
      return $this->registerRepository->getByOrderBy($limit, $wheres, $orderby);
    }

    public function getGreadeOrderBy($limit, array $wheres, array $orderby)
    {
      return $this->registerRepository->getGreadeOrderBy($limit, $wheres, $orderby);
    }
    public function getGenateNumber()
    {
      $in = $this->registerRepository->maxId();
      $len = 4;
      $len_in = strlen($in);
      $zero_len = $len - $len_in;
      $zero = "";
      for($i=1;$i<=$zero_len;$i++)
      {
          $zero .= '0';
      }
      return '9'.$zero.$in + 1; 
    }

    public function pdf($id)
    {
      $data =  $this->registerRepository->find($id);      
      return $this->pdf->setContent($data)->show();
      
    }


    public function ExportToExcell()
    {
      $registerdata = $this->registerRepository->all();
      return  $this->excel->makeUmum($registerdata)->download();   
    }

    public function toUpload()
    {
      $registerdata = $this->registerRepository->getByOrderBy(1000, array('terima_3' => 1, 'daftarulang' => 1));
      return  $this->excel->makeTemplate($registerdata)->download(); 

    }


    public function UmumToUpload()
    {
      $umum = Pendaftar::where('keterangan','DAFTAR')->orderBy('nomor_pendaftaran', 'asc')->get();
      return  $this->excel->makeUmum($umum)->download(); 

    }


  	/**
   	 * Run the validation checks on the input data
   	 *
   	 * @param array $data
   	 * @return bool
   	 */
  	public function runCreateValidator(array $data)
  	{
  		$validator = new CreateValidator();

  		if($validator instanceof Validable)
  		{
	  		if(! $validator->with($data)->passes())
        {
	         	$this->errors->merge($validator->errors());  
        }
      }
      else
      {
        throw new Exception("{$validator} is not an instance of Cribbb\Validiators\Validable");
      }

    	if($this->errors->isEmpty())
    	{
      		return true;
    	}
  	}

  	/**
   	 * Run the validation checks on the input data
   	 *
   	 * @param array $data
   	 * @return bool
   	 */
  	public function runEditValidator(array $data)
  	{
  		$validator = new EditValidator();

  		if($validator instanceof Validable){

	  		if(! $validator->with($data)->passes())
        {
	         $this->errors->merge($validator->errors());
        }
      }
      else
      {
        	throw new Exception("{$validator} is not an instance of Cribbb\Validiators\Validable");
      }

	    if($this->errors->isEmpty())
	   	{
	      	return true;
	    }
  	}

  	public function errors()
  	{
  		return $this->errors;
  	}
}


