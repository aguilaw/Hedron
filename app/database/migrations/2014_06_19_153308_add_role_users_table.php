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
		Schema::table('users', function($table)
        {
        $table->string('role');
        });
        $passwrd=sha1('h3dr0n');
        DB::table('users')->insert(array('email'=>'aguilaw@hedron.com', 'password'=>$passwrd, 'role'=>'admin','fname'=>'Wendy','lname'=>'Aguil'));
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
