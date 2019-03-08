<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Logout
 *
 * @author windows8.1
 */
class Logout extends CI_Controller {
    //put your code here
    function index(){
        $this->session->unset_userdata('admin_mishop');
        redirect('admin');
    }
}
