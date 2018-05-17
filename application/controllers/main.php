<?php

defined('BASEPATH') or exit ('No Direct script access allowed');

class main extends MY_Controller {
    
    
    function index(){
        if($this->session->userdata('nama') != null){
            $data = array (
                "page" => "Pegawai"
            );
            $this->load->view('home', $data);
        }else{
            $data = array (
                "page" => "Login"
            );
            $this->load->view('login', $data);
        }
    }
    function login(){
        $this->load->view('login');
    }
	function prosesLogin(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
        
		$cek = $this->model->selectWhere("user",$where);
		if(count($cek) > 0){
 
			$data_session = array(
				'id_user' => $cek[0]->id_user,
				'nama' => $username,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("index.php/main"));
 
		}else{
			echo "Username dan password salah !";
		}
	}
    function dataGaji(){
        $this->load->view('gaji');
    }
    function dataAbsen(){
        $this->load->view('absen');
    }
    function settings(){
        $this->load->view('settings');
    }
    function logout(){
		$this->session->sess_destroy();
		redirect(base_url('index.php/main/'));
	}
}

?>
