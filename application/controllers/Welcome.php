<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index() {
        $data['title'] = "Mi Shop Registration";
        $this->load->view('mitra/daftar', $data);
    }
    function auth(){
        $this->load->view('mitra/signup_auth');
    }

}
