<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignPermissions extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('throttles',function(Blueprint $table){
			$table->foreign('user_id','throttles_user_id_foreign')->references('id')->on('users');
		});

		Schema::table('users_groups',function(Blueprint $table){
			$table->foreign('user_id','users_groups_user_id_foreign')->references('id')->on('users');
			$table->foreign('group_id')->references('id')->on('groups');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users_groups',function(Blueprint $table){
			$table->dropForeign('group_id_users_groups_foreing');
			$table->dropForeign('users_groups_user_id_foreign');
			$table->dropPrimary(array('user_id','group_id'));
		});

		Schema::table('throttles',function(Blueprint $table){
			$table->dropForeign('throttles_user_id_foreign');
		});

	}

}
