<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDaftarulangonlineField extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pendaftars_online', function($table)
		{
		   	$table->integer('daftarulang');
		    $table->integer('biodata');
		    $table->integer('spot');
		    $table->integer('spcs');
		    $table->integer('spttn');
		    $table->integer('spd');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
