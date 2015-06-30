<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendaftarTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pendaftars', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('nomor_pendaftaran');
			$table->string('nomor_ujian');
			$table->string('nama');
			$table->string('jenis_kelamin');
			$table->string('tempat_lahir');
			$table->date('tanggal_lahir');
			$table->string('sekolah_asal');
			$table->integer('status_sekolah');
			$table->string('alamat');
			$table->integer('domisili');
			$table->decimal('nilai_mtk',5,2);
			$table->decimal('nilai_ipa',5,2);
			$table->decimal('nilai_ind',5,2);
			$table->decimal('nilai_ing',5,2);
			$table->decimal('nilai_tes',5,2);
			$table->decimal('total_un',5,2);
			$table->integer('pilihan_1');
			$table->integer('pilihan_2');
			$table->integer('pilihan_3');
			$table->integer('pilihan_4');
			$table->integer('status_diterima');
			$table->integer('user_id');
			$table->integer('gelombang');
			$table->integer('ruang');
			$table->integer('bangku');
			$table->datetime('tgl_daftar');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pendaftars');
	}

}
