<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtworksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('artworks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->date("date_created");
			$table->string("month_created")->nullable();
			$table->integer("year_created")->nullable();
			$table->string('type');
			$table->string('commissioner')->nullable();
			$table->string('tools');
			$table->string("display_in");
			$table->boolean("featured");
			$table->text("descriptiton");

			$table->integer("thumb_offset_horizontal")->nullable();
			$table->integer("thumb_offset_vertical")->nullable();
			$table->string("slug")->unique();

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('artworks');
	}

}
