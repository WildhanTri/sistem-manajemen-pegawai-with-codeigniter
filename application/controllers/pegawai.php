<?php

defined('BASEPATH') or exit ('No Direct script access allowed');

class pegawai extends MY_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('m_pegawai');
    }
    
    function tampil_data_pegawai($id=0){
        $jml = $this->db->get('pegawai');
        $config['base_url'] = base_url().'index.php/pegawai/tampil_data_pegawai/';
        $config['use_page_numbers'] = false;
        $config['total_rows'] = $jml->num_rows();
        $config['per_page'] = '10';
        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $pegawai = $this->m_pegawai->get_data_pegawai($config['per_page'], $id);
        $data = array (
            "pegawai" => $pegawai
        );
        $this->load->view('pegawai/pegawai_index', $data);
    }
    function tampil_tambah_pegawai(){
        $noID = $this->m_pegawai->selectLastID("pegawai", "pegawai");
        $data = array (
            "page" => "pegawai",
            "aksi" => "tambahdata",
            "agama" => $this->agama(),
            "jabatan" => $this->jabatan(),
            "id" => "KR-".str_pad($noID[0]->AUTO_INCREMENT, "3", "0", STR_PAD_LEFT),
        );
        $this->load->view('pegawai/pegawai_form', $data);
    }
    function editPegawai($id){
        $pegawai = $this->m_pegawai->select2TableWhere("pegawai", "pegawai_nama", "pegawai.id_pegawai = pegawai_nama.id_pegawai", "pegawai.id_pegawai = $id");
        $data = array (
            "page" => "pegawai",
            "pegawai" => $pegawai,
            "aksi" => "editdata"
        );
        $this->load->view('pegawai', $data);
    }
}

?>
