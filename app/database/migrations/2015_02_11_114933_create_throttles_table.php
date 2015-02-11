<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateThrottlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('throttles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('ip_address')->nullable();
			$table->integer('attempts')->default(0);
			$table->boolean('suspended')->default(false);
			$table->boolean('banned')->default(false);
			$table->timestamp('last_attempt_at')->nullable();
			$table->timestamp('suspended_at')->nullable();
			$table->timestamp('banned_at')->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('throttles');
	}

}
