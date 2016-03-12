<?php

/**
 * Created by PhpStorm.
 * User: Benjamin
 * Date: 12/03/2016
 * Time: 17:09
 */
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
    public function index()
    {
        $ret = $this->load->view('backoffice/backofficehome.html');
       // return json_encode($ret);
    }
}