<?php namespace Xtwoend\Registrasi\Validators;


use Xtwoend\Validators\Validable;
use Xtwoend\Validators\LaravelValidator;

class CreateValidator extends LaravelValidator implements Validable {

  /**
   * Validation rules
   *
   * @var array
   */
  protected $rules = [
    'nama' 			    => 'required',
    'nomor_ujian'	  => 'required|numeric|unique:pendaftars,nomor_ujian',
    'sekolah_asal'	=> 'required',
    'pilihan_1'		  => 'required',
    'domisili'      => 'required',
  ];

}
