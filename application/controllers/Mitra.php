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
class Mitra extends CI_Controller{
    //put your code here
    function spinner($id_mitra){
        $data['id_mitra'] = $id_mitra;
        $this->load->view('mitra/spinner', $data);
    }
}
