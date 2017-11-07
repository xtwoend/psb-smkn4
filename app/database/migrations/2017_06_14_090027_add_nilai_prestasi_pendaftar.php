<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNilaiPrestasiPendaftar extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pendaftars', function($table)
		{
			$table->decimal('skor_prestasi', 4, 2)->default(0);
		    $table->integer('skor_tidak_mampu')->default(0);
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
		    $table->dropColumn(array('skor_prestasi', 'skor_tidak_mampu'));
		});
	}

}
