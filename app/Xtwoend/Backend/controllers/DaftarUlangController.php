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

//use Xtwoend\Models\Eloquent\Pendaftar;
use Xtwoend\Models\Eloquent\Registrasi as Pendaftar;
use Xtwoend\Models\Eloquent\Nilai;


class DaftarUlangController extends BaseController
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
		return $this->theme->of('admin::daftarulang.index')->render();
	}

	public function show($id)
	{
		//add printstyle.css
    	$this->theme->asset()->usePath()->add('print-style', 'css/printstyle.css');

    	$this->theme->setTitle('Daftar Ulang');
    	$pendaftar = Pendaftar::find($id);
    	$data['pendaftar'] = $pendaftar;
		return $this->theme->of('admin::daftarulang.printform', $data )->render();
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
	        		return $model->pilihan_1;
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

	//peroses peninputan nilai
	/**
	 * show form input nilai
	 * @return void;
	 */
	public function create()
	{
		$this->theme->setTitle('Cari berdasarkan nomor pendaftaran');
		return $this->theme->of('admin::daftarulang.searchform')->render();
	}

	/**
	 * show form input nilai
	 * @return void;
	 */
	public function searchByNomorPendaftaran()
	{
		$rules = array(
			'nomor_pendaftaran' => 'required|exists:pendaftars,nomor_pendaftaran',
		);
	    $validator = \Validator::make(Input::all(), $rules);

	    if ($validator->passes())
	    {	
	    	$pendaftar = Pendaftar::where('nomor_pendaftaran','=',Input::get('nomor_pendaftaran'))->where('status_diterima','=',1)->first();
	       	if($pendaftar) return Redirect::route('admin.daftarulang.edit', array('id' => $pendaftar->id));
	       	return Redirect::route('admin.daftarulang.create')->withInput()->withErrors(array('errors'=>'Peserta Tidak Diterima'));
	    }
		return Redirect::route('admin.daftarulang.create')->withInput()->withErrors($validator);	
	}

	/**
	 * Proses
	 * @return void;
	 */
	public function edit($id)
	{	
		// Dependency with.
		$dependencies = array('jquery');

		// Writing an in-line script.
		$this->theme->asset()->writeScript('inline-script', '
		    $(function() {
		        $("#nilai_pil_1").focus();
		    })
		', $dependencies);

		$this->theme->setTitle('Daftar Ulang');
		return $this->theme->of('admin::daftarulang.input',['register'=>Pendaftar::find($id)])->render();
	}

	/**
	 * Proses
	 * @return void;
	 */
	public function update($id)
	{
		$data = Input::only('daftarulang','biodata','spot','spcs','spttn','spd');
		$pendaftar = Pendaftar::find($id);
		$pendaftar->fill($data);
		$pendaftar->save();
		return Redirect::route('admin.daftarulang.show', array('id'=> $id));
	}


	public function export()
	{
		return $this->registrasi->toUpload();
	}
}