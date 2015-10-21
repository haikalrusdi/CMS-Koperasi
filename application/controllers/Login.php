<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {
    /*
      Aplikasi Koperasi Pegawai Negeri Institut Teknologi Sepuluh Nopember (ITS)
      Oleh Rizki Rinaldi
      file : websitesite.php untuk websitesite Koperasi
     */

    function __construct() { // checked by Hatma @ 17 okt
        parent::__construct();
        if (!isset($_SESSION)) {
            session_start();
        }
        $this->load->library(array('pagination', 'session', 'template_web'));
        $this->load->model('m_koperasi');
        $this->load->helper(array('form', 'url'));
    }

    function index() {  // CHECKED by Hatma @ 17 okt
        if ($this->session->userdata("login") != "") {
            $data = array(
                'session' => $this->session->userdata('login'),
                'title' => 'Dasboard Anggota Koperasi ITS'
            );
            $this->template_web->login('login/index', $data);
        } else {
            echo "<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Anda Harus Login Dulu !!')
				window.location.href='" . base_url() . "index.php/website';
				</SCRIPT>";
        }
    }

    function masuk() {  // CHECKED by Hatma at 17 okt 
        if ($_POST) {
            $no_anggota = $_POST['no_anggota'];
            $password = $_POST['password'] . $this->config->item("key_login");
            $no_anggota = htmlspecialchars($no_anggota);
            $password = strip_tags($password);
            $capt = $_POST["captcha"] == $_SESSION["capt"] OR $_SESSION["capt"] == '';

            /* $no_anggota = htmlspecialchars(mysql_real_escape_string($_POST['no_anggota']), ENT_QUOTES); //ini telah diubah oleh 5213100034 & 5213100166 dan 5213100177 & 5213100193 menambahkan code ENT_QUOTES

              $password = htmlspecialchars(mysql_real_escape_string($_POST['password'].$this->config->item("key_login")), ENT_QUOTES); //ini telah diubah oleh 5213100034 & 5213100166  dan 5213100177 & 5213100193 menambahkan code ENT_QUOTES
              $no_anggota = htmlspecialchars($no_anggota);
              $password = strip_tags($password); */

            if ($capt  ) { //sebaiknya menggunakan != karena value dari ifnya masih kosong sehingga menyebabkan bug pada log in captcha 5213100177
			echo "<script>alert('Kode CAPTCHA tidak valid!')</script>";}
			else {
				echo "<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Captcha yang anda inputkan salah !!')
				window.location.href='" . base_url() . "index.php/website';
				</SCRIPT>";
                redirect(website);
            }

            $temp = $this->m_koperasi->GetAnggota("where no_anggota = '$no_anggota' and password = md5('$password')")->result_array();
            //$result = mysql_query($temp);
            //$sSuccessMsg = ($temp != NULL ?
            //                "<div class=\"alert-box success\">Succesfully logged in.<a href=\"\" class=\"close\">&times;</a></div>" :
            //                "<div class=\"alert-box alert\">Wrong user name or password.<a href=\"\" class=\"close\">&times;</a></div>");
            if ($temp != NULL) {
                $data = array(
                    //'logged_in' => 'yesGetMeLogin',
                    'no_anggota' => $temp[0]['no_anggota'],
                    'pengguna' => $temp[0]['nama']//,
                    //'password' => $temp[0]['password'],
                    //'capt' => $temp[0]['capt']
                );
                $this->session->set_userdata('login', $data);
                redirect("login");
            } else {
                echo "<SCRIPT LANGUAGE='JavaScript'>
				window.alert('No Anggota atau Password Anda Salah !!')
				window.location.href='" . base_url() . "index.php/website';
				</SCRIPT>";
            }
        } else {
            $this->load->view('website/pagenotfound', array('title' => 'page not found'));
        }
    }

    function profile($kode) {   // checked by Hatma @ 17 okt
        if ($this->session->userdata("login") != "") {
            $temp = $this->m_koperasi->Getprofile("where sha1(no_anggota)='$kode'")->result_array();
            $data = array(
                'session' => $this->session->userdata('login'),
                'status' => 'lama',
                'message' => "",
                'profile' => $this->m_koperasi->Getprofile("where sha1(no_anggota) = '$kode' limit 1 ")->result_array(),
                'title' => 'Anggota Koperasi ITS - edit label'
            );
            $this->template_web->login('login/profile', $data);
        } else {
            echo "<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Anda Harus Login Dulu !!')
				window.location.href='" . base_url() . "index.php/website';
				</SCRIPT>";
        }
    }

    function simpanan($kode) {  // checked by Hatma @ 17 okt
        if ($this->session->userdata("login") != "") {
            $temp = $this->m_koperasi->Getsimpanan("where sha1(no_anggota) = '$kode'")->result_array();
            $data = array(
                'session' => $this->session->userdata('login'),
                'status' => 'lama',
                'message' => "",
                'simpanan' => $this->m_koperasi->Getsimpanan("where sha1(no_anggota) = '$kode' limit 1")->result_array(),
                'title' => 'Anggota Koperasi ITS - edit label'
            );
            $this->template_web->login('login/simpanan', $data);
        } else {
            redirect("website");
        }
    }

    function pinjaman($kode) { // checked by hatma @ 17 okt
        if ($this->session->userdata("login") != "") {
            $temp = $this->m_koperasi->Getpinjaman("where sha1(no_anggota) = '$kode'")->result_array();
            if ($temp != NULL) {
                $data = array(
                    'session' => $this->session->userdata('login'),
                    'message' => "",
                    'pimjaman' => $this->m_koperasi->Getpinjaman("where sha1(no_anggota) = '$kode' limit 1")->result_array(),
                    'title' => 'Anggota Koperasi ITS - edit label'
                );
                $this->template_web->login('login/pinjaman', $data);
            } else {
                $data = array(
                    'session' => $this->session->userdata('login'),
                    'status' => 'Anda tidak Memiliki Data Pinjaman',
                    'message' => "",
                    'pimjaman' => $this->m_koperasi->Getpinjaman("where sha1(no_anggota) = '$kode' limit 1")->result_array(),
                    'title' => 'Anggota Koperasi ITS - edit label'
                );
                $this->template_web->login('login/pinjaman', $data);
            }
        } else {
            echo "<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Anda Harus Login Dulu !!')
				window.location.href='" . base_url() . "index.php/website';
				</SCRIPT>";
        }
    }

    function reset_pswd($kode) {    // CHECKED by Hatma @ 17 okt
        if ($this->session->userdata("login") != "") {
            $temp = $this->m_koperasi->GetAnggota("where sha1(no_anggota) = '$kode'")->result_array();
            $data = array(
                'session' => $this->session->userdata('login'),
                'status' => '',
                'message' => "",
                'anggota' => $this->m_koperasi->GetAnggota("where sha1(no_anggota) = '$kode' limit 1")->result_array(),
                'title' => 'Anggota Koperasi ITS'
            );
            $this->template_web->login('login/reset_pswd', $data);
        } else {
            redirect("website");
        }
    }

    function ganti_pswd($id) {  // Checked by Hatma @ 17 okt
        if ($this->session->userdata("login") != "") {
            if ($_POST) {

                if ($_POST['password_lama'] == "" | $_POST['password_baru'] == "" | $_POST['ulangi_password'] == "" | ($_POST['password_baru'] != $_POST['ulangi_password'] )) {
                    echo "<SCRIPT LANGUAGE='JavaScript'>
						window.alert('Semua kolom wajib diisi! Password baru harus sama dengan password lama!')
						window.location.href='" . base_url() . "index.php/login';
						</SCRIPT>";
                } else {

                    $password_lama = $_POST['password_lama'] ; //. $this->config->item("key_login");
                    $password_baru = $_POST['password_baru'] ; //. $this->config->item("key_login");
                    $temp = $this->m_koperasi->GetAnggota("where sha1(no_anggota) = '$id' and password = md5('$password_lama')")->result_array();
                    if ($temp != NULL) {
                        $result = $this->m_koperasi->UbahPassAnggota($id, $password_baru);
                        if ($result == 1) {
                            echo "<SCRIPT LANGUAGE='JavaScript'>
                                                    window.alert('Data Berhasil Di Update !!')
                                                    window.location.href='" . base_url() . "index.php/login';
                                                    </SCRIPT>";
                        } else
                            echo "<SCRIPT LANGUAGE='JavaScript'>
                                                    window.alert('Data gagal Di Update !!')
                                                    window.location.href='" . base_url() . "index.php/login';
                                                    </SCRIPT>";
                    } else {
                        echo "<SCRIPT LANGUAGE='JavaScript'>
                                            window.alert('Data Tidak Di Update !! Password lama salah')
                                            window.location.href='" . base_url() . "index.php/login';
                                            </SCRIPT>";
                    }
                }
            }
        } else {
            echo "<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Anda Harus Login Dulu !!')
				window.location.href='" . base_url() . "index.php/website';
				</SCRIPT>";
        }
    }

    function destroyingsession() { // CHECKED by Hatma @ 17okt
        $this->session->sess_destroy();
        if (!isset($_SESSION)) {
            session_start();
        }
        //session_destroy();
        redirect("website");
    }

}
