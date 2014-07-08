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
use Maatwebsite\Excel\Facades\Excel;

use Xtwoend\Models\Eloquent\Pendaftar;
use Xtwoend\Models\Eloquent\Nilai;


class UploadController extends BaseController
{
	protected $registrasi;

	public function __construct(Registrasi $registrasi)
	{
		parent::__construct();
		$this->registrasi = $registrasi;
	}

	public function index()
	{
		$data = \Xtwoend\Models\Eloquent\Absensi::whereBetween('time', array('2014-05-26', '2014-06-25'))->get();
		$date = \Xtwoend\Models\Eloquent\Absensi::whereBetween('time', array('2014-05-26', '2014-06-25'))->groupBy('time')->get();
		
		$datause = array('data'=>$data, 'date'=>$date);
		return Excel::create('Data Absensi', function($excel) use ($datause) {

		    $excel->sheet('New sheet', function($sheet) use ($datause) {
		        $sheet->loadView('admin::upload.export')
		        ->with('data', $datause);
		    });

		})->download('xlsx');
	}

	public function create()
	{
		$this->theme->setTitle('Upload File Excel');
		return $this->theme->of('admin::upload.create')->render();
	}

	public function store()
	{
		$file = Input::file('excel');
		$filename = $file->getClientOriginalName();
		$file->move(public_path('file'), $filename);
		Excel::load(public_path("file/{$filename}"), function($reader) {
	        
	        $reader->each(function($sheet) {
		        $sheet->each(function($row) {
		        	
					$ex = Pendaftar::where('nomor_pendaftaran',$row->nodaftar)->first();
		        	$ex->status_diterima = ($row->status == 'DITERIMA')? 1 : 0;
		        	$ex->diterimadi		 = $row->diterimadi;
		        	$ex->save();
		        	//dd($row);
    			});
		    });
		    
			//$reader->dd();
   	 	});


	}

	/*
	public function store()
	{
		$file = Input::file('excel');
		$filename = $file->getClientOriginalName();
		$file->move(public_path('file'), $filename);
		Excel::load(public_path("file/{$filename}"), function($reader) {
	        
	        $reader->each(function($sheet) {
		        $sheet->each(function($row) {
					$ex = new Pendaftar;
		        	$ex->nomor_pendaftaran = $row->nodaftar;
		        	$ex->nomor_ujian  = $row->noujian;
		        	$ex->nama  = $row->namalengkap;
		        	$ex->tanggal_lahir = \Carbon\Carbon::createFromFormat('d-m-Y', $row->tgllahir)->toDateTimeString();
		        	$ex->asal_pendaftar = $row->asalpendaftar;
		        	$ex->asal_sekolah = $row->asalsekolah;
		        	$ex->nilai_mtk = $row->mtk;
		        	$ex->nilai_ipa = $row->ipa;
		        	$ex->nilai_ind = $row->bind;
		        	$ex->nilai_ing = $row->bing;
		        	$ex->nilai_tes = 0;
		        	$ex->total_un = $row->nilaiun;
		        	$ex->pilihan_1 = $row->pilihan1;
		        	$ex->pilihan_2 = $row->pilihan2;
		        	$ex->gelombang = $row->gelombang;
		        	$ex->ruang = $row->ruangan;
					$ex->bangku = $row->bangku;
		        	$ex->save();
    			});
		    });
		    
			//$reader->dd();
   	 	});


	}
	*/

}