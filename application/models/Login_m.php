<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of A_acc_m
 *
 * @author windows8.1
 */
class Login_m extends CI_Model {

    //put your code here
    function login_admin($u, $p) {
        $query = $this->db->query("Select * FROM admin where username='$u' AND password='$p'");
        return $query;
    }

    function login_mitra($u, $p) {
        $query = $this->db->query("Select * FROM mitra where email_mitra='$u' AND pass='$p'");
        return $query;
    }

    function login_customer($u, $p) {
        $query = $this->db->query("Select * FROM customer where email_customer='$u' AND pass_customer='$p'");
        return $query;
    }

}
