<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Saldo
 *
 * @author windows8.1
 */
class Saldo extends CI_Controller {
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('admin_mishop')){
            redirect('A_acc');
        }
    }

    function index() {
        $data['title'] = "Top Up Saldo Mitra";
        $this->load->view('admin/saldo/topup', $data);
    }
    
    function form_topup($id) {
        $data['id_mitra'] = $id;
        $this->load->view('admin/saldo/form_topup', $data);
    }
    
    function topup_mitra() {
        $data['title'] = "Top Up by Mitra";
        $this->load->view('admin/saldo/topup_mitra', $data);
    }
    
    function tarik_mitra(){
        $data['title'] = "Permintaan Penarikan Mitra";
        $this->load->view('admin/saldo/tarik_mitra', $data);
    }
    

}
