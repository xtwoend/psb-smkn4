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
		    $table->integer('nilai_rpl');
		    $table->integer('nilai_mesin');
		    $table->integer('nilai_listrik');
		    $table->integer('nilai_sipil');
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
		    $table->dropColumn(array('nilai_rpl', 'nilai_mesin', 'nilai_listrik', 'nilai_sipil'));
		});
	}

}
