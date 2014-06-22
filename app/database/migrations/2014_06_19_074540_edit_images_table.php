<?php

use Illuminate\Database\Migrations\Migration;

class EditImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('images', function($table)
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
		Schema::table('images', function($table)
        {
             $table->dropColumn('date_created');
        });
	}

}
