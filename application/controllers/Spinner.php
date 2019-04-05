<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Spinner
 *
 * @author windows8.1
 */
class Spinner extends CI_Controller {

    //put your code here
    function detail($id) {
        $data['title'] = "Spinner";
        $data['spin'] = $this->Crud_m->select_where_row("spinner", "id_spinner='$id'");
        $this->load->view('admin/spinner/detail', $data);
    }

    function list_spinner() {
        $data['title'] = "Data Spinner";
        $this->load->view('admin/spinner/list_spinner', $data);
    }

    function form_edit() {
        $this->load->view('admin/spinner/form_edit');
    }

    function proses_edit() {
        $id = $this->input->post('id_spinner');
        $data = array(
            'arr_spinner' => $this->input->post('arr_spinner'),
        );
        $this->Crud_m->update('spinner', $data, 'id_spinner', $id);
        redirect('Spinner/list_spinner');
    }
    function data_transaksi(){
        $data['title'] = "Transaksi Spinner Hari Ini";
        $this->load->view('admin/spinner/data_transaksi', $data);
    }

}
