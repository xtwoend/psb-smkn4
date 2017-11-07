<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDiterimaField extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pendaftars_online', function($table)
		{
		    $table->integer('status_diterima');
		    $table->string('diterimadi');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pendaftars_online', function($table)
		{
		    $table->dropColumn(array('status_diterima', 'diterimadi'));
		});
	}

}
