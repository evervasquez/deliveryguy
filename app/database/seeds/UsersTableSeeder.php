<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
        DB::table('users')->insert(array(
            'username' => 'deliveryguy',
            'password' => Hash::make('deliveryapp'),
            'email' => 'deliveryguy@app.com',
            'fullname' => 'administrador',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ));
	}

}