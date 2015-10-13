<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Daftar extends CI_Controller {
	function __construct() {
        parent::__construct();
       if(!isset($_SESSION)){
    session_start();
}
        $this->load->library(array('pagination', 'session', 'template_web'));
        $this->load->model('m_koperasi');
        $this->load->helper(array('form', 'url'));
        $this->load->database();
    }

    function index(){
    		$view_stat = array(
			'day' => $this->m_koperasi->GetVisitor("where SUBSTRING(tanggal,1,10) = '".date("Y-m-d")."'")->num_rows(),
			'yesterday' => $this->m_koperasi->GetVisitor("where SUBSTRING(tanggal,1,10) = '".date("Y-m-d", strtotime("yesterday"))."'")->num_rows(),
			'mounth' => $this->m_koperasi->GetVisitor("where SUBSTRING(tanggal,1,7) = '".date("Y-m")."'")->num_rows(),
			'year' => $this->m_koperasi->GetVisitor("where SUBSTRING(tanggal,1,4) = '".date("Y")."'")->num_rows(),
			'sepanjang_waktu' => $this->m_koperasi->GetVisitor()->num_rows(),	
		);
		$data = array(
			'visitor' => $view_stat,
			'title' => 'Pendaftaran Anggota Koperasi ITS'
		);
		$this->template_web->pendaftaran('website/pendaftaran',$data);
	}

	function daftar_baru(){
		if($_POST){
				$nama = $_POST['nama'];
				$nip = $_POST['nip'];
				$unit = $_POST['unit_kerja'];
				$tempat_lahir =$_POST['tempat_lahir'];
				$tgl_lahir = $_POST['tgl_lahir'];
				$pangkat = $_POST['pangkat'];
				$telepon = $_POST['telepon'];
				$email = $_POST['email'];
				$alamat = $_POST['alamat'];
				$tgl_bergabung = date("Y-m-d H:i:s");

			$cek_nip = $this->m_koperasi->GetCalon("where nip='$nip'")->result_array();
			if($cek_nip== NULL){
				$data = array(
					'nama' => $nama,
					'nip' => $nip,
					'unit' => $unit,
					'tempat_lahir' => $tempat_lahir,
					'tgl_lahir' => $tgl_lahir,
					'pangkat' => $pangkat,
					'telepon' => $telepon,
					'email' => $email,
					'alamat' => $alamat,
					'tgl_bergabung' => $tgl_bergabung
				);
				$result = $this->m_koperasi->InsertData('calon_anggota',$data);
				if($result==1){
				$data1 = array(
						'nip' => $nip
				);
			/*$cek_nip = $this->m_koperasi->GetCalon()->result_array(); //<--------- tolong fix ini, memindahkan dari database calon ke database kop_angggota + bisa ditampilkan ke tabel anggota
			if($cek_nip== NULL){
				$data = array(
					'nama' => $nama,
					'nip' => $nip,
					'no_anggota' => $no_anggota,
					'password' => $password,
					'unit' => $unit,
					'status_anggota' => $status_anggota,
					'tgl_bergabung' => $tgl_bergabung
				);
				$result = $this->m_koperasi->InsertData('kop_anggota',$data);
				if($result==1){
				$data1 = array(
						'nip' => $nip
			
				);*/
				$this->session->set_userdata('daftar',$data1);
					redirect("daftar/data");
				}else{
				echo "<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Data Anda Gagal disimpan !!')
				window.location.href='". base_url()."index.php/daftar';
				</SCRIPT>";
			}
			}else{
				echo "<SCRIPT LANGUAGE='JavaScript'>
				window.alert('N I P anda sudah terdaftar !!')
				window.location.href='". base_url()."index.php/daftar';
				</SCRIPT>";
			}
		}else{
			$this->load->view('website/pagenotfound',array('title' => 'page not found'));
		}
	}
	function data(){
		if($this->session->userdata("daftar")!=""){
			$nip = $this->session->userdata("daftar");
			$nip = $nip['nip'];
		$data = array(
					'session' => $this->session->userdata('data'),
					'title' => 'Berikutnya, silakan cetak form ini (klik tombol Print Formulir di bagian bawah), lalu tanda tangani, lalu kumpulkan ke kantor KPRI',
					'datanya' => $this->m_koperasi->GetCalon("where nip='$nip'")->result_array()
				);
				$this->template_web->pendaftaran('website/calon_koperasi',$data);
		}else{
			 $this->load->view('website/pagenotfound',array('title' => 'page not found'));
		}
	}
	function print_data($kode=''){
		if($kode !=''){
		$id = $kode;
		$data = array(
					'data' => $this->m_koperasi->GetCalon("where nip='$id' limit 1")->result_array()
				);
				$this->load->view('print',$data);
		}else{
			 $this->load->view('website/pagenotfound',array('title' => 'page not found'));
		}
	}

	/*function preview($kode, $download_pdf=''){
		$ret ='';
		$id = $kode;
		$pdf_filename ='formulir_KPRI_its_'.$id.'.pdf';
		$link_download = ($download_pdf == 'true')?'':anchor(base_url().'index.php/daftar/preview/'.$kode.'/true','Download formulir');

		$temp = $this->m_koperasi->GetCalon("where nip = '$id' limit 1")->result_array();
		if($temp != NULL){
			$data_userinfo = array(
				'temp' => $temp,
				'link_download' => $link_download
				);
			$website = $this->load->view('print',$data_userinfo, true);

			$output = $website;

			if($download_pdf == TRUE)
				generate_pdf($output, $pdf_filename);
			else
				echo $output;

		}
	}*/
	
		}
