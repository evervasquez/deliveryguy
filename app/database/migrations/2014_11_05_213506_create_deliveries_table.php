<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeliveriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('deliveries', function(Blueprint $table)
		{
			$table->increments('id');
            $table->char('delivery_code',15)->unique();
            $table->integer('customer_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->integer('typebuy_id')->unsigned();
            $table->dateTime('datetime_reservation')->nullable();
            $table->dateTime('datetime_confirmation')->nullable();
			$table->timestamps();
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
		Schema::drop('deliveries');
	}

}
