<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PendaftarOnlineTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pendaftars_online', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('nomor_pendaftaran');
			$table->string('nomor_ujian');
			$table->string('nama');
			$table->date('tanggal_lahir');
			$table->string('asal_pendaftar');
			$table->string('asal_sekolah');
			$table->decimal('nilai_mtk',4,2);
			$table->decimal('nilai_ipa',4,2);
			$table->decimal('nilai_ind',4,2);
			$table->decimal('nilai_ing',4,2);
			$table->decimal('nilai_tes',4,2);
			$table->decimal('total_un',4,2);
			$table->string('pilihan_1');
			$table->string('pilihan_2');
			$table->integer('gelombang');
			$table->integer('ruang');
			$table->integer('bangku');
			$table->integer('user_id');
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
		Schema::drop('pendaftars_online');
	}

}
