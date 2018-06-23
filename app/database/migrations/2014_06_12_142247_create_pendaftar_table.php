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
			$table->integer('nomor_pendaftaran')->nullable();
			$table->string('nomor_ujian')->nullable();
			
			$table->string('nama')->nullable();
			$table->string('jenis_kelamin')->nullable();
			$table->string('tempat_lahir')->nullable();
			$table->date('tanggal_lahir')->nullable();
			$table->string('sekolah_asal')->nullable();
			$table->integer('status_sekolah')->nullable();
			$table->string('alamat')->nullable();
			$table->integer('domisili')->nullable();

			$table->decimal('nilai_mtk',5,2)->nullable();
			$table->decimal('nilai_ipa',5,2)->nullable();
			$table->decimal('nilai_ind',5,2)->nullable();
			$table->decimal('nilai_ing',5,2)->nullable();
			$table->decimal('nilai_tes',5,2)->nullable();
			$table->decimal('total_un',5,2)->nullable();


			$table->integer('pilihan_1')->nullable();
			$table->integer('pilihan_2')->nullable();
			$table->integer('pilihan_3')->nullable();
			$table->integer('pilihan_4')->nullable();
			
			$table->integer('status_diterima')->nullable();
			$table->integer('user_id')->nullable();
			$table->integer('gelombang')->nullable();
			$table->integer('ruang')->nullable();
			$table->integer('bangku')->nullable();
			$table->datetime('tgl_daftar')->nullable();



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
