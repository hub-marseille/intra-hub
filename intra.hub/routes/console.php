<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function()
{
	$this->comment(Inspiring::quote());
});

Artisan::command('start', function()
{
	$this->comment(shell_exec('sudo /opt/lampp/lampp start'));
});

Artisan::command('stop', function()
{
	$this->comment(shell_exec('sudo /opt/lampp/lampp stop'));
});

Artisan::command('restart', function()
{
	$this->comment(shell_exec('sudo /opt/lampp/lampp restart'));
});
