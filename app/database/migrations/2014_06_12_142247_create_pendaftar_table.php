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
			$table->decimal('nilai_mtk',4,2);
			$table->decimal('nilai_ipa',4,2);
			$table->decimal('nilai_ind',4,2);
			$table->decimal('nilai_ing',4,2);
			$table->decimal('nilai_tes',4,2);
			$table->decimal('total_un',4,2);
			$table->integer('pilihan_1');
			$table->integer('pilihan_2');
			$table->integer('pilihan_3');
			$table->integer('pilihan_4');
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
		Schema::drop('pendaftars');
	}

}
