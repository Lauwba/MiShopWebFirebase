<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of A_dashboard
 *
 * @author windows8.1
 */
class A_dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('admin_mishop')) {
            redirect('A_acc');
        }
    }

    //put your code here
    function index() {
        $this->load->view('admin/dashboard/dashboard');
    }

    function update_logo() {
        $nm_file = 'logo.png';
        $config['upload_path'] = './assets/profil/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = $nm_file;
        $config['overwrite'] = TRUE;
        $this->upload->initialize($config);
        if ($this->upload->do_upload('logo')) {
            echo json_encode(array("status" => TRUE));
        } else {
            $error = array(
                'error' => $this->upload->display_errors()
            );
            echo json_encode($error);
        }
    }

}
