<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsCompanies extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('companies',function(Blueprint $table){
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('companies',function(Blueprint $table){
            $table->dropColumn('latitude');
            $table->dropColumn('longitude');
        });
	}

}
