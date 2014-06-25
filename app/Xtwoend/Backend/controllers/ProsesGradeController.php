<?php namespace Xtwoend\Backend\Controllers;

/**
 * Register Controller
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

use Xtwoend\Prosesgrade\Prosesgrade;
use Xtwoend\Registrasi\Registrasi;

use View, Form, Input, Response, Redirect, Request;
use Illuminate\Support\MessageBag;
use Chumper\Datatable\Facades\DatatableFacade as Datatable;

class ProsesGradeController extends BaseController
{	
	/**
	 * set 
	 */
	protected $prosesgrade;

	/**
	 * set 
	 */
	protected $registrasi;

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
	 * add sript in registrasi
	 */
	public function __construct(Prosesgrade $prosesgrade, Registrasi $registrasi)
	{	
		$this->prosesgrade = $prosesgrade;
		$this->registrasi = $registrasi;
		$this->errors = new MessageBag;
		parent::__construct();
	}

	public function index()
	{	
		//add javascript
		$this->theme->asset()->container('footer')->usePath()->add('datatables', 'js/plugins/datatables/jquery.dataTables.js');
		$this->theme->asset()->container('footer')->usePath()->add('datatables-bootstrap', 'js/plugins/datatables/dataTables.bootstrap.js');
		//add css
		$this->theme->asset()->usePath()->add('datatables-css', 'css/datatables/dataTables.bootstrap.css');


		$this->theme->setTitle('Passing grade sementara berdasarkan wilayah dan pilihan 1');
		return $this->theme->of('admin::grade.index')->render();
	}

	public function show($id)
	{
		
	}

	public function dataGradeSementara()
	{
		$data = $this->prosesgrade->getGradeSementara();
		return Datatable::query($data)
	        ->showColumns('id','nomor_pendaftaran' , 'nomor_ujian', 'nama', 'tanggal_lahir')
	        ->addColumn('domisili', function($model)
	        	{
	        		return $model->domisili_to_string;
	        	}
	        )
	        ->addColumn('total_un', function($model)
	        	{
	        		return $model->total_un;
	        	}
	        )
	        ->addColumn('pilihan_1', function($model)
	        	{
	        		return $model->pilihan_1_string;
	        	}
	        )
	        ->searchColumns('nama','domisili','total_un','pilihan_1')
	        //->orderColumns('id','nama','domisili','total_un','pilihan_1')
	        ->make();
		
	}
	
	/**
	* Datatable datagrid
	* @return string
	*/
	private function domisiliView($id)
	{
		switch ($id) {
			case 1:
				return 'RT';
				break;
			case 2:
				return 'RW';
				break;
			case 3:
				return 'KELURAHAN';
				break;
			case 4:
				return 'KECAMATAN';
				break;
			default:
					return 'Domisili Tidak Dipilih';
				break;
		}
	}

	/**
	 * Proses
	 * @return void;
	 */
	public function proses()
	{	
		//set default not show tabel
		$data['show'] = false;

		if (Request::isMethod('post'))
		{	
			Input::flashOnly('pilihan','jurusan', 'limit');

		    $rules = array(
				'limit' => 'required|numeric',
			);
		    $validator = \Validator::make(Input::all(), $rules);
		    if ($validator->fails())
		    {	
		    	return Redirect::route('admin.prosesgrade.proses')->withInput()->withErrors($validator);
		    	
		    }
		    //sort by nilai pilihan
		    switch (Input::get('pilihan')) {
		    	case 'pilihan_1':
		    			$nilai = 'nilai_pil_1';
		    		break;
		    	case 'pilihan_2':
		    			$nilai = 'nilai_pil_2';
		    		break;
		    	case 'pilihan_3':
		    			$nilai = 'nilai_pil_3';
		    		break;
		    	case 'pilihan_4':
		    			$nilai = 'nilai_pil_4';
		    		break;
		    	default:
		    			$nilai = 'nilai_pil_1';
		    		break;
		    }
		   	$hasil = $this->registrasi->getByOrderBy(
		    										Input::get('limit'), 
		    										array(Input::get('pilihan') => Input::get('jurusan')), 
		    										array( $nilai => 'desc', 'tanggal_lahir' => 'asc', 'domisili'=>'asc')
		    										);
		   	//
		   	if(Input::get('button') === 'proses' ){
		   		foreach ($hasil as $row) {
		   			$this->registrasi->setTerima($row->id, array('terima_1' => 1));		
		   		}
		   	}
		   	if(Input::get('button') === 'reset' ){
		   		foreach ($hasil as $row) {
		   			$this->registrasi->setTerima($row->id, array('terima_1' => 0));		
		   		}
		   	}
		    
		    $data['pendaftars'] = $hasil;
		    if(count($hasil) > 0) {
		    	 $data['show'] = true;
		    }

		}

		$this->theme->setTitle('Peroses Pengurutan');
		return $this->theme->of('admin::grade.proses',$data)->render();
	}

	/**
	 * Proses
	 * @return void;
	 */
	public function inputnilai()
	{
		$this->theme->setTitle('Passing grade sementara berdasarkan wilayah dan pilihan 1');
		return $this->theme->of('admin::grade.formnilai')->render();
	}
}