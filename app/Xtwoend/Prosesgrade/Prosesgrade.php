<?php namespace Xtwoend\Prosesgrade;

/**
 * Proses Grade Package
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
use Xtwoend\Repositories\Registrasi\RegistrasiRepository;


class Prosesgrade {

	protected $registrasi;


	protected $repository;


	public function __construct(Registrasi $registrasi, RegistrasiRepository $repository)
	{
		$this->registrasi = $registrasi;
		$this->repository = $repository;
	}

	public function getGradeSementara()
	{
		return $this->repository->getSort(array('tanggal_lahir' => 'desc', 'nilai_pil_1'=>'desc'));
	}

}