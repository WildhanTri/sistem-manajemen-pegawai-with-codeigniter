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
            "tunjangan" => $this->tunjangan(),
            "id" => "KR-".str_pad($noID[0]->AUTO_INCREMENT, "3", "0", STR_PAD_LEFT),
        );
        $this->load->view('pegawai/pegawai_form', $data);
    }
    function tampil_edit_pegawai($id){
        $pegawai = $this->m_pegawai->select2TableWhere("pegawai", "pegawai_nama", "pegawai.id_pegawai = pegawai_nama.id_pegawai", "pegawai.id_pegawai = $id");
        $data = array (
            "page" => "pegawai",
            "pegawai" => $pegawai,
            "aksi" => "editdata"
        );
        $this->load->view('pegawai/pegawai_form', $data);
    }
    
    function proses_tambah_pegawai(){
        $pegawai = $this->selectLastID('pegawai', 'pegawai');
        $datapegawai = array (
            "id_pegawai" => $pegawai[0]->AUTO_INCREMENT,
            "jabatan_pegawai" => $this->input->post("jabatan_pegawai"),
            "alamat_pegawai" => $this->input->post("alamat_pegawai"),
            "status_menikah" => $this->input->post("status_menikah"),
            "jumlah_anak" => $this->input->post("jumlah_anak"),
            "agama_pegawai" => $this->input->post("agama_pegawai"),
            "telepon_pegawai" => $this->input->post("telepon_pegawai"),
            "email_pegawai" => $this->input->post("email_pegawai")
        );
        $datapegawainama = array (
            "id_pegawai" => $pegawai[0]->AUTO_INCREMENT,
            "nama_depan" => $this->input->post("nama_depan"),
            "nama_tengah" => $this->input->post("nama_tengah"),
            "nama_belakang" => $this->input->post("nama_belakang")
        );
        $datagaji = array (
            "id_pegawai" => $pegawai[0]->AUTO_INCREMENT,
            "gaji_pokok" => $this->input->post("gaji_pokok")
        );
        $tunjangan = $this->input->post("tunjangan");
        foreach ($this->tunjangan()  as $t) {
            $datatunjangan[$t->id_tunjangan] = (isset($tunjangan[$t->id_tunjangan])) ? 1 : 0;
        }
        $insertpegawai = $this->m_pegawai->add_data_pegawai($datapegawai, $datapegawainama, $datagaji, $datatunjangan);
        
    }
    
    function salaryRange($idjabatan){
        $pegawai = $this->m_pegawai->get_data_jabatan($idjabatan);
        
        $data = array (
            'min_salary' => $pegawai[0]->min_salary,
            'max_salary' => $pegawai[0]->max_salary,
            'status' => 'success',
        );
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}

?>
