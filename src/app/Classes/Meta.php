<?php
/**
 * Created by PhpStorm.
 * User: roman_p
 * Date: 31/08/16
 * Time: 01:20
 */

namespace App\Classes;

use View;

class Meta
{
	private $tags = array();

	public function addTag($keyOrTab, $value = null)
	{
		if (is_string($keyOrTab) and $value)
		{
			$this->tags[$keyOrTab] = $value;
		}
		else if (is_array($keyOrTab))
		{
			foreach ($keyOrTab as $k => $v)
			{
				$this->tags[$k] = $v;
			}
		}

		View::share('metaTags', $this->tags);
	}
}