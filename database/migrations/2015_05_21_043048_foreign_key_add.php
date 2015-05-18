<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignKeyAdd extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('comments', function(Blueprint $table)
		{
				$table->foreign('user_id')
					->references('id')
					->on('users')
					->onDelete('cascade');

				$table->foreign('article_id')
					->references('id')
					->on('articles')
					->onDelete('cascade');

				$table->foreign('post_id')
					->references('id')
					->on('posts')
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
		
	}

}
