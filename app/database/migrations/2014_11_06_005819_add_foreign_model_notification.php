<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignModelNotification extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('noti_companies', function(Blueprint $table)
        {
            $table->foreign('conpany_id')->references('id')->on('companies');
            $table->foreign('notification_id')->references('id')->on('notifications');
        });

        Schema::table('noti_employees', function(Blueprint $table)
        {
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('notification_id')->references('id')->on('notifications');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('noti_employees', function(Blueprint $table)
        {
            $table->dropForeign('noti_employees_notification_id_foreign');
            $table->dropForeign('noti_employees_employee_id_foreign');
        });

        Schema::table('noti_companies', function(Blueprint $table)
        {
            $table->dropForeign('noti_companies_notification_id_foreign');
            $table->dropForeign('noti_companies_conpany_id_foreign');
        });
	}

}
