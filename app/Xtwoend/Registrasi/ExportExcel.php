<?php namespace Xtwoend\Registrasi;

/**
 * Export Excel
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
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class ExportExcel 
{	
	
	public function make($data)
	{	
		$now = Carbon::now();

		return Excel::create('Pendaftar tanggal '. $now->format("d-m-Y H:i:s") , function($excel) use ($data) {

		    $excel->sheet('New sheet', function($sheet) use ($data) {
		        $sheet->loadView('registrasitemplate::Excel')
		        ->with('data', $data);
		    });

		})->download('xlsx');
		//$this->view->make('registrasitemplate::excel')->render();
	}

}