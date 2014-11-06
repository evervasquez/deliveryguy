<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeliveryEmployeesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    //tabla para permitir que la empresa asigne a un DeliverGuy mas Delivery's
    //company_assing = permite saber si la empresa es la que agrego el delivery al DeliveryGuy
	public function up()
	{
		Schema::create('delivery_employees', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('delivery_id')->unsigned();
            $table->integer('employee_id')->unsigned();
            $table->dateTime('company_assign')->nullable();
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
		Schema::drop('delivery_employees');
	}

}
