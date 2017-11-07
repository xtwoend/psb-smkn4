<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTempNilaiAkademik extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pendaftars', function($table)
		{
		    $table->integer('nilai_benar');
		    $table->integer('nilai_salah');
		    $table->integer('nilai_kosong');
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
		    $table->dropColumn(array('nilai_benar', 'nilai_salah', 'nilai_kosong'));
		});
	}

}
