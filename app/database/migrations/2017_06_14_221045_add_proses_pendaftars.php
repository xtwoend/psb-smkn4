<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProsesPendaftars extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pendaftars', function($table)
		{
			$table->integer('proses_1')->default(0);
		    $table->integer('proses_2')->default(0);
		    $table->integer('proses_3')->default(0);
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
		    $table->dropColumn(array('proses_1', 'proses_2', 'proses_3'));
		});
	}

}
