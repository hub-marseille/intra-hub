<?php

/**
 * Created by PhpStorm.
 * User: Benjamin
 * Date: 18/03/2016
 * Time: 20:48
 */
class EpitechLogin_model extends CI_Model
{
    private $isAuth = false;
    private $sessionCookie = null;

    public function __construct()
    {
        parent::__construct();
    }


    public function setCookie($login, $password, $authLvl)
    {
        $cookie = array(
            'name' => 'leplusbeaucookie',
            'login' => $login,
            'password' => $password,
            'authLvl' => $authLvl,
            'logged' => true
        );
        $this->session->set_userdata($cookie);
    }

    public function validateOnCookie()
    {
        if (($this->sessionCookie = $this->session->all_userdata()) != null && isset($this->sessionCookie['login']) && isset($this->sessionCookie['password']))
        {
            if ($this->hubAuthenticate($this->sessionCookie['login'], $this->sessionCookie["password"]) == true)
            {
                return true;
            }
        }
        return false;
    }

    public function epitechAuthenticate($login, $password)
    {
        $addr = "https://intra.epitech.eu/?format=json";
        $params=array(
            'login' => $login,
            'password'=> $password,
            'remember_me' => true
        );

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL ,$addr);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        $ret = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return $http_status;
    }

    public function hubAuthenticate($login, $password)
    {

        $this->load->model('Users_model', 'user');
        if ($this->user->signin($login, $password) != false)
        {
            return true;
        }
        return false;
    }

    public function authenticate($login, $password)
    {
        $ret = array(
            "status" => false,
            "msg" => ''
        );
        if (($this->hubAuthenticate($login, $password)) == true)
        {
            $this->isAuth = true;
            $ret["status"] = true;
            $ret["msg"] = "Authentication succed!";
            $this->setcookie($login, $password, 0);
        }
        else
        {
            $Authret = $this->epitechAuthenticate($login, $password);
            if ($Authret == 200)
            {
                $this->load->model('Users_model', 'user');
                if ($this->user->createUser($login, $password) != false)
                {
                    $this->isAuth = true;
                    $ret["status"] = true;
                    $ret["msg"] = "Profile Created!";
                    $this->setcookie($login, $password, 1);
                }
                else
                {
                    $ret["msg"] = "Failed to create profile in hub database";
                }
            }
            else
            {
                $ret["msg"] = "Not logged";
            }
        }
        return $ret;
    }
}