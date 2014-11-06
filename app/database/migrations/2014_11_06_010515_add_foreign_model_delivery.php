<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignModelDelivery extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::table('deliveries', function(Blueprint $table)
        {
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('typebuy_id')->references('id')->on('type_buys');
        });

        Schema::table('customer_deliveries', function(Blueprint $table)
        {
            $table->foreign('delivery_id')->references('id')->on('deliveries');
            $table->foreign('customer_id')->references('id')->on('customers');
        });

        Schema::table('delivery_employees', function(Blueprint $table)
        {
            $table->foreign('delivery_id')->references('id')->on('deliveries');
            $table->foreign('employee_id')->references('id')->on('employees');
        });

        Schema::table('notifications', function(Blueprint $table)
        {
            $table->foreign('delivery_employee_id')->references('id')->on('delivery_employees');
            $table->foreign('type_notification_id')->references('id')->on('type_notifications');
        });
    }



    /**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
    public function down()
    {
        Schema::table('delivery_employees', function(Blueprint $table)
        {
            $table->dropForeign('delivery_employees_employee_id_foreign');
            $table->dropForeign('delivery_employees_delivery_id_foreign');
        });
        Schema::table('customer_deliveries', function(Blueprint $table)
        {
            $table->dropForeign('customer_deliveries_customer_id_foreign');
            $table->dropForeign('customer_deliveries_delivery_id_foreign');
        });
        Schema::table('deliveries', function(Blueprint $table)
        {
            $table->dropForeign('deliveries_typebuy_id_foreign');
            $table->dropForeign('deliveries_company_id_foreign');
        });

        Schema::table('notifications', function(Blueprint $table)
        {
            $table->dropForeign('notifications_type_notification_id_foreign');
            $table->dropForeign('notifications_delivery_employee_id_foreign');
        });
    }


}
