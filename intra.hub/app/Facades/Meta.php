<?php
/**
 * Created by PhpStorm.
 * User: roman_p
 * Date: 31/08/16
 * Time: 01:28
 */

namespace App\Facades;
use Illuminate\Support\Facades\Facade;


class Meta extends Facade
{
	protected static function getFacadeAccessor()
	{
		return ('meta');
	}
}