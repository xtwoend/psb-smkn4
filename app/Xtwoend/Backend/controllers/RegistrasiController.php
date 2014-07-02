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

use Xtwoend\Validators\Registrasi\RegistrasiCreateValidator;
use Xtwoend\Registrasi\Registrasi;

use View, Form, Input, Response, Redirect, Request;
use Illuminate\Support\MessageBag;
use Chumper\Datatable\Facades\DatatableFacade as Datatable;
use Thujohn\Pdf\PdfFacade as PDF;



class RegistrasiController extends BaseController
{	
	/**
	 * set Model Registrasi
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
	public function __construct(Registrasi $registrasi)
	{	
		$this->registrasi = $registrasi;
		$this->errors = new MessageBag;
		parent::__construct();
	}

	/**
	* Index
	*/
	public function index()
	{	
		//add javascript
		$this->theme->asset()->container('footer')->usePath()->add('datatables', 'js/plugins/datatables/jquery.dataTables.js');
		$this->theme->asset()->container('footer')->usePath()->add('datatables-bootstrap', 'js/plugins/datatables/dataTables.bootstrap.js');
		//add css
		$this->theme->asset()->usePath()->add('datatables-css', 'css/datatables/dataTables.bootstrap.css');

		$this->theme->setTitle('Registrasi');
		
		return $this->theme->of('admin::registrasi.index')->render();
	}

	/**
	* Datatable datagrid
	* @return json
	*/
	public function getDatatable()
	{	
		$register = $this->registrasi->getSearch(['nama'=>Input::get('sSearch'), 'alamat'=>Input::get('sSearch')]);
		return Datatable::query($register)
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
	        ->addColumn('operator',function($model)
		       	{	
		            return $this->buttonOpertor($model);
		        }
		    )
	        ->searchColumns('nomor_pendaftaran','nomor_ujian','nama','alamat')
	        ->orderColumns('id','nama', 'domisili' ,'pilihan_1')
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
	* BUtton Operator
	* @return void
	*/
	private function buttonOpertor($model)
	{	
		$button  = Form::open(array('route' => array('admin.registrasi.destroy', $model->id), 'method' => 'delete'));
		$button .= "<a href='" . route('admin.registrasi.show', $model->id) ."' class='btn btn-danger btn-xs' > View </a> ";
		$button .= "<a href='" . route('admin.registrasi.edit', $model->id) ."' class='btn btn-danger btn-xs' > Edit </a> ";
        $button .= "<button type='submit' class='btn btn-danger btn-xs'>Delete</button>";
    	$button .= Form::close();

    	return $button;	
    }

    /**
     * show single data
     * @return void
     */
    public function show($id)
    {
    	//add printstyle.css
    	$this->theme->asset()->usePath()->add('print-style', 'css/printstyle.css');

    	$this->theme->setTitle('Registrasi');
    	$pendaftar = $this->registrasi->find($id);
    	$data['pendaftar'] = $pendaftar;
		return $this->theme->of('admin::registrasi.printform', $data )->render();
    }

	/**
	* New Registrasi
	* @return void
	*/
	public function create()
	{	
		//add javascript
		$this->addJsMask();

		$this->theme->setTitle('Form Registrasi');
		return $this->theme->of('admin::registrasi.create')->render();
	}

	/**
	* Save Registrasi
	* @return void
	*/ 
	public function store()
	{	
		$registrasi =  $this->registrasi->create(Input::all());
		if($registrasi){
			return Redirect::route('admin.registrasi.show',array('id'=>$registrasi->id));
		}
		return Redirect::route('admin.registrasi.create')->withInput()
														->withErrors($this->registrasi->errors());
	}

	/**
	* Save Registrasi
	* @return void
	*/
	public function edit($id)
	{	
		$this->addJsMask();
		$this->theme->setTitle('Form Registrasi');
		return $this->theme->of('admin::registrasi.edit',['register'=>$this->registrasi->find($id)])->render();
	}

	/**
	* Save Registrasi
	* @return void
	*/
	public function update($id)
	{	
		$registrasi =  $this->registrasi->update($id, Input::all());
		if($registrasi){
			return Redirect::route('admin.registrasi.show',array('id'=>$id));
		}
		return Redirect::route('admin.registrasi.edit', array($id))->withInput()
														->withErrors($this->registrasi->errors());
	}

	/**
	* Save Registrasi
	* @return void
	*/
	public function destroy($id)
	{	
		$this->registrasi->destroy($id);
		return Redirect::to('admin/registrasi');
	}

	/**
	* Export Pdf
	* @return void
	*/
	public function pdf($id)
	{	
    	return $this->registrasi->pdf($id);
	}


	/**
	* Export Excel
	* @return void
	*/
	public function toExcel()
	{
		return $this->registrasi->ExportToExcell();
	}

	/**
	 * js
	 */
	public function addJsMask()
	{
		//add javascript
		$this->theme->asset()->container('footer')->usePath()->add('input-mask', 'js/plugins/input-mask/jquery.inputmask.js');
		$this->theme->asset()->container('footer')->usePath()->add('input-mask-date-ext', 'js/plugins/input-mask/jquery.inputmask.date.extensions.js');
		$this->theme->asset()->container('footer')->usePath()->add('input-mask-ext', 'js/plugins/input-mask/jquery.inputmask.extensions.js');
		$this->theme->asset()->container('footer')->writeScript('inline-script', '
		    $(document).ready(function(){
				$(":input").inputmask();  
		    })');
		
	}

}