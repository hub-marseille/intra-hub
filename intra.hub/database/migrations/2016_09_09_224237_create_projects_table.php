<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->text('desc');
			$table->string('short_desc');
			$table->string('main_picture');
			$table->integer('author_id')->unsigned();
			$table->string('status')->default('posted');
			$table->timestamps();

			$table->foreign('author_id')->references('id')->on('users')
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
		Schema::table('projects', function(Blueprint $table)
		{
			$table->dropForeign('projects_author_id_foreign');
		});

		Schema::dropIfExists('projects');
	}
}
