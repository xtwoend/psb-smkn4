<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableAbsensi extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('absensis', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('nip');
			$table->string('nama');
			$table->datetime('time');
			$table->string('state');
			$table->string('exception');
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
		Schema::drop('absensis');
	}

}
