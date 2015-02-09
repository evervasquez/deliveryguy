<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnTableUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users',function(Blueprint $table){
			$table->text('gcm_regid')->nullable();
			$table->string('username',50);
			$table->text('remember_token')->nullable();
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
		Schema::table('users',function(Blueprint $table){
			$columns = array('gcm_regid','username','remenber_token');
			$table->dropColumn($columns);
		});
	}

}
