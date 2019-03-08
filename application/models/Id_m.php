<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Id_m
 *
 * @author windows8.1
 */
class Id_m extends CI_Model {

    //put your code here
    function id_tarif() {
        $query = $this->db->query("SELECT * FROM tarif");
        $row = $query->num_rows();
        $list = $row + 1;
        $id = "TRF-$list";
        return $id;
    }

    function id_mitra() {
//        $q = $this->db->query("SELECT MAX(RIGHT(id_mitra,4)) AS kd_max FROM mitra WHERE DATE(tgl_daftar)=CURDATE()");
//        $kd = "";
//        if ($q->num_rows() > 0) {
//            foreach ($q->result() as $k) {
//                $tmp = ((int) $k->kd_max) + 1;
//                $kd = sprintf("%04s", $tmp);
//            }
//        } else {
//            $kd = "0001";
//        }
//        return 'M-' . date('ymd') . $kd;
        return 'M-' . date('ymd') . '-';     
        
    }

    function id_cust() {
        $q = $this->db->query("SELECT MAX(RIGHT(id_customer,4)) AS kd_max FROM customer WHERE DATE(tgl_daftar)=CURDATE()");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        return "C-" . date('ymd') . $kd;
    }

    function id_shop() {
        $q = $this->db->query("SELECT MAX(RIGHT(id_shop,4)) AS kd_max FROM shop WHERE DATE(tgl_upload)=CURDATE()");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        return date('ymd') . $kd;
    }

    function id_service() {
        $q = $this->db->query("SELECT MAX(RIGHT(id_service,4)) AS kd_max FROM service WHERE DATE(tgl_service)=CURDATE()");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        return date('ymd') . $kd;
    }

}
