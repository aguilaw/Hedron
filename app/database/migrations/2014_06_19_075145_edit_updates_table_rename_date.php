<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditUpdatesTableRenameDate extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
       Schema::table('updates', function($table)
        {
           $table->dropColumn('date-created');
             $table->date('date_created');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('updates', function($table)
        {
           $table->dropColumn('date_created');
        });
	}

}
