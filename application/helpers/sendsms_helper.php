<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sendsms_helper
 *
 * @author lauwba
 */


    //put your code here
    function sendsms($nohp, $pesan) {
        $userkey = 'mamot'; // userkey lihat di zenziva
        $passkey = 'gmamot09'; // set passkey di zenziva
        $message = urlencode($pesan);
        $url = 'http://reguler.sms-notifikasi.com/apps/smsapi.php';
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url);
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, 'userkey=' . $userkey . '&passkey=' . $passkey . '&nohp=' . $nohp . '&pesan=' . $message);
        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlHandle, CURLOPT_POST, 1);
        $results = curl_exec($curlHandle);
        curl_close($curlHandle);
        if (!$results) {
            $results = file_get_contents($url . $curlHandle);
        } else {
            echo "Sent";
        }        
    }


