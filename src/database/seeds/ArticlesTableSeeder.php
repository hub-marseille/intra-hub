<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		for ($i = 0; $i < 20; $i++)
		{
			DB::table('articles')->insert([
				'name' => str_random(20),
				'content' => file_get_contents('http://loripsum.net/api/10/'),
				'author_id' => 1,
				'created_at' => \Carbon\Carbon::now(),
				'updated_at' => \Carbon\Carbon::now()
			]);
		}
	}
}
