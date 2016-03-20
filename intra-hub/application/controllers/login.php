<?php
/*
 * This file is part of the epitech-intranet package.
 *
 * (c) Raphael De Freitas <raphael@de-freitas.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Raphy\Epitech\Intranet;
use Curl\Curl;
/**
 * Class Intranet represents the connection with the Epitech's Intranet
 *
 * @author Raphael De Freitas <raphael@de-freitas.net>
 */
class Login
{
    /**
     * Contains the state of the authentication
     *
     * @var bool
     */
    private $isAuthenticated = false;
    /**
     * Contains the readable stage of the authentication
     *
     * @var null|bool
     */
    private $isReadOnly = null;
    /**
     * Contains the session cookie when authenticated
     *
     * @var null|string
     */
    private $sessionCookie = null;
    /**
     * Authenticate the client with credentials
     *
     * @param string $login The Epitech user login
     * @param string $password The Epitech user password
     * @return bool TRUE if authenticated, otherwise FALSE
     */
    public function authenticateWithCredentials($login, $password)
    {
        if ($this->isAuthenticated()) {
            return $this->isAuthenticated();
        }
        $curl = new Curl();
        $curl->setOpt(CURLOPT_FRESH_CONNECT, true);
        $curl->setOpt(CURLOPT_COOKIESESSION, true);
        $curl->post("https://intra.epitech.eu/?format=json", [
            "login" => $login,
            "password" => $password,
            "remind" => true
        ]);
        $this->setSessionCookie($curl);
        $this->isAuthenticated = $curl->http_status_code == 200;
        if ($this->isAuthenticated) {
            $this->isReadOnly = is_numeric($password);
        }
        return $this->isAuthenticated;
    }
    /**
     * Authenticate the client with the AutoLoginLink
     * You can obtain the AutoLoginLink at https://intra.epitech.eu/admin/autolog
     *
     * @param string $autoLoginLink The auto login link provided by Epitech's Intranet
     * @return bool TRUE if authenticated, otherwise FALSE
     */
    public function authenticateWithAutoLoginLink($autoLoginLink)
    {
        if ($this->isAuthenticated()) {
            return $this->isAuthenticated();
        }
        $curl = new Curl();
        $curl->setOpt(CURLOPT_FRESH_CONNECT, true);
        $curl->setOpt(CURLOPT_COOKIESESSION, true);
        $curl->get($autoLoginLink);
        $this->setSessionCookie($curl);
        $this->isAuthenticated = $curl->http_status_code == 302;
        return $this->isAuthenticated;
    }
    /**
     * Authenticate the client with the PHPSESSID cookie
     *
     * @param string $sessionCookie The value of the cookie PHPSESSID provided by Epitech's Intranet
     * @return bool TRUE if authenticated, otherwise FALSE
     */
    public function authenticateWithSessionCookie($sessionCookie)
    {
        if ($this->isAuthenticated()) {
            return $this->isAuthenticated();
        }
        $curl = new Curl();
        $curl->setOpt(CURLOPT_FRESH_CONNECT, true);
        $curl->setOpt(CURLOPT_COOKIESESSION, true);
        $curl->setCookie("PHPSESSID", $sessionCookie);
        $curl->get("https://intra.epitech.eu/?format=json");
        $this->isAuthenticated = $curl->http_status_code == 200;
        if ($this->isAuthenticated) {
            $this->sessionCookie = $sessionCookie;
        }
        return $this->isAuthenticated;
    }
    /**
     * Check weather the client is authenticated to Epitech's Intranet
     *
     * @return bool TRUE if authenticated, otherwise FALSE
     */
    public function isAuthenticated()
    {
        return $this->isAuthenticated;
    }
    /**
     * Get the session cookie when authenticated
     *
     * @return null|string NULL if not authenticated, otherwise the session cookie value
     */
    public function getSessionCookie()
    {
        return $this->sessionCookie;
    }
    /**
     * Check weather the client is authenticated in read only
     *
     * @return null|bool NULL if can not determinate, TRUE if the instance is read only, otherwise FALSE
     */
    public function isReadOnly()
    {
        return $this->isReadOnly;
    }
    /**
     * Set the session cookie extracted from a Curl instance
     *
     * @param Curl $curl
     */
    private function setSessionCookie(Curl $curl)
    {
        foreach ($curl->response_headers as $header) {
            if (preg_match("#Set-Cookie: PHPSESSID=(.*); path=/; secure; HttpOnly#", $header, $matches) == true) {
                $this->sessionCookie = $matches[1];
            }
        }
    }
}