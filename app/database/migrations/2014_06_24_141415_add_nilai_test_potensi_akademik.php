<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNilaiTestPotensiAkademik extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pendaftars', function($table)
		{
		    $table->integer('nilai_pil_1');
		    $table->integer('nilai_pil_2');
		    $table->integer('nilai_pil_3');
		    $table->integer('nilai_pil_4');
		});
		///if 
		if (Schema::hasColumn('pendaftars', 'nilai_tes'))
		{
		    Schema::table('pendaftars', function($table){
				$table->dropColumn('nilai_tes');
			});	
		}
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
		    $table->dropColumn(array('nilai_pil_1', 'nilai_pil_2', 'nilai_pil_3','nilai_pil_4'));
		});
	}

}
