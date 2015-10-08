<?php
class Template {
    /*
	Aplikasi Koperasi Pegawai Negeri Institut Teknologi Sepuluh Nopember (ITS)
	Oleh Rizki Rinaldi
	file : template.php Libraries template adminwebsite
	*/
    protected $_ci;
    
    function __construct() {
        $this->_ci =& get_instance();
    }
    
    function display($index,$data=null){
        $data ['_content'] =$this->_ci->load->view($index,$data, true);
        $data ['_navigation'] =$this->_ci->load->view('adminwebsite/template/navigation',$data, true);
        
        $this->_ci->load->view('adminwebsite/index.php', $data);
    }
}
