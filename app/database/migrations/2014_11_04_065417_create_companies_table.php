<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompaniesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('companies', function(Blueprint $table)
		{
			$table->increments('id');
			$table->char('code',15);
			$table->string('company_name',200);
            $table->string('address');
			$table->double('latitude')->nullable();
			$table->double('longitude')->nullable();
            $table->string('phone',15)->nullable();
            $table->string('bank_account',25);
            $table->string('operating_licence')->nullable();
			$table->text('gcm_regid')->nullable();
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
		Schema::drop('companies');
	}

}
