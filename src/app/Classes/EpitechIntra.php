<?php
/**
 * Created by PhpStorm.
 * User: roman_p
 * Date: 12/09/16
 * Time: 20:32
 */

namespace App\Classes;

use Curl\Curl;

class EpitechIntra
{
	private $authenticated = false;
	private $hubMember = false;

	private $login;
	private $password;

	private $intraUri = 'https://intra.epitech.eu/';
	/* TODO: Change to hub-marseille */
	private $hubGroup = 'marseille-promo-2019';

	/**
	 * @return boolean
	 */
	public function isAuthenticated()
	{
		return ($this->authenticated);
	}

	/**
	 * @return boolean
	 */
	public function isHubMember()
	{
		return ($this->hubMember);
	}

	/**
	 * @return string
	 */
	public function getLogin()
	{
		return ($this->login);
	}

	/**
	 * @return string
	 */
	public function getPassword()
	{
		return ($this->password);
	}

	public function auth($login, $password, $remind = true)
	{
		if ($this->isAuthenticated())
			return ($this->isAuthenticated());

		$curl = new Curl;
		$curl->setOpt(CURLOPT_FRESH_CONNECT, true);
		$curl->setOpt(CURLOPT_COOKIESESSION, true);
		$curl->post($this->intraUri . '?format=json', [
			'login' => $login,
			'password' => $password,
			'remind' => $remind
		]);

		$this->authenticated = $curl->http_status_code == 200;
		if ($this->isAuthenticated())
		{
			$this->login = $login;
			$this->password = encrypt($password);
		}
		else
			return ($this->isAuthenticated());
		$this->hubAuth($curl, $login, $password);
		return ($this->isAuthenticated());
	}

	public function hubAuth($curl, $login, $password)
	{
		$curl->post($this->intraUri . 'user/' . $login . '/?format=json', [
			'login' => $login,
			'password' => $password
		]);
		$profile = json_decode($curl->response);
		foreach ($profile->groups as $group)
		{
			if ($group->name == $this->hubGroup)
			{
				$this->hubMember = true;
				return;
			}
		}
		$this->hubMember = false;
	}
}