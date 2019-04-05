<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mitra
 *
 * @author windows8.1
 */
class Mitra extends CI_Controller {

    //put your code here
    function spinner($id_mitra, $tipe, $jml) {
        $data['id_mitra'] = $id_mitra;
        $data['spin'] = $this->Crud_m->select_where_row('spinner', "tipe=$tipe and jml_transaksi=$jml");
        $this->load->view('mitra/spinner', $data);
    }

    function email() {
        $email = $this->input->post('email');
        $nama = $this->input->post('nama');
        $unik = $this->input->post('unik');

        $config = Array(
            'protocol' => 'mail',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 587,
            'smtp_user' => 'registrasi.mishop@gmail.com',
            'smtp_pass' => '.,mishop*#',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'smtp_crypto' => 'ssl'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('registrasi.mishop@gmail.com', 'Admin Re:Mishop');
        $this->email->to($email);
        $this->email->subject('Registrasi');
        $data['nama'] = $nama;
        $data['unik'] = $unik;
        $body = $this->load->view('mitra/email', $data, true);
        $this->email->message($body);
        if (!$this->email->send()) {
            return show_error($this->email->print_debugger());
        } else {
            return "Berhasil";
        }
    }

    function view_email() {
        $this->load->view('mitra/email');
    }

}
