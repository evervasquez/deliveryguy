<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignUserSocials extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('socials', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
				->onDelete('no action')
				->onUpdate('no action');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('socials', function(Blueprint $table) {
			$table->dropForeign('socials_user_id_foreign');
		});
	}

}
