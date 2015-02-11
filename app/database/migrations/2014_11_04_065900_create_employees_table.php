<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('employees', function(Blueprint $table)
		{
			$table->increments('id');
			$table->char('code',15);
			$table->string('first_name',200);
			$table->string('last_name',200);
            $table->string('address')->nullable();
            $table->string('phone',15)->nullable();
            $table->string('email',200)->nullable();
            //licencia de conducir
            $table->string('driver_licence',20);
            $table->string('property_card',20);
            $table->string('bank_account',25);
            $table->string('id_card',12);
            $table->char('sex',1);
			$table->timestamps();
            $table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
     *
	 */
	public function down()
	{
		Schema::drop('employees');
	}

}
