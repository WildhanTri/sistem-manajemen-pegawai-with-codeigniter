<?php

defined('BASEPATH') or exit ('No Direct script access allowed');

class gaji extends MY_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('m_gaji');
    }
    
    function tampil_data_gaji($id=0){
        $jml = $this->db->get('pegawai');
        $config['base_url'] = base_url().'index.php/pegawai/tampil_data_gaji/';
        $config['use_page_numbers'] = false;
        $config['total_rows'] = $jml->num_rows();
        $config['per_page'] = '10';
        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $pegawai = $this->m_gaji->get_data_pegawai($config['per_page'], $id);
        $data = array (
            "pegawai" => $pegawai
        );
        $this->load->view('gaji/gaji_index', $data);
    }
    
    function cari_nama_pegawai($id){
        $data = array ( "pegawai.id_pegawai" => $id );
        $pegawai = $this->m_gaji->get_single_data_pegawai($data);
        if($pegawai == true){
            $data = array (
            'id_pegawai' => $pegawai[0]->id_pegawai,
            'nama_pegawai' => $pegawai[0]->nama_depan." ".$pegawai[0]->nama_tengah." ".$pegawai[0]->nama_belakang,
            'status' => 'success',
            );
        }else{
            $data = array (
            'id_pegawai' => "tidak ditemukan",
            'nama_pegawai' => "tidak ditemukan",
            'status' => 'failed',
            );
        }
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}

?>
