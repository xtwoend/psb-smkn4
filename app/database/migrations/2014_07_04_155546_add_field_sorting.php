<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldSorting extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pendaftars_online', function($table)
		{
		    $table->decimal('bobot_tes', 4, 2);
		    $table->decimal('bobot_un', 4, 2);
		    $table->decimal('total_nilai', 4, 2);
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
		    $table->dropColumn(array('bobot_tes', 'bobot_un', 'total_nilai'));
		});
	}

}
