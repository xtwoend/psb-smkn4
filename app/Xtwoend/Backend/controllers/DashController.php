<?php namespace Xtwoend\Backend\Controllers;

/**
 * Backend App
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


use Xtwoend\Registrasi\Registrasi;
//lagi males aja
use Xtwoend\Models\Eloquent\Registrasi as RegistrasiModel;


use View, Input, Response, Redirect;


class DashController extends BaseController
{	
	private $registrasi;

	public function __construct(Registrasi $registrasi)
	{
		parent::__construct();
		$this->registrasi = $registrasi;
	}

	public function index()
	{	
		$this->addjs();
		$this->donatChartDomisili();
		$data['totalPendaftar'] = $this->registrasi->count();
		return $this->theme->of('index', $data)->render();
	}


	private function addjs()
	{
		$this->theme->asset()->usePath()->add('moris-css', 'css/morris/morris.css');

		//js moris
		$this->theme->asset()->container('footer')->usePath()->add('raphael-js', 'js/raphael-min.js');
		$this->theme->asset()->container('footer')->usePath()->add('moris-js', 'js/plugins/morris/morris.min.js');
	}

	private function donatChartDomisili()
	{	
		$info = new RegistrasiModel;
		
		$rt = $info->where('domisili', '=', 1)->count();
		$rw = $info->where('domisili', '=', 2)->count();
		$kelurahan = $info->where('domisili', '=', 3)->count();
		$kecamatan = $info->where('domisili', '=', 4)->count();
		
		//data chart
		$data = array(
					array('label' => 'RT', 'value'=> $rt),
					array('label' => 'RW', 'value'=> $rw),
					array('label' => 'KELURAHAN', 'value'=> $kelurahan),
					array('label' => 'KECAMATAN', 'value'=> $kecamatan),
				);
		$cartdata = json_encode($data);

		// Dependency with.
		$dependencies = array('jquery','raphael-js','moris-js');
		// Writing an in-line script.
		$this->theme->asset()->writeScript('inline-script', '
		    $(function() {
		        var donut = new Morris.Donut({
                    element: "domisili-chart",
                    resize: true,
                    colors: ["#3c8dbc", "#f56954", "#00a65a","#00aa22"],
                    data: '. $cartdata .',
                    hideHover: "auto"
                });
		    })
		', $dependencies);
	}
}