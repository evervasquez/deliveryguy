<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RefactorTableEmployees extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('employees',function(Blueprint $table){
			$table->renameColumn('full_name','first_name');
			$table->string('last_name',200);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('employees',function(Blueprint $table){
			$table->dropColumn('last_name');
			$table->renameColumn('first_name','full_name');
		});
	}

}
