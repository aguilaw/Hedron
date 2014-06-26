<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Images extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('images', function($table)
        {
            $table->increments('id');
            $table->string('title', 100);
            $table->date('date_created');
            $table->integer('act_width');
            $table->integer('act_height');
            $table->string('tools',300);
            $table->string('project_type',100);
            $table->mediumtext('description');
            $table->string('link_to');
            $table->integer('pos_x');
            $table->integer('pos_y');
            $table->integer('file_height');
            $table->integer('file_width');
            $table->integer('file_size');
            $table->string('file_ext',20);
            $table->string('file_name',250);
            $table->boolean('featured');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('images');
	}

}
