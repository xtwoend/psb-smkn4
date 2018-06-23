<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPendaftarsColumn2018 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pendaftars', function($table)
		{
			$table->string('nisn');

			$table->string('provinsi');
            $table->string('kota');
            $table->string('kecamatan');
            $table->string('desa');

            // informasi orang tua
            $table->string('nomor_telp');
            $table->string('nama_ayah');
            $table->string('pendidikan_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('nama_ibu');
            $table->string('pendidikan_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->tinyInteger('use_main_address')->default(0);
            $table->string('alamat_orangtua')->nullable();

            $table->string('nomor_kk');
            $table->string('tahun_lulus', 20);
            $table->tinyInteger('status')->default(0);

            $table->string('random_code')->nullable();
            $table->tinyInteger('verify')->default(0);
            $table->tinyInteger('change_count')->default(0);

            $table->tinyInteger('agama');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pendaftars', function($table)
		{
		    $table->dropColumn(array('nisn','provinsi', 'kota', 'kecamatan', 'desa', 'nomor_telp', 'nama_ayah', 'pendidikan_ayah', 'pekerjaan_ayah', 'nama_ibu', 'pendidikan_ibu', 'pekerjaan_ibu', 'use_main_address', 'alamat_orangtua', 'nomor_kk', 'tahun_lulus'));
		});
	}

}
