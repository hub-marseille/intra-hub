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

if (!function_exists('text_beginning'))
{
	/**
	 * @param $str
	 * @param int $n
	 *
	 * @return string
	 */
	function text_beginning($str, $n = 800)
	{
		if (strlen($str) <= $n)
			return ($str);
		$beg = substr($str, 0, $n);
		$beg = substr($beg, 0, strrpos($beg, ' ')) . '...';
		return ($beg);
	}
}

if (!function_exists('url_friendly'))
{
	function url_friendly($str)
	{
		$str = str_replace(
			[
				'à', 'á', 'â', 'ã', 'ä', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ',
				'À', 'Á', 'Â', 'Ã', 'Ä', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý'
			],
			[
				'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y',
				'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y'
			],
			$str);
		return (str_replace(' ', '-', strtolower($str)));
	}
}

if (!function_exists('intra'))
{
	function intra()
	{
		return (unserialize(session('intraInstance')));
	}
}