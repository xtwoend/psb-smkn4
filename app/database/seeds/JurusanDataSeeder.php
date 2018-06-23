<?php

class JurusanDataSeeder extends Seeder {

    public function run()
    {
       $data = array(
       		array('id' => 1, 'jurusan' => 'Teknik Perancangan dan Gambar Mesin'),
       		array('id' => 2, 'jurusan' => 'Teknik Mekanik Industri'),
       		array('id' => 3, 'jurusan' => 'Teknik Pemesinan'),
       		array('id' => 4, 'jurusan' => 'Teknik Instalasi Tenaga Listrik'),
          array('id' => 5, 'jurusan' => 'Teknik Otomasi Industri (4 tahun)'),
          array('id' => 6, 'jurusan' => 'Kontruksi gedung, sanitasi dan perawatan (4 tahun)'),
          array('id' => 7, 'jurusan' => 'Bisnis Kontruksi dan Properti'),
          array('id' => 8, 'jurusan' => 'Desain Pemodelan dan Informasi Bangunan'),
          array('id' => 9, 'jurusan' => 'Teknik Geomatika'),
          array('id' => 10, 'jurusan' => 'Rekayasa Perangkat Lunak'),
       	);


       foreach ($data as $key) {
       		$jurusan = new \Xtwoend\Models\Eloquent\Jurusan;
       		$jurusan->fill($key);
       		$jurusan->save();
       }
    }

}