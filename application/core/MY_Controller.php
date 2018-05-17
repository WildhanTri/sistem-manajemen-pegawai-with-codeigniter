<?php

defined('BASEPATH') or exit ('No Direct script access allowed');

class MY_controller extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('model');
    }
    
    function randomGen($jumlahChar){
        $karakter = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $key = "";
        for($a=0; $a<$jumlahChar; $a++){
            $arrChar = rand(0, strlen($karakter)-1);
            $key .= $karakter[$arrChar];
        }
        return $key;
    }
    
    function agama(){
        return $this->m_pegawai->select('agama');
    }
    function jabatan(){
        return $this->m_pegawai->select('jabatan');
    }
    
}

?>
