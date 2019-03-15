<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index() {
        $data['title'] = "Mi Shop Registration";
        $this->load->view('mitra/register_complete', $data);
    }
    function auth(){
        $this->load->view('mitra/signup_auth');
    }
    function kabupaten($id){
        $kab = $this->Etc->kab($id);
        $data = "<option value=''> --- Pilih Kabupaten --- </option>";
        foreach ($kab as $k) {
            $data .= "<option value='" . $k->name . "'>"
                    . $k->name . "</option>";
        }
        echo $data;
    }

}
