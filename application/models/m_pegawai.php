<?php

defined('BASEPATH') or exit ('No Direct script access allowed');

class m_pegawai extends MY_MODEL {
    
    public function get_data_pegawai($limit,$offset){
        $this->db->select('*');
        $this->db->from("pegawai");
        $this->db->limit($limit,$offset);
        $this->db->join("pegawai_nama", "pegawai.id_pegawai = pegawai_nama.id_pegawai");
        $this->db->join("jabatan", "pegawai.jabatan_pegawai = jabatan.id_jabatan");
        $this->db->join("agama", "pegawai.agama_pegawai = agama.id_agama");
        $this->db->order_by('pegawai.id_pegawai', 'ASC');
        return $this->db->get()->result();
    }
    
    
}

?>
