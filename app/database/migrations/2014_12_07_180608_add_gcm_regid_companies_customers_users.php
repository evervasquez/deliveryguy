<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGcmRegidCompaniesCustomersUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('companies',function(Blueprint $table){
            $table->text('gcm_regid')->nullable();
        });

        Schema::table('employees',function(Blueprint $table){
            $table->text('gcm_regid')->nullable();
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
            $table->dropColumn('gcm_regid');
        });

        Schema::table('employees',function(Blueprint $table){
            $table->dropColumn('gcm_regid');
        });
	}

}
