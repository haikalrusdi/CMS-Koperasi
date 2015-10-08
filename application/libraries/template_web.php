<?php
class Template_web {
    /*
	Aplikasi Koperasi Pegawai Negeri Institut Teknologi Sepuluh Nopember (ITS)
	Oleh Rizki Rinaldi
	file : template.php Libraries template adminwebsite
	*/
    protected $_ci;
    
    function __construct() {
        $this->_ci =& get_instance();
    }
/*------------ Template Website --------*/    
    function display($index,$data=null){
        $data ['_content'] =$this->_ci->load->view($index,$data, true);
        $data ['_menu'] =$this->_ci->load->view('website/template/menu',$data, true);
		$data ['_slide'] =$this->_ci->load->view('website/template/slide',$data, true);
		$data ['_grid'] =$this->_ci->load->view('website/template/grid-slid',$data, true);
		$data ['_sidebar'] =$this->_ci->load->view('website/template/sidebar',$data, true);
		$data ['_footer'] =$this->_ci->load->view('website/template/footer',$data, true);
        
        $this->_ci->load->view('website/index.php', $data);
    }
    function display_detail($index,$data=null){
        $data ['_content'] =$this->_ci->load->view($index,$data, true);
        $data ['_menu'] =$this->_ci->load->view('website/template/menu',$data, true);
        $data ['_sidebar'] =$this->_ci->load->view('website/template/sidebar',$data, true);
        $data ['_footer'] =$this->_ci->load->view('website/template/footer',$data, true);
        
        $this->_ci->load->view('website/index_detail.php', $data);
    }
/*------------ Template Login --------*/
	function login($index,$data=null){
        $data ['_halaman'] =$this->_ci->load->view($index,$data, true);
		$data ['_sidebar'] =$this->_ci->load->view('login/sidebar',$data, true);
        $this->_ci->load->view('login/home.php', $data);
    }
/*------------ Template Pendaftaran --------*/
    function pendaftaran($index,$data=null){
        $data ['_content'] =$this->_ci->load->view($index,$data, true);
        $data ['_menu'] =$this->_ci->load->view('website/template/menu',$data, true);
        $data ['_sidebar'] =$this->_ci->load->view('website/template/sidebar',$data, true);
        $data ['_footer'] =$this->_ci->load->view('website/template/footer',$data, true);

        $this->_ci->load->view('website/daftar.php', $data);
    }
}
