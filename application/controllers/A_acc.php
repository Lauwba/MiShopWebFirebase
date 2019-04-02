<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of A_acc
 *
 * @author windows8.1
 */
class A_acc extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        if($this->session->userdata('admin_mishop')){
            redirect('A_dashboard');
        }
        
    }

    //put your code here
    function index() {
        $data['title'] = "Login Admin Mishop";
        $this->load->view('admin/login', $data);
    }

    function login() {
        $u = $this->input->post('user');
        $p = md5($this->input->post('pass'));
        $cek = $this->Login_m->login_admin($u, $p);
        if ($cek->num_rows()) {
            foreach ($cek->result() as $row) {
                $arr['admin_mishop'] = $row->id_admin;
                $this->session->set_userdata($arr);
            }
            echo 1;
        } else {
            echo 0;
        }
    }
}
