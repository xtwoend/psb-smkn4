<?php

class JurusanDataSeeder extends Seeder {

    public function run()
    {
       $data = array(
       		array('id' => 1, 'jurusan' => 'TEKNIK MESIN'),
       		array('id' => 2, 'jurusan' => 'TEKNIK LISTRIK'),
       		array('id' => 3, 'jurusan' => 'TEKNIK SIPIL'),
       		array('id' => 4, 'jurusan' => 'REKAYASA PERANGKAT LUNAK'),
       	);


       foreach ($data as $key) {
       		$jurusan = new \Xtwoend\Models\Eloquent\Jurusan;
       		$jurusan->fill($key);
       		$jurusan->save();
       }
    }

}