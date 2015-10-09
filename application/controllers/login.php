<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {
	/*
	Aplikasi Koperasi Pegawai Negeri Institut Teknologi Sepuluh Nopember (ITS)
	Oleh Rizki Rinaldi
	file : websitesite.php untuk websitesite Koperasi
	*/
	function __construct() {
       parent::__construct();
        if(!isset($_SESSION)) { session_start();  } 
        $this->load->library(array('pagination', 'session', 'template_web'));
        $this->load->model('m_koperasi');
        $this->load->helper(array('form', 'url'));
    }
	function index(){
		if($this->session->userdata("login")!=""){
		$data = array(
			'session' => $this->session->userdata('login'),
			'title' => 'Dasboard Anggota Koperasi ITS'
		);
		$this->template_web->login('login/index',$data);
	}else{
		echo "<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Anda Harus Login Dulu !!')
				window.location.href='". base_url()."index.php/website';
				</SCRIPT>";
	}
	}
	function masuak(){		
		if($_POST){
			$no_anggota = mysql_real_escape_string($_POST['no_anggota']);
			$password = (mysql_real_escape_string($_POST['password']).$this->config->item("key_login"));			
			$temp = $this->m_koperasi->GetAnggota("where no_anggota = '$no_anggota' and password = '$password'")->result_array();
			if($temp != NULL){
				$data = array(
					'logged_in' => 'yesGetMeLogin',
					'no_anggota' => $temp[0]['no_anggota'],
					'pengguna' => $temp[0]['nama'],
					'password' => $temp[0]['password']
				);
				$this->session->set_userdata('login',$data);
				redirect("login");
			}else{		
				echo "<SCRIPT LANGUAGE='JavaScript'>
				window.alert('No Anggota atau Password Anda Salah !!')
				window.location.href='". base_url()."index.php/website';
				</SCRIPT>";
			}
			}else{
				$this->load->view('website/pagenotfound',array('title' => 'page not found'));
			}
	}
	function profile($kode){
		if($this->session->userdata("login")!=""){
		$temp = $this->m_koperasi->Getprofile("where sha1(no_anggota)='$kode'")->result_array();
		$data = array(
			'session' => $this->session->userdata('login'),
			'status' => 'lama',
			'message' => "",
			'profile' => $this->m_koperasi->Getprofile("where sha1(no_anggota) = '$kode' limit 1 ")->result_array(),
			'title' => 'Anggota Koperasi ITS - edit label'
		);
		$this->template_web->login('login/profile',$data);
		}else{
		echo "<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Anda Harus Login Dulu !!')
				window.location.href='". base_url()."index.php/website';
				</SCRIPT>";
	}
	}
	function simpanan($kode){
		if($this->session->userdata("login")!=""){
		$temp = $this->m_koperasi->Getsimpanan("where sha1(no_anggota) = '$kode'")->result_array();
		$data = array(
			'session' => $this->session->userdata('login'),
			'status' => 'lama',
			'message' => "",
			'simpanan' => $this->m_koperasi->Getsimpanan("where sha1(no_anggota) = '$kode' limit 1")->result_array(),
			'title' => 'Anggota Koperasi ITS - edit label'
		);
		$this->template_web->login('login/simpanan',$data);
	}else{
		redirect("website");
	}
	}
	function pinjaman($kode){
		if($this->session->userdata("login")!=""){
		$temp = $this->m_koperasi->Getpinjaman("where sha1(no_anggota) = '$kode'")->result_array();
		if($temp != NULL){
		$data = array(
			'session' => $this->session->userdata('login'),
			'message' => "",
			'pimjaman' => $this->m_koperasi->Getpinjaman("where sha1(no_anggota) = '$kode' limit 1")->result_array(),
			'title' => 'Anggota Koperasi ITS - edit label'
		);
		$this->template_web->login('login/pinjaman',$data);
		}else{
			$data = array(
			'session' => $this->session->userdata('login'),
			'status' => 'Anda tidak Memiliki Data Pinjaman',
			'message' => "",
			'pimjaman' => $this->m_koperasi->Getpinjaman("where sha1(no_anggota) = '$kode' limit 1")->result_array(),
			'title' => 'Anggota Koperasi ITS - edit label'
		);
		$this->template_web->login('login/pinjaman',$data);
			
		}
		}else{
		echo "<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Anda Harus Login Dulu !!')
				window.location.href='". base_url()."index.php/website';
				</SCRIPT>";
	}
	}
	function reset_pswd($kode){
		if($this->session->userdata("login")!=""){
		$temp = $this->m_koperasi->GetAnggota("where sha1(no_anggota) = '$kode'")->result_array();
		$data = array(
			'session' => $this->session->userdata('login'),
			'status' => '',
			'message' => "",
			'anggota' => $this->m_koperasi->GetAnggota("where sha1(no_anggota) = '$kode' limit 1")->result_array(),
			'title' => 'Anggota Koperasi ITS'
		);
		$this->template_web->login('login/reset_pswd',$data);
	}else{
		redirect("website");
	}
	}
	function ganti_pswd($id){
		if($this->session->userdata("login")!=""){
			if($_POST){
			$password_lama = (mysql_real_escape_string($_POST['password_lama']).$this->config->item("key_login"));
			$password_baru = (mysql_real_escape_string($_POST['password_baru']).$this->config->item("key_login"));
			$temp = $this->m_koperasi->GetAnggota("where sha1(no_anggota) = '$id' and password = '$password_lama'")->result_array();
			if($temp != NULL){
				$data = array(
					'password' => $password_baru
				);
				$result = $this->m_koperasi->UpdateData('kop_anggota',$data,array('no_anggota' => $id));
				if($result == 1){
				echo "<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Data Berhasil Di Update !!')
				window.location.href='". base_url()."index.php/login';
				</SCRIPT>";
				}echo "<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Data gagal Di Update !!')
				window.location.href='". base_url()."index.php/login';
				</SCRIPT>";
			}else{
			echo "<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Data Tidak Di Update !!')
				window.location.href='". base_url()."index.php/login';
				</SCRIPT>";
			}
		}
		}else{
		echo "<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Anda Harus Login Dulu !!')
				window.location.href='". base_url()."index.php/website';
				</SCRIPT>";
	}
	}
	
	function destroyingsession(){
		$this->session->sess_destroy();
		if(!isset($_SESSION)) { session_start();  } 
		session_destroy();
		redirect("website");
	}
	
}