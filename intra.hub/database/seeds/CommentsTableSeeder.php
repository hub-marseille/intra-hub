<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		for ($i = 0; $i < 10; $i++)
		{
			DB::table('comments')->insert([
				'content' => file_get_contents('http://loripsum.net/api/1/'),
				'author_id' => 1,
				'article_id' => 20,
				'created_at' => \Carbon\Carbon::now(),
				'updated_at' => \Carbon\Carbon::now()
			]);
		}
	}
}
