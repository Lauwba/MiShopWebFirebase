<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Report
 *
 * @author windows8.1
 */
class Report extends CI_Controller{
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('admin_mishop')){
            redirect('A_acc');
        }
    }
    //put your code here
    function income_mishop(){
        $data['title'] = "Pendapatan Mishop";
        $this->load->view('admin/report/form_income_mishop', $data);
    }
    function report_income_mishop($start, $end){
        $data['start'] = $start;        
        $data['end'] = $end;        
        $this->load->view('admin/report/income_mishop', $data);
    }
    
    function income_mitra(){
        $data['title'] = "Pendapatan Mitra";
        $this->load->view('admin/report/income_mitra', $data);
    }
    function saran(){
        $data['title'] = "Kritik Dan Saran";
        $this->load->view('admin/report/saran', $data);
    }
}
