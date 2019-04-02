<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Etc
 *
 * @author windows8.1
 */
class Etc extends CI_Model {

    //put your code here
    function tarif($tipe) {
        $query = $this->db->query("select tarif from tarif where tipe='$tipe'");
        $data = $query->rows();
        return $data->tarif;
    }

    function charge_mishop() {
        $query = $this->db->query("select tarif from tarif where tipe='charge'");
        $data = $query->rows();
        return $data->tarif;
    }

    public function rp($angka) {
        $rupiah = number_format($angka, 0, ',', '.');
        return 'Rp ' . $rupiah;
    }

    public function rps($angka) {
        $rupiah = number_format($angka, 0, ',', '.');
        return $rupiah;
    }

    function bulan($tgl) {
        $bulan = substr($tgl, 5, 2);
        Switch ($bulan) {
            case 1 : $bulan = "Januari";
                Break;
            case 2 : $bulan = "Februari";
                Break;
            case 3 : $bulan = "Maret";
                Break;
            case 4 : $bulan = "April";
                Break;
            case 5 : $bulan = "Mei";
                Break;
            case 6 : $bulan = "Juni";
                Break;
            case 7 : $bulan = "Juli";
                Break;
            case 8 : $bulan = "Agustus";
                Break;
            case 9 : $bulan = "September";
                Break;
            case 10 : $bulan = "Oktober";
                Break;
            case 11 : $bulan = "November";
                Break;
            case 12 : $bulan = "Desember";
                Break;
        }
        return $bulan;
    }

    function tgl($tgl) {
        $hari = substr($tgl, 8, 2);
        $tahun = substr($tgl, 0, 4);
        $nama_bulan = $this->bulan($tgl);
        $tgl_oke = $hari . ' ' . $nama_bulan . ' ' . $tahun;
        return $tgl_oke;
    }

    function prov() {
        $query = $this->db->query("Select * from provinces");
        return $query->result();
    }

    function kab($id) {
        $query = $this->db->query("Select * from regencies where province_id='$id'");
        return $query->result();
    }

    public function terbilang($angka) {

        $angka = (float) $angka;
        $bilangan = array('', 'Satu', 'Dua', 'Tiga', 'Empat', 'Lima', 'Enam', 'Tujuh', 'Delapan', 'Sembilan', 'Sepuluh', 'Sebelas');

        if ($angka < 12) {
            return $bilangan[$angka];
        } else if ($angka < 20) {
            return $bilangan[$angka - 10] . ' Belas';
        } else if ($angka < 100) {
            $hasil_bagi = (int) ($angka / 10);
            $hasil_mod = $angka % 10;
            return trim(sprintf('%s Puluh %s', $bilangan[$hasil_bagi], $bilangan[$hasil_mod]));
        } else if ($angka < 200) {
            return sprintf('Seratus %s', $this->terbilang($angka - 100));
        } else if ($angka < 1000) {
            $hasil_bagi = (int) ($angka / 100);
            $hasil_mod = $angka % 100;
            return trim(sprintf('%s Ratus %s', $bilangan[$hasil_bagi], $this->terbilang($hasil_mod)));
        } else if ($angka < 2000) {
            return trim(sprintf('Seribu %s', $this->terbilang($angka - 1000)));
        } else if ($angka < 1000000) {
            $hasil_bagi = (int) ($angka / 1000);
            $hasil_mod = $angka % 1000;
            return sprintf('%s Ribu %s', $this->terbilang($hasil_bagi), $this->terbilang($hasil_mod));
        } else if ($angka < 1000000000) {
            $hasil_bagi = (int) ($angka / 1000000);
            $hasil_mod = $angka % 1000000;
            return trim(sprintf('%s Juta %s', $this->terbilang($hasil_bagi), $this->terbilang($hasil_mod)));
        } else if ($angka < 1000000000000) {
            $hasil_bagi = (int) ($angka / 1000000000);
            $hasil_mod = fmod($angka, 1000000000);
            return trim(sprintf('%s Milyar %s', $this->terbilang($hasil_bagi), $this->terbilang($hasil_mod)));
        } else if ($angka < 1000000000000000) {
            $hasil_bagi = $angka / 1000000000000;
            $hasil_mod = fmod($angka, 1000000000000);
            return trim(sprintf('%s Triliun %s', $this->terbilang($hasil_bagi), $this->terbilang($hasil_mod)));
        } else {
            return 'Data Salah';
        }
    }

}
