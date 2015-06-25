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
		    $table->decimal('nilai_pil_1', 4,2)->default('00.00');
		    $table->decimal('nilai_pil_2', 4,2)->default('00.00');
		    $table->decimal('nilai_pil_3', 4,2)->default('00.00');
		    $table->decimal('nilai_pil_4', 4,2)->default('00.00');
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
