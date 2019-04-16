<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of A_data
 *
 * @author windows8.1
 */
class A_data extends CI_Controller {
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('admin_mishop')){
            redirect('A_acc');
        }
    }
    function set_active_button() {
        $sess_data['penanda'] = $this->input->post('penanda');
        $this->session->set_userdata($sess_data);
    }
    function set_active_mitra() {
        $sess_data['penanda_mitra'] = $this->input->post('penanda');
        $this->session->set_userdata($sess_data);
    }
    
    function tarif() {
        $data['title'] = "Tarif";
        $this->load->view('admin/data/tarif', $data);
    }
    function registrasi_mitra(){
        $data['title'] = "Data Pendaftar Mitra Mishop";
        $this->load->view('admin/data/mitra_reg', $data);
    }
    function mitra(){
        $data['title'] = "Data Mitra";
        $this->load->view('admin/data/mitra', $data);
    }
    function mitra_suspend(){
        $this->load->view('admin/data/mitra_suspend');
    }
    function mitra_income(){
       $this->load->view('admin/data/mitra_income'); 
    }
    function customer(){
        $data['title'] = "Data Customer";
        $this->load->view('admin/data/customer', $data);
    }
    function mitra_rate(){
        $this->load->view('admin/data/mitra_rate');
    }
    function mitra_wilayah(){
        $this->load->view('admin/data/mitra_wilayah');
    }
    function cust_all(){
        $this->load->view('admin/data/customer_new_pagination_backup_2');
    }
    function cust_report(){
        $this->load->view('admin/data/customer_report');
    }
    function cust_suspend(){
        $this->load->view('admin/data/customer_suspend');
    }
    function cust_income(){
        $this->load->view('admin/data/customer_income');        
    }
    function cust_wilayah(){
        $this->load->view('admin/data/customer_wilayah');
    }
    function rekening(){
        $data['title'] = "Rekening Mishop";
        $this->load->view('admin/data/rekening', $data);
    }
    function rekening_by($id) {
        $data = $this->Crud_m->select_id('profile', 'id_profile', $id);
        echo json_encode($data);
    }
    
    function insert_rekening() {
        $data = array(
            'atas_nama' => $this->input->post('atas_nama'),
            'bank' => $this->input->post('bank'),
            'no_rek' => $this->input->post('no_rek'),
        );
        $this->Crud_m->insert('profile', $data);
        echo json_encode(array("status" => TRUE));
    }

    function update_rekening() {
        $id = $this->input->post('id_profile');
        $data = array(
            'atas_nama' => $this->input->post('atas_nama'),
            'bank' => $this->input->post('bank'),
            'no_rek' => $this->input->post('no_rek'),
        );
        $this->Crud_m->update('profile', $data, 'id_profile', $id);
        echo json_encode(array("status" => TRUE));
    }

    function del_rekening($id) {
        $this->Crud_m->delete('profile', 'id_profile', $id);
        echo json_encode(array("status" => TRUE));
    }
}
