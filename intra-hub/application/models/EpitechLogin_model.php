<?php

/**
 * Created by PhpStorm.
 * User: Benjamin
 * Date: 18/03/2016
 * Time: 20:48
 */
class EpitechLogin_model extends CI_Model
{
    public function authenticateWithCredentials($login, $password)
    {
        //$login="pomare_b";
        //$password="eltpiIol";
        $options = array(
            "https://intra.epitech.eu/&format=json",
            CURLOPT_RETURNTRANSFER => true
        );
        $params=array(
            'login' => $login,
            'password'=> $password,
            'remember_me' => true
        );

        $ch = curl_init();
        curl_setopt_array($ch,  $options);
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

        $ret = curl_exec($ch);
        curl_close($ch);

        if ($ret == 200) {
            return true;
        }
        return false;
    }
    public function authenticate($login, $password)
    {
        $ret = false;
        if ($this->authenticateWithCredentials($login, $password)) {
            $ret = true;
        }
        return $ret;
    }
}