<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFilepath extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('images', function($table)
        {
            $table->renameColumn('file_path','file_name');
            $table->dropColumn('thumb');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('images', function($table)
        {
            $table->renameColumn('file_name','file_path');
        });
	}

}
