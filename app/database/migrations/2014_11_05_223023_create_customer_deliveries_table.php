<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomerDeliveriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customer_deliveries', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('delivery_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->string('address');
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
		Schema::drop('customer_deliveries');
	}

}
