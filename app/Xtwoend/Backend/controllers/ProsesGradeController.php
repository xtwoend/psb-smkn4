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

use Chumper\Datatable\Facades\DatatableFacade as Datatable;
use Illuminate\Support\MessageBag;
use View, Form, Input, Response, Redirect, Request;
use Xtwoend\Models\Eloquent\Jurusan;
use Xtwoend\Prosesgrade\Prosesgrade;
use Xtwoend\Registrasi\Registrasi;
use Xtwoend\Models\Eloquent\Registrasi as EloquentRegistrasi;

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


		$this->theme->setTitle('Passing grade sementara');
		return $this->theme->of('admin::grade.index')->render();
	}

	public function show($id)
	{
		
	}

	public function dataGradeSementara()
	{
		$data = $this->prosesgrade->getGradeSementara();

		return Datatable::query($data)
	        ->showColumns('id','nomor_pendaftaran' , 'nomor_ujian', 'nama', 'tanggal_lahir','total_un','nilai_tes','nilai_pil_1')
	       /*
	        ->addColumn('nilai_un', function($model)
	        	{
	        		return $model->total_un;
	        	}
	        )
	        ->addColumn('nilai_test', function($model)
	        	{
	        		return $model->nilai_pil_3;
	        	}
	        )
	        ->addColumn('nilai', function($model)
	        	{
	        		return $model->nilai_pil_4;
	        	}
	        )
	        */
	        ->addColumn('pilihan_1', function($model)
	        	{
	        		return $model->pilihan_1_string;
	        	}
	        )
	        ->addColumn('pilihan_2', function($model)
	        	{
	        		return $model->pilihan_2_string;
	        	}
	        )
	        ->addColumn('diterima', function($model){
	        	$terima = [1 => 'DI PILIHAN 1', 2 => 'DI PILIHAN 2', 0=> 'TIDAK DITERIMA'];
	        	return isset($terima[$model->terima_di])? $terima[$model->terima_di]: '';
	        })
	        ->searchColumns('nama', 'nomor_pendaftaran', 'total_un','pilihan_1')
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
			Input::flashOnly('pilihan_1','pilihan_2', 'limit');

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
		    	default:
		    			$nilai = 'nilai_pil_1';
		    		break;
		    }
		    
		   	$hasil = $this->registrasi->getGreadeOrderBy(
		    										Input::get('limit'), 
		    										array('pilihan_1' => Input::get('pilihan_1'), 'pilihan_2' => Input::get('pilihan_2') ), 
		    										array($nilai => 'desc', 'tanggal_lahir' => 'asc')
		    										);
		   
		   	
		   	//
		   	// if(Input::get('button') === 'proses_1' ){
		   	// 	foreach ($hasil as $row) {
		   	// 		// $diterima = ($row->pilihan_1 <> Input::get('pilihan_1'))? 2 : 1;
		   	// 		// $this->registrasi->setTerima($row->id, array('terima_1' => 1, 'terima_di' => $diterima));	
		   	// 		$this->registrasi->setTerima($row->id, array('terima_1' => Input::get('pilihan_1'), 'terima_di' => 1));		
		   	// 	}
		   	// }
		   	
		   	// if(Input::get('button') === 'proses_2' ){
		   	// 	foreach ($hasil as $row) {
		   	// 		$this->registrasi->setTerima($row->id, array('terima_2' => Input::get('pilihan_2'), 'terima_di' => 2));		
		   	// 	}
		   	// }

		   	// if(Input::get('button') === 'reset' ){
		   	// 	foreach ($hasil as $row) {
		   	// 		$this->registrasi->setTerima($row->id, array('terima_1' => 0, 'terima_di' => 0));		
		   	// 	}
		   	// }
		    
		    $data['pendaftars'] = $hasil;
		    if(count($hasil) > 0) {
		    	 $data['show'] = true;
		    }

		}

		$this->theme->setTitle('Peroses Pengurutan');
		return $this->theme->of('admin::grade.proses',$data)->render();
	}

	/**
	 * Proses Bobot Nilai
	 * @return [type] [description]
	 */
	public function prosesnilai()
	{	
		$result = \DB::statement("UPDATE `pendaftars` SET nilai_pil_1 =  ((`total_un` * 0.6) + ((nilai_tes * 4) * 0.4)) / 4, nilai_pil_2 =  ((`total_un` * 0.6) + ((nilai_tes * 4) * 0.4)) / 4 ");
		// UPDATE `pendaftars` SET //(((((`nilai_benar`*5)+(`nilai_salah`*-1))/250)*400)*0.4)
		if($result) return Redirect::to('admin/prosesgrade/proses');

		return Redirect::to('admin/prosesgrade')->withErrors(array('errors'=>'proses tidak bisa di proses'));
	}

	/**
	 * Proses
	 * @return void;
	 */
	public function inputnilai()
	{
		$this->theme->setTitle('Passing grade sementara');
		return $this->theme->of('admin::grade.formnilai')->render();
	}

	public function umumexport()
	{
		return $this->registrasi->UmumToUpload();
	}

	public function prosesRun()
	{
		foreach (Jurusan::all() as $row) 
		{	
			echo 'proses urutan 1';
			echo 'Jurusan '. $row->jurusan . ' Jumlah ' . $row->quota_umum;

			$grade1 = EloquentRegistrasi::where('pilihan_1', $row->id)
				->where('terima_1', 0) // pilih yang belum di set
				->where('terima_2', 0) // pilih yang belum di set 
				->where('status_diterima', 0) // mark jalur prestasi
				->where('proses_1', 0) // mark proses loop 1
				->where('proses_2', 0) // mark proses loop 1
				->where('nilai_tes', '>', 0)
				->orderBy('nilai_pil_1', 'desc')
				->orderBy('tanggal_lahir', 'asc')
				->limit($row->quota_umum)
				->lists('id');
			
			EloquentRegistrasi::whereIn('id', $grade1)->update(['terima_1' => $row->id, 'proses_1' => 1]);

			// foreach($grade1 as $sis)
			// {	
			// 	echo 'No. ' . $i++;
			// 	$sis->terima_1 = $row->id;
			// 	$sis->proses_1 = 1;
			// 	// $sis->terima_3 = $i++;
			// 	$sis->save();
			// }

			// $grade3 = EloquentRegistrasi::where(function($q) use ($row){
			// 		$q->where('terima_1', $row->id)->orWhere('terima_2', $row->id);
			// 	})

			// 	// ->where(function($q) use ($row){
			// 	// 	$q->where('terima_1', '<>', 0)->orWhere('terima_2', '<>', 0); // pilih yang belum di set 
			// 	// })
				
			// 	->where('status_diterima', 0) // mark jalur prestasi

			// 	->where(function($q){
			// 		$q->where('proses_1', 1)->orWhere('proses_2', 1); // mark yang sudah di proses bagian 1 dan 2
			// 	})

			// 	// ->where('proses_1', 0) // mark proses loop 1
			// 	// ->where('proses_2', 0) // mark proses loop 1
			// 	->orderBy('nilai_pil_1', 'desc')
			// 	->orderBy('tanggal_lahir', 'asc')
			// 	->limit($row->quota_umum)
			// 	->get();

			// foreach ($grade3 as $gr) {
			// 	$gr->terima_3 = $row->id;
			// 	$gr->terima_di = $row->id;
			// 	$gr->proses_3 = 1;
			// 	$gr->save();
			// }
			echo '<br>';
		}

		foreach (Jurusan::all() as $jur) 
		{
			echo 'proses urutan 2';
			echo 'Jurusan '. $jur->jurusan . ' Jumlah ' . $jur->quota_umum;
			
			$grade2 = EloquentRegistrasi::where('pilihan_2', $jur->id) //
				->where('terima_1', 0) // dan diterima di jurusan pertama
				->where('terima_2', 0) // dan bukan di terima pilihan 2
				->where('status_diterima', 0) // mark jalur prestasi
				->where('proses_1', 0) // mark proses loop 1
				->where('proses_2', 0) // mark proses loop 1
				->where('nilai_tes', '>', 0)
				->orderBy('nilai_pil_1', 'desc')
				->orderBy('tanggal_lahir', 'asc')
				// ->limit($jur->quota_umum)
				->lists('id');

			EloquentRegistrasi::whereIn('id', $grade2)->update(['terima_2' => $jur->id, 'proses_2' => 1]);

			// foreach($grade2 as $sos)
			// {
			// 	$yang_mau_ngelip = EloquentRegistrasi::where('pilihan_2', $jur->id)
			// 						->where('terima_1', 0)
			// 						->where('terima_2', 0) // dan bukan di terima pilihan 2
			// 						->where('status_diterima', 0) // mark jalur prestasi
			// 						->where('proses_1', 0) // mark proses loop 1
			// 						->where('proses_2', 0) // mark proses loop 1

			// 						->orderBy('nilai_pil_1', 'desc')
			// 						->orderBy('tanggal_lahir', 'asc')
			// 						// ->limit($jur->quota_umum)
			// 						->get();

			// 	foreach ($yang_mau_ngelip as $x) {
			// 		if($x->nilai_pil_1 > $sos->nilai_pil_1){
			// 			$sos->terima_1 = 0;

			// 			$x->terima_2 = $jur->id;
			// 			$x->proses_2 = 1;
			// 			$x->save();
			// 		}
			// 	}
			// }
			echo '<br>';
		}
		
		foreach (Jurusan::all() as $ki) 
		{
			$grade3 = EloquentRegistrasi::where(function($q) use ($ki){
					$q->where('terima_1', $ki->id)->orWhere('terima_2', $ki->id);
				})
				->where('nilai_tes', '>', 0)
				// ->where(function($q) use ($ki){
				// 	$q->where('terima_1', '<>', 0)->orWhere('terima_2', '<>', 0); // pilih yang belum di set 
				// })
				
				->where('status_diterima', 0) // mark jalur prestasi

				// ->where(function($q){
				// 	$q->where('proses_1', 1)->orWhere('proses_2', 1); // mark yang sudah di proses bagian 1 atau 2
				// })

				// ->where('proses_1', 0) // mark proses loop 1
				// ->where('proses_2', 0) // mark proses loop 1
				->orderBy('nilai_pil_1', 'desc')
				->orderBy('tanggal_lahir', 'asc')
				->limit($ki->quota_umum)
				->get();

			foreach ($grade3 as $gr) {
				
				$gr->terima_3 = $ki->id;
				$gr->terima_di = $ki->id;
				$gr->proses_3 = 1;
				$gr->save();
				
				// if($gr->)
				// $gr->terima_3 = $ki->id;
				// $gr->terima_di = $ki->id;
				// $gr->proses_3 = 1;
				// $gr->save();
			}
		}
	}
}

//(((((`nilai_benar`*5)+(`nilai_salah`*-1) + 20)/250)*400)*0.4)