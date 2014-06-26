<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRoleUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        
         $passwrd=Hash::make('h3dr0n');
        DB::table('users')->insert(array('email'=>'aguilawe@hedron.com', 'password'=>$passwrd, 'role'=>'admin','fname'=>'Wendy','lname'=>'Aguilar'));
        
       
    }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function($table)
        {
        $table->dropColumn('role');
        });
	}

}
