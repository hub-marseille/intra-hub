<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$this->call(ArticlesTableSeeder::class);
		$this->call(ProjectsTableSeeder::class);
		$this->call(CommentsTableSeeder::class);
	}
}