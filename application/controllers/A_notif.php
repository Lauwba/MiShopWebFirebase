<?php

class A_notif extends CI_Controller {
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('admin_mishop')){
            redirect('A_acc');
        }
    }

    function index() {
        $data['title'] = "Notifikasi";
        $this->load->view('admin/data/notifikasi', $data);
    }    
    
}
