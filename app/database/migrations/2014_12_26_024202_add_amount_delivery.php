<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAmountDelivery extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('deliveries',function(Blueprint $table)
        {
            $table->decimal('deliveryTotal',18,2)->nullable()->default(0);
            $table->decimal('delivery',18,2)->nullable()->default(0);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('deliveries',function(Blueprint $table)
        {
            $table->dropColumn('deliveryTotal','delivery');
        });
	}

}
