<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('interests', function(Blueprint $table)
		{

			$table->increments('id');
			$table->timestamps();

		});

		Schema::create('user_interests', function(Blueprint $table)
		{

			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('interest_id')->unsigned();
			$table->timestamps();

		});		

		//wa pa na migrate
		Schema::create('post_interest', function(Blueprint $table)
		{

			$table->increments('id');
			$table->integer('post_id')->unsigned();
			$table->integer('interest_id')->unsigned();
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
		Schema::drop('interests');
	}

}
