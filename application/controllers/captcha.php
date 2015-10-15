<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Captcha extends CI_Controller {
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
		$text = rand(10000,99999);
		$_SESSION['capt'] = $text;
		$height = 25;
		$width = 65; 
		 
		$image_p = imagecreate($width, $height);
		$black = imagecolorallocate($image_p, 100,149,237);
		$white = imagecolorallocate($image_p, 255, 255, 255);
		$font_size = 14; 
		 
		imagestring($image_p, $font_size, 5, 5, $text, $white);
		imagejpeg($image_p, null, 80);
	}
}