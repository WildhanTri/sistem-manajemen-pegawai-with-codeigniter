<?php

defined('BASEPATH') or exit ('No Direct script access allowed');

class MY_Model extends CI_MODEL {
    
    public function select($table){
        $res=$this->db->get($table);
        return $res->result();
    }
    public function selectWhere($table, $data){
        $res=$this->db->get_where($table,$data);
        return $res->result();
    }
    public function select2Table($table, $table2, $on){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $on);
        return $this->db->get()->result();
    }
    public function select2TableWhere($table, $table2, $on, $where){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $on);
        $this->db->where($where);
        return $this->db->get()->result();
    }
    public function select2TableWhereOrderBy($table, $table2, $on, $where, $colm, $sortType){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $on);
        $this->db->where($where);
        $this->db->order_by($colm, $sortType);
        return $this->db->get()->result();
    }
    public function select3Table($table, $table2, $on, $table3, $on2){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $on);
        $this->db->join($table3, $on2);
        return $this->db->get()->result();
    }
    public function select3TableWhere($table, $table2, $on, $table3, $on2, $where){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $on);
        $this->db->join($table3, $on2);
        $this->db->where($where);
        return $this->db->get()->result();
    }
    public function select4Table($table, $table2, $on, $table3, $on2, $table4, $on3){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $on);
        $this->db->join($table3, $on2);
        $this->db->join($table4, $on3);
        return $this->db->get()->result();
    }
    public function select4TableWhere($table, $table2, $on, $table3, $on2, $table4, $on3, $where){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $on);
        $this->db->join($table3, $on2);
        $this->db->join($table4, $on3);
        $this->db->where($where);
        return $this->db->get()->result();
    }
    public function selectLastID($db, $table){
        $this->db->db_select("information_schema");
        $this->db->select('*');
        $this->db->from('TABLES');  
        $this->db->where(array( "TABLE_SCHEMA" => $db, "TABLE_NAME" => $table));
        $query = $this->db->get();
        $this->db->db_select("pegawai");
        return $query->result();
        
    }
    public function insert($table, $data){
        $this->db->db_select("kasir");
        $res=$this->db->insert($table, $data);
        return $res;
    }
    public function updateWhere($table, $data, $where){
        $res=$this->db->update($table, $data, $where);
        return $res;
    }
    public function delete($table, $where){
        $res=$this->db->delete($table, $where);
        return $res;
    }
}

?>