<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTahap2Pendaftar extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pendaftars', function($table)
		{
			$table->integer('tahap_2')->default(0);
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
		    $table->dropColumn(array('tahap_2'));
		});
	}

}
