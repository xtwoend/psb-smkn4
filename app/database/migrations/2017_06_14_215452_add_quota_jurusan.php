<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQuotaJurusan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('jurusans', function($table)
		{
			$table->integer('quota_umum')->default(0);
		    $table->integer('quota_prestasi')->default(0);
		    $table->integer('quota_apriasi')->default(0);
		    $table->integer('quota_luar')->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('jurusans', function($table)
		{
		    $table->dropColumn(array('quota_umum', 'quota_prestasi', 'quota_apriasi', 'quota_luar'));
		});
	}

}
