<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table) {
			$table->increments('id');
			$table->text('content');
			$table->integer('author_id')->unsigned();
			$table->integer('article_id')->unsigned();
			$table->timestamps();

			$table->foreign('author_id')->references('id')->on('users')
				->onDelete('restrict')
				->onUpdate('restrict');

			$table->foreign('article_id')->references('id')->on('articles')
				->onDelete('restrict')
				->onUpdate('restrict');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('comments', function(Blueprint $table)
		{
			$table->dropForeign('comments_author_id_foreign');
			$table->dropForeign('comments_article_id_foreign');
		});

		Schema::dropIfExists('comments');
	}
}
