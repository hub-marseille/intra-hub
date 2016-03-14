<?php

/**
 * Created by PhpStorm.
 * User: Benjamin
 * Date: 12/03/2016
 * Time: 17:09
 */
use Curl\Curl;

class backOfficeHome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
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

    public function index()
    {
        $ret = $this->load->view('backoffice/backofficehome.html');
       // return json_encode($ret);
    }

    public function authenticate()
    {
        $ret = "";
        $login = $this->input->post('login');
        $pwd = $this->input->pos('pwd');
        if ($this->authenticateWithCredentials($login, $pwd)) {
            $ret .= "You are now authenticated with credentials" . PHP_EOL;
        }
        if ($this->isAuthenticated()) {
            $ret .= "You are authenticated!" . PHP_EOL;
        } else {
            $ret .= "You are not authenticated :(" . PHP_EOL;
        }
        return json_encode($ret);
    }
}