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
			$table->string('name');
			$table->timestamps();

		});

		Schema::create('user_interest', function(Blueprint $table)
		{

			
			$table->integer('user_id')->unsigned();
			$table->integer('interest_id')->unsigned();
			

				$table->foreign('user_id')
					->references('id')
					->on('users')
					->onDelete('cascade');

				$table->foreign('interest_id')
					->references('id')
					->on('interests')
					->onDelete('cascade');

		});		

		//wa pa na migrate
		Schema::create('post_interest', function(Blueprint $table)
		{

			
			$table->integer('post_id')->unsigned();
			$table->integer('interest_id')->unsigned();
			

				$table->foreign('post_id')
					->references('id')
					->on('posts')
					->onDelete('cascade');

				$table->foreign('interest_id')
					->references('id')
					->on('interests')
					->onDelete('cascade');
		});

		Schema::create('article_interest', function(Blueprint $table)
		{

			
			$table->integer('article_id')->unsigned();
			$table->integer('interest_id')->unsigned();
			

			$table->foreign('article_id')
				->references('id')
				->on('articles')
				->onDelete('cascade');

			$table->foreign('interest_id')
				->references('id')
				->on('interests')
				->onDelete('cascade');

		});



	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
		Schema::drop('user_interest');
		Schema::drop('post_interest');
		Schema::drop('article_interest');

		Schema::drop('interests');

	}			

}
