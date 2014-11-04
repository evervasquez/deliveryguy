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
            $table->string('employee_name');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email',200)->nullable();
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
