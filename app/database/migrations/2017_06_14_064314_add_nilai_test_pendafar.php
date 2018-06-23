<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNilaiTestPendafar extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pendaftars', function($table)
		{
			$table->integer('terima_di')->default(0);
		    $table->decimal('nilai_tes', 5, 2);
		    $table->decimal('total_nilai', 6, 2);
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
		    $table->dropColumn(array('diterima_id', 'nilai_tes', 'total_nilai'));
		});
	}

}
