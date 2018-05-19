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
    
    public function get_single_data_pegawai($id){
        $this->db->select('*');
        $this->db->from("pegawai");
        $this->db->join("pegawai_nama", "pegawai.id_pegawai = pegawai_nama.id_pegawai");
        $this->db->join("pegawai_gaji", "pegawai.id_pegawai = pegawai_gaji.id_pegawai");
        $this->db->join("jabatan", "pegawai.jabatan_pegawai = jabatan.id_jabatan");
        $this->db->join("agama", "pegawai.agama_pegawai = agama.id_agama");
        $this->db->where($id);
        return $this->db->get()->result();
    }
    public function get_tunjangan_pegawai($id){
        $this->db->select('*');
        $this->db->from("tunjangan_pegawai");
        $this->db->where($id);
        return $this->db->get()->result();
    }
    
    public function add_data_pegawai($datapegawai, $datapegawainama, $datagaji, $datatunjangan){
        $pegawai = $this->db->insert('pegawai', $datapegawai);
        $nama = $this->db->insert('pegawai_nama', $datapegawainama);
        $gaji = $this->db->insert('pegawai_gaji', $datagaji);
        foreach($datatunjangan as $key=>$value){
            $this->db->insert('tunjangan_pegawai', array('id_pegawai' => $datapegawai['id_pegawai'], 'id_tunjangan' => $key, 'status' => $value));
        }
    }
    public function edit_data_pegawai($datapegawai, $datapegawainama, $datagaji, $datatunjangan, $idpegawai){
        $pegawai = $this->db->update('pegawai', $datapegawai, $idpegawai);
        $nama = $this->db->update('pegawai_nama', $datapegawainama, $idpegawai);
        $gaji = $this->db->update('pegawai_gaji', $datagaji, $idpegawai);
        foreach($datatunjangan as $key=>$value){
            $idpegawai['id_tunjangan'] = $key;
            $e = $this->db->update('tunjangan_pegawai', array('status' => $value), $idpegawai );
        }
    }
    public function delete_data_pegawai($id){
        $this->db->delete('pegawai', $id);
    }
    
    public function get_data_jabatan($id){
        $this->db->select('*');
        $this->db->from("jabatan");
        $this->db->where(array('id_jabatan' => $id));
        return $this->db->get()->result();
    }
    
    
}

?>
