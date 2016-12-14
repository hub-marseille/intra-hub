<?php
/**
 * Created by PhpStorm.
 * User: roman_p
 * Date: 10/09/16
 * Time: 21:03
 */

if (!function_exists('meta'))
{
	function meta($keyOrTab, $value = null)
	{
		Meta::addTag($keyOrTab, $value);
	}
}

if (!function_exists('textBeginning'))
{
	/**
	 * @param $str
	 * @param int $n
	 *
	 * @return string
	 */
	function textBeginning($str, $n = 800)
	{
		if (strlen($str) <= $n)
			return ($str);
		$beg = substr($str, 0, $n);
		$beg = substr($beg, 0, strrpos($beg, ' ')) . '...';
		return ($beg);
	}
}

if (!function_exists('intra'))
{
	function intra()
	{
		return (unserialize(session('intraInstance')));
	}
}

if (!function_exists('loginFromMail'))
{
	function loginFromMail($mail)
	{
		return explode('@', $mail)[0];
	}
}