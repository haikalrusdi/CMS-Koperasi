<?php

function sqlinjection($data) {
    $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(html_sqlspecialchars($data, ENT_QUOTES))));
    return $filter_sql;
}

//

if (isset($_POST['submit'])) {
    // bagian ini telah dirubah 5213100034 & 5213100166 dan 5213100177 & 5213100193 menambahkan code ENT_QUOTES

    $username = htmlspecialchars(mysql_real_escape_string($_POST['username']), ENT_QUOTES); //changed

    $password = htmlspecialchars(mysql_real_escape_string(md5($_POST['password'])), ENT_QUOTES); //changed
    //$pwd=mysql_real_escape_string($_POST['passwd']);
    $sql1 = "SELECT * FROM userapp WHERE name='$username' and password='$password'";
    $result1 = mysql_query($sql1);
    $count1 = mysql_num_rows($result1);
    session_start();
    if ($count1 > 0) {
        setcookie(User, $username);
        header("location: index.php");
    }
}

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Adminwebsite extends CI_Controller {
    /*
      Aplikasi Koperasi Pegawai Negeri Institut Teknologi Sepuluh Nopember (ITS)
      Oleh Rizki Rinaldi
      file : adminwebsite.php untuk aplikasi content management system Koperasi
     */

    function __construct() {    // checked by Hatma @ 18 okt
        parent::__construct();
        if (!isset($_SESSION)) {
            session_start();
        }
        $this->load->library(array('pagination', 'session', 'template', 'Excel_reader', 'form_validation'));
        $this->load->model('m_koperasi');
        $this->load->helper(array('form', 'url', 'inflector'));
    }

    function index() {  // checked by Hatma @ 18 okt
        $this->cek_session();
        $data = array(
            'total_post' => $this->m_koperasi->GetContent()->num_rows(),
            'total_comment' => $this->m_koperasi->GetComment()->num_rows(),
            'page_view' => $this->m_koperasi->GetContentView()->result_array(),
            'post' => $this->m_koperasi->GetContent("where status = 'publish' order by counter desc")->result_array(),
            'comment' => $this->m_koperasi->GetComment("where komentar.status = 'pending' order by komentar.kode_comment")->result_array(),
            'session' => $this->session->userdata('login'),
            'title' => 'Dasboard admin Koperasi ITS'
        );
        $this->template->display('adminwebsite/home', $data);
    }

    function login($mess = 1) { // checked by Hatma 17 okt
        $this->load->view('adminwebsite/login', array('message' => $mess, 'title' => 'Login dasboard admin Koperasi ITS'));
    }

    function proseslogin() {    // checked by Hatma @ 18 okt
        if ($_POST) {

            if ($_POST['username'] == "" | $_POST['password'] == "" | $_POST['captcha'] == "" | $_POST["captcha"] != $_SESSION["capt"] | $_SESSION["capt"] == '') {
                echo "<SCRIPT LANGUAGE='JavaScript'>
						window.alert('Semua kolom wajib diisi! captcha harus sesuai!')
						window.location.href='" . base_url() . "index.php/admin';
						</SCRIPT>";
            } else {
                $username = strip_tags($_POST['username']); //ini telah diubah oleh 5213100034 & 5213100166  dan 5213100177 & 5213100193 menambahkan code ENT_QUOTES
                //ini telah diubah oleh 5213100034 & 5213100166  dan 5213100177 & 5213100193 menambahkan code ENT_QUOTES
                //$password = htmlspecialchars($_POST['password'], ENT_QUOTES); //Prevent from SQL Injection & Ganti (encrypt) Password di tabel Userapp menjadi md5
                //$username = htmlspecialchars($username);
                $password = strip_tags($_POST['password']);
                //$capt = $_POST["captcha"] != $_SESSION["capt"] OR $_SESSION["capt"] == '';
                $temp = $this->m_koperasi->GetUser("where username = '$username' and password = md5('$password')")->result_array();
                if ($temp != NULL) {
                    $data = array(
                        'username' => $temp[0]['username'],
                        'pengguna' => $temp[0]['nama_lengkap']//,
                            //'password' => $temp[0]['password'],
                            //'capt' => $temp[0]['capt']
                    );
                    $this->session->set_userdata('login', $data);
                    redirect("adminwebsite");
                } else {
                    echo "<SCRIPT LANGUAGE='JavaScript'>
				window.alert('No Anggota atau Password Anda Salah !!')
				window.location.href='" . base_url() . "index.php/adminwebsite';
				</SCRIPT>";
                }
            }
        } else {
            $this->load->view('adminwebsite/pagenotfound', array('title' => 'page not found'));
        }
    }

    function newcontent() {
        $this->cek_session();
        $data_sess = $this->session->userdata('login');
        $data = array(
            'session' => $this->session->userdata('login'),
            'username' => $data_sess['pengguna'],
            'kode_content' => '',
            'judul_content' => '',
            'header_post' => '',
            'deskripsi' => '',
            'status' => 'baru',
            'tampilan_status' => '',
            'status_content' => '',
            'label' => $this->m_koperasi->GetLabel()->result_array(),
            'label_post' => array(),
            'tags' => '',
            'isi' => '',
            'title' => 'Dasboard admin Koperasi ITS - isi content'
        );
        $this->template->display('adminwebsite/editor_berita', $data);
    }

    function editcontent($kode = 0) {
        $this->cek_session();
        $data_sess = $this->session->userdata('login');
        $data_content = $this->m_koperasi->GetContent("where kode_content = '$kode'")->result_array();
        /* label to array */
        $label_post_arr = array();
        foreach ($this->m_koperasi->GetLabelContent("where kode_content = '$kode'")->result_array() as $lab) {
            $label_post_arr[] = $lab['kode_label'];
        }
        /* end label to array */
        $data = array(
            'session' => $this->session->userdata('login'),
            'username' => $data_sess['pengguna'],
            'kode_content' => $data_content[0]['kode_content'],
            'judul_content' => $data_content[0]['judul_content'],
            'header_post' => $data_content[0]['image_header'],
            'deskripsi' => $data_content[0]['deskripsi'],
            'status_content' => $data_content[0]['status'],
            'status' => 'lama',
            'tampilan_status' => $data_content[0]['tampilan_status'],
            'label' => $this->m_koperasi->GetLabel()->result_array(),
            'label_post' => $label_post_arr,
            'tags' => $data_content[0]['tags'],
            'isi' => $data_content[0]['content'],
            'title' => 'Dasboard admin Koperasi ITS - edit content'
        );
        $this->template->display('adminwebsite/editor_berita', $data);
    }

    function session_preview() {
        $this->cek_session();
        if ($_POST) {
            $data_sess = $this->session->userdata('login');
            $data = array(
                'username' => $data_sess['username'],
                'judul_content' => $_POST['judul_post'],
                'header_post' => $_POST['header_post'],
                'penulis' => $data_sess['pengguna'],
                'tanggal' => date("Y-m-d H:i:s"),
                'tags' => $_POST['tags'],
                'isi' => $_POST['isi'],
                'title' => 'Dasboard admin Koperasi ITS'
            );
            /* can't use CI session for save any values :-( */
            /* $this->session->set_userdata('pratinjau',$data);
              print_r($this->session->userdata('pratinjau')); */
            /* session php */
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['pratinjau'] = $data;
        } else {
            $this->load->view('adminwebsite/pagenotfound', array('title' => 'page not found'));
        }
    }

    function pratinjau() {
        $this->cek_session();
        /* preview post */
        /* can't use CI session for save any values :-( */
        /* $sess_pratinjau = $this->session->userdata('pratinjau'); */
        /* session php */
        if (!isset($_SESSION)) {
            session_start();
        }
        $sess_pratinjau = $_SESSION['pratinjau'];
        $data_sess = $this->session->userdata('login');
        $data = array(
            'username' => $data_sess['username'],
            'judul_content' => isset($_POST['judul_post']) ? $_POST['judul_post'] : $sess_pratinjau['judul_content'],
            'header_post' => isset($_POST['header_post']) ? $_POST['header_post'] : $sess_pratinjau['header_post'],
            'penulis' => $data_sess['pengguna'],
            'tanggal' => date("Y-m-d H:i:s"),
            'tags' => isset($_POST['tags']) ? $_POST['tags'] : $sess_pratinjau['tags'],
            'isi' => isset($_POST['isi']) ? $_POST['isi'] : $sess_pratinjau['isi'],
        );

        $this->session->set_userdata('pratinjau', $data);
        /* end */
        $sess_pratinjau = $this->session->userdata('pratinjau');
        $data_setting = $this->m_koperasi->GetSetting()->result_array();
        $data = array(
            'recent_post' => $this->m_koperasi->GetContent("where status = 'publish' order by rand() limit 5")->result_array(),
            'content' => $sess_pratinjau,
            'penulis' => $sess_pratinjau["penulis"],
            'deskripsi' => $data_setting[0]['deskripsi_blog'],
            'author' => 'Ahmad Rizal Afani (Koperasi ITS)',
            'title' => $data_setting[0]['judul_blog'] . ' - ' . $sess_pratinjau['judul_content'],
            'komentar' => '',
            'fb_fans_page' => $data_setting[0]['facebook_fans_page'],
            'twitter' => $data_setting[0]['twitter'],
            'penulis' => $this->m_koperasi->GetUser("where username = '" . $sess_pratinjau['username'] . "'")->result_array(),
        );
        $this->template->display('adminwebsite/preview', $data);
    }

    function savecontent() {
        $this->cek_session();
        $data_sess = $this->session->userdata('login');
        $this->load->library('upload');
        $nmfile = "file_" . time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './asset/files/header_content/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2M
        $config['max_width'] = '1288'; //lebar maksimum 1288 px
        $config['max_height'] = '768'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->load->library('upload', $config);
        $file = $this->upload->initialize($config);
        chmod($file, 0777);
        if ($_FILES['filefoto']['name']) {
            if ($this->upload->do_upload('filefoto')) {
                $gbr = $this->upload->data();
                chmod($gbr, 0777);
                $status_simpan = array('status_simpan' => $this->input->post('status_simpan'),
                    'labels' => $this->input->post('labels'));
                $data = array(
                    'judul_content' => $this->input->post('judul_post'),
                    'image_header' => $gbr['file_name'],
                    'image_detail' => $gbr['file_type'],
                    'deskripsi' => $this->input->post('deskripsi'),
                    'tanggal' => date("Y-m-d H:i:s"),
                    'penulis' => $data_sess['pengguna'],
                    'content' => $this->input->post('isi'),
                    'tags' => $this->input->post('tags'),
                    'status' => $this->input->post('status'),
                    'tampilan_status' => $this->input->post('tampilan_status'),
                    'counter' => 0
                );
                if ($status_simpan['status_simpan'] == "baru") {
                    $result = $this->m_koperasi->InsertData('content', $data);
                    if ($result == 1) {
                        $terakhir = $this->m_koperasi->GetContent('order by kode_content desc limit 1')->result_array();
                        foreach ($status_simpan['labels'] as $l) {
                            $data = array(
                                'kode_content' => $terakhir[0]['kode_content'],
                                'kode_label' => $l
                            );
                            $this->m_koperasi->InsertData('content_label', $data);
                        }
                        header('location:' . base_url() . 'index.php/adminwebsite/content/2');
                    } else {
                        header('location:' . base_url() . 'index.php/adminwebsite/content/0');
                    }
                } else {
                    $this->m_koperasi->DeleteData('content_label', array('kode_content' => $kode_content));
                    $data = array(
                        'judul_content' => $this->input->post('judul_post'),
                        'image_header' => $gbr['file_name'],
                        'image_detail' => $gbr['file_type'],
                        'deskripsi' => $this->input->post('deskripsi'),
                        'tanggal' => date("Y-m-d H:i:s"),
                        'penulis' => $data_sess['pengguna'],
                        'content' => $this->input->post('isi'),
                        'tags' => $this->input->post('tags'),
                        'status' => $this->input->post('status'),
                        'tampilan_status' => $this->input->post('tampilan_status')
                    );
                    $result = $this->m_koperasi->UpdateData('content', $data, array('kode_content' => $kode_content));
                    if ($result == 1) {
                        foreach ($labels as $l) {
                            $data = array(
                                'kode_content' => $kode_content,
                                'kode_label' => $l
                            );
                            $this->m_koperasi->InsertData('content_label', $data);
                        }
                        header('location:' . base_url() . 'index.php/adminwebsite/content/3');
                    } else {
                        header('location:' . base_url() . 'index.php/adminwebsite/content/0');
                    }
                }
            }
        } else {
            $this->load->view('adminwebsite/pagenotfound', array('title' => 'page not found'));
        }
    }

    function deletecontent($kode = 0) {
        $this->cek_session();
        $this->m_koperasi->DeleteData('content_label', array('kode_content' => $kode));
        $result = $this->m_koperasi->DeleteData('content', array('kode_content' => $kode));
        if ($result == 1) {
            header('location:' . base_url() . 'index.php/adminwebsite/content/1');
        } else {
            header('location:' . base_url() . 'index.php/adminwebsite/content/0');
        }
    }

    function content($mess = -1) {
        $this->cek_session();
        $data = array(
            'session' => $this->session->userdata('login'),
            'content' => $this->m_koperasi->GetContent('order by kode_content desc')->result_array(),
            'message' => $mess,
            'title' => 'Dasboard admin Koperasi ITS - semua content'
        );
        $this->template->display('adminwebsite/berita', $data);
    }

    function contentpublish($mess = -1) {
        $this->cek_session();
        $data = array(
            'session' => $this->session->userdata('login'),
            'content' => $this->m_koperasi->GetContent('where status = "publish" order by kode_content desc')->result_array(),
            'message' => $mess,
            'title' => 'Dasboard admin Koperasi ITS - semua content diterbitkan'
        );
        $this->template->display('adminwebsite/berita', $data);
    }

    function contentdraft($mess = -1) {
        $this->cek_session();
        $data = array(
            'session' => $this->session->userdata('login'),
            'content' => $this->m_koperasi->GetContent('where status = "draft" order by kode_content desc')->result_array(),
            'message' => $mess,
            'title' => 'Dasboard admin Koperasi ITS - semua content draft'
        );
        $this->template->display('adminwebsite/berita', $data);
    }

    function labels($mess = -1) {
        $this->cek_session();
        $data = array(
            'session' => $this->session->userdata('login'),
            'status' => 'baru',
            'judul_label' => '',
            'kode_label' => '',
            'message' => $mess,
            'label' => $this->m_koperasi->GetLabel("order by kode_label desc")->result_array(),
            'title' => 'Dasboard admin Koperasi ITS - semua label'
        );
        $this->template->display('adminwebsite/label_berita', $data);
    }

    function editlabel($kode = 0) {
        $this->cek_session();
        $temp = $this->m_koperasi->GetLabel("where kode_label = '$kode'")->result_array();
        $data = array(
            'session' => $this->session->userdata('login'),
            'status' => 'lama',
            'judul_label' => $temp[0]['judul_label'],
            'kode_label' => $temp[0]['kode_label'],
            'message' => "",
            'label' => $this->m_koperasi->GetLabel("where kode_label != '$kode' order by kode_label desc")->result_array(),
            'title' => 'Dasboard admin Koperasi ITS - edit label'
        );
        $this->template->display('adminwebsite/label_berita', $data);
    }

    function savelabel() {
        $this->cek_session();
        if ($_POST) {
            $status = $_POST['status'];
            $kode_label = $_POST['kode_label'];
            $judul_label = $_POST['judul_label'];
            if ($status == "baru") {
                $data = array(
                    'kode_label' => $kode_label,
                    'judul_label' => $judul_label
                );
                $result = $this->m_koperasi->InsertData('label', $data);
                if ($result == 1) {
                    header('location:' . base_url() . 'index.php/adminwebsite/labels/2');
                } else {
                    header('location:' . base_url() . 'index.php/adminwebsite/labels/0');
                }
            } else {
                $data = array(
                    'judul_label' => $judul_label
                );
                $result = $this->m_koperasi->UpdateData('label', $data, array('kode_label' => $kode_label));
                if ($result == 1) {
                    header('location:' . base_url() . 'index.php/adminwebsite/labels/3');
                } else {
                    header('location:' . base_url() . 'index.php/adminwebsite/labels/0');
                }
            }
        } else {
            $this->load->view('adminwebsite/pagenotfound', array('title' => 'page not found'));
        }
    }

    function deletelabel($kode = 1) {
        $this->cek_session();
        $result = $this->m_koperasi->DeleteData('label', array('kode_label' => $kode));
        if ($result == 1) {
            header('location:' . base_url() . 'index.php/adminwebsite/labels/1');
        } else {
            header('location:' . base_url() . 'index.php/adminwebsite/labels/0');
        }
    }

    function users($mess = -1) {
        $this->cek_session();
        $data = array(
            'session' => $this->session->userdata('login'),
            'message' => $mess,
            'user' => $this->m_koperasi->GetUser()->result_array(),
            'title' => 'Dasboard admin Koperasi ITS - semua user'
        );
        $this->template->display('adminwebsite/admin', $data);
    }

    function updateusers() {
        $this->cek_session();
        $data_sess = $this->session->userdata('login');
        $data = array(
            'session' => $this->session->userdata('login'),
            'username' => $data_sess['pengguna'],
            'judul_content' => '',
            'header_post' => '',
            'status' => '',
            'label' => $this->m_koperasi->GetLabel()->result_array(),
            'label_post' => array(),
            'title' => 'Dasboard admin Koperasi ITS - isi content'
        );
        $this->template->display('adminwebsite/input_user', $data);
    }

    function saveuser() {
        $this->cek_session();
        if ($_POST) {
            //ini telah diubah oleh 5213100034 & 5213100166
            $username = mysql_real_escape_string($_POST['username']);

            $pengguna = $_POST['pengguna'];

            $password = mysql_real_escape_string(md5, $_POST['password']); //ini telah diubah oleh 5213100034 & 5213100166

            $facebook = $_POST['facebook'];
            $twitter = $_POST['twitter'];
            $g_plus = $_POST['g_plus'];

            $temp = $this->m_koperasi->GetUser("where username = '$username'")->result_array();
            if ($temp == NULL) {
                $data = array(
                    'username' => $username,
                    'nama_lengkap' => $pengguna,
                    'password' => $password,
                    'facebook' => $facebook,
                    'twitter' => $twitter,
                    'g_plus' => $g_plus
                );
                $result = $this->m_koperasi->InsertData('userapp', $data);
                if ($result == 1) {
                    header('location:' . base_url() . 'index.php/adminwebsite/users/1');
                } else {
                    header('location:' . base_url() . 'index.php/adminwebsite/users/0');
                }
            } else {
                header('location:' . base_url() . 'index.php/adminwebsite/users/3');
            }
        } else {
            $this->load->view('adminwebsite/pagenotfound', array('title' => 'page not found'));
        }
    }

    function edituser($kodeuser) {
        $this->cek_session();
        $mess = -1;
        $data = array(
            'session' => $this->session->userdata('login'),
            'message' => $mess,
            'datauser' => $this->m_koperasi->GetUser("where kode_user = '$kodeuser'")->result_array(),
            'user' => $this->m_koperasi->GetUser("where kode_user = '$kodeuser'")->result_array(),
            'title' => 'Dasboard admin Koperasi ITS - semua user'
        );

        $this->template->display('adminwebsite/admin', $data);
    }

    function deleteuser($kode = 0) {
        $this->cek_session();
        $result = $this->m_koperasi->DeleteData('userapp', array('kode_user' => $kode));
        if ($result == 1) {
            header('location:' . base_url() . 'index.php/adminwebsite/users/2');
        } else {
            header('location:' . base_url() . 'index.php/adminwebsite/users/0');
        }
    }

    function statistikpost() {
        $this->cek_session();
        $data = array(
            'post' => $this->m_koperasi->GetContent("where status = 'publish' order by counter")->result_array(),
            'session' => $this->session->userdata('login'),
            'title' => 'Dasboard admin Koperasi ITS - statistik'
        );
        $this->template->display('adminwebsite/statistik_post', $data);
    }

    function statistikvisitor() {
        $this->cek_session();
        //page view hari ini, kemarin, bulan ini dan sepanjang waktu
        //visitor OS, browser, lokasi
        $tanggal_wingi = date("d");
        $view_stat = array(
            'day' => $this->m_koperasi->GetVisitor("where SUBSTRING(tanggal,1,10) = '" . date("Y-m-d") . "'")->num_rows(),
            'yesterday' => $this->m_koperasi->GetVisitor("where SUBSTRING(tanggal,1,10) = '" . date("Y-m-d", strtotime("yesterday")) . "'")->num_rows(),
            'mounth' => $this->m_koperasi->GetVisitor("where SUBSTRING(tanggal,1,7) = '" . date("Y-m") . "'")->num_rows(),
            'year' => $this->m_koperasi->GetVisitor("where SUBSTRING(tanggal,1,4) = '" . date("Y") . "'")->num_rows(),
            'sepanjang_waktu' => $this->m_koperasi->GetVisitor()->num_rows(),
        );
        $data = array(
            'session' => $this->session->userdata('login'),
            'post' => $this->m_koperasi->GetContent("where status = 'publish' order by counter desc limit 5")->result_array(),
            'visitor' => $view_stat,
            'title' => 'Dasboard admin Koperasi ITS - statistik'
        );
        $this->template->display('adminwebsite/statistik_visitor', $data);
    }

    function listcomment($mess = -1) {
        $this->cek_session();
        $data = array(
            'message' => $mess,
            'session' => $this->session->userdata('login'),
            'comment' => $this->m_koperasi->GetComment("order by kode_comment desc")->result_array(),
            'title' => 'Dasboard admin Koperasi ITS - komentar'
        );
        $this->template->display('adminwebsite/comment', $data);
    }

    function publishingcomment($kode = 0) {
        $this->cek_session();
        $data = array('status' => 'publish');
        $result = $this->m_koperasi->UpdateData('komentar', $data, array('kode_comment' => $kode));
        if ($result == 1) {
            header('location:' . base_url() . 'index.php/adminwebsite/listcomment/1');
        } else {
            header('location:' . base_url() . 'index.php/adminwebsite/listcomment/0');
        }
    }

    function deletingcomment($kode = 0) {
        $this->cek_session();
        $result = $this->m_koperasi->DeleteData('komentar', array('kode_comment' => $kode));
        if ($result == 1) {
            header('location:' . base_url() . 'index.php/adminwebsite/listcomment/3');
        } else {
            header('location:' . base_url() . 'index.php/adminwebsite/listcomment/0');
        }
    }

    function replycomment($kode = 0) {
        $this->cek_session();
        $data = array(
            'comment' => $this->m_koperasi->GetComment("where content.kode_content = '$kode' order by kode_comment")->result_array(),
            'session' => $this->session->userdata('login'),
            'title' => 'Dasboard admin Koperasi ITS - balas komentar'
        );
        $this->template->display('adminwebsite/commentreply', $data);
    }

    function myreply() {
        $this->cek_session();
        if ($_POST) {
            $data_sess = $this->session->userdata('login');
            $data = array(
                'kode_content' => $_POST['kode_content'],
                'isi' => $_POST['mycomment'],
                'status' => 'publish',
                'pengirim' => $data_sess['pengguna'],
                'website' => 'Koperasi ITS',
                'tanggal' => date("Y-m-d H:i:s")
            );
            $result = $this->m_koperasi->InsertData('komentar', $data);
            if ($result == 1) {
                header('location:' . base_url() . 'index.php/adminwebsite/listcomment/2');
            } else {
                header('location:' . base_url() . 'index.php/adminwebsite/listcomment/0');
            }
        } else {
            $this->load->view('adminwebsite/pagenotfound', array('title' => 'page not found'));
        }
    }

    function settingdasar($mess = -1) {
        $this->cek_session();
        $data = array(
            'session' => $this->session->userdata('login'),
            'message' => $mess,
            'setting' => $this->m_koperasi->GetSetting()->result_array(),
            'title' => 'Dasboard admin Koperasi ITS - setting dasar'
        );
        $this->template->display('adminwebsite/setting_dasar', $data);
    }

    function savesettingdasar() {
        $this->cek_session();
        if ($_POST) {
            $site_title = $_POST['site_title'];
            $deskripsi = $_POST['deskripsi'];
            $limit_content = $_POST['limit_content'];
            $fb = $_POST['fb'];
            $fb_fans = $_POST['fb_fans'];
            $twitter = $_POST['twitter'];
            $g_plus = $_POST['g_plus'];
            $email = $_POST['email'];

            $data = array(
                'judul_blog' => $site_title,
                'deskripsi_blog' => $deskripsi,
                'limit_content' => $limit_content,
                'facebook' => $fb,
                'facebook_fans_page' => $fb_fans,
                'twitter' => $twitter,
                'g_plus' => $g_plus,
                'email' => $email
            );
            $result = $this->m_koperasi->UpdateData('setting', $data, array('kode_blog' => '1'));
            if ($result == 1) {
                header('location:' . base_url() . 'index.php/adminwebsite/settingdasar/1');
            } else {
                header('location:' . base_url() . 'index.php/adminwebsite/settingdasar/0');
            }
        } else {
            $this->load->view('adminwebsite/pagenotfound', array('title' => 'page not found'));
        }
    }

    function saveinformation() {
        $this->cek_session();
        if ($_POST) {
            $data = array(
                'information' => $_POST['information']
            );
            $result = $this->m_koperasi->UpdateData('setting', $data, array('kode_blog' => '1'));
            if ($result == 1) {
                header('location:' . base_url() . 'index.php/adminwebsite/settingdasar/1');
            } else {
                header('location:' . base_url() . 'index.php/adminwebsite/settingdasar/0');
            }
        } else {
            $this->load->view('adminwebsite/pagenotfound', array('title' => 'page not found'));
        }
    }

    function settingprofile($mess = -1) {
        $this->cek_session();
        $data_sess = $this->session->userdata('login');
        $data_user = $this->m_koperasi->GetUser("where username = '" . $data_sess['username'] . "'")->result_array();
        $data = array(
            'session' => $this->session->userdata('login'),
            'kode_user' => $data_user[0]['kode_user'],
            'username' => $data_user[0]['username'],
            'nama_lengkap' => $data_user[0]['nama_lengkap'],
            'fb' => $data_user[0]['facebook'],
            'twitter' => $data_user[0]['twitter'],
            'g_plus' => $data_user[0]['g_plus'],
            'about' => $data_user[0]['about'],
            'message' => $mess,
            'title' => 'Dasboard admin Koperasi ITS - setting profile'
        );
        $this->template->display('adminwebsite/setting_profile', $data);
    }

    function saveprofile() {
        $this->cek_session();
        if ($_POST) {
            $data_sess = $this->session->userdata('login');

            $kode_user = $_POST['kode_user'];

            $username = mysql_real_escape_string($_POST['username']); //ini telah diubah oleh 5213100034 & 5213100166
            $nama_lengkap = $_POST['nama_lengkap'];
            $facebook = $_POST['facebook'];
            $g_plus = $_POST['g_plus'];
            $twitter = $_POST['twitter'];
            $about = $_POST['about'];

            $password = mysql_real_escape_string(md5, $_POST['password']); //ini telah diubah oleh 5213100034 & 5213100166

            if ($password == $data_sess['password']) {
                $data = array(
                    'username' => $username,
                    'nama_lengkap' => $nama_lengkap,
                    'facebook' => $facebook,
                    'twitter' => $twitter,
                    'g_plus' => $g_plus,
                    'about' => $about
                );
                $result = $this->m_koperasi->UpdateData('userapp', $data, array('kode_user' => $kode_user));
                if ($result == 1) {
                    $new_data_sess = array(
                        'username' => $data_sess['username'],
                        'pengguna' => $nama_lengkap,
                        'password' => $data_sess['password']
                    );
                    $this->session->set_userdata('login', $new_data_sess);
                    header('location:' . base_url() . 'index.php/adminwebsite/settingprofile/1');
                } else {
                    header('location:' . base_url() . 'index.php/adminwebsite/settingprofile/0');
                }
            } else {
                header('location:' . base_url() . 'index.php/adminwebsite/settingprofile/0');
            }
        } else {
            $this->load->view('adminwebsite/pagenotfound', array('title' => 'page not found'));
        }
    }

    function settingpassword($mess = -1) {
        $this->cek_session();
        $data_sess = $this->session->userdata('login');
        $data = array(
            'session' => $this->session->userdata('login'),
            'username' => $data_sess['username'],
            'message' => $mess,
            'title' => 'Dasboard admin Koperasi ITS - setting password'
        );
        $this->template->display('adminwebsite/setting_password', $data);
    }

    function savepassword() {
        $this->cek_session();
        if ($_POST) {
            $data_sess = $this->session->userdata('login');
            $username = $_POST['username'];
            $password_lama = $_POST['password_lama'];
            $password_baru = $_POST['password_baru'];

            if ($password_lama == $data_sess['password']) {
                $data = array('password' => $password_baru);
                $result = $this->m_koperasi->UpdateData('userapp', $data, array('username' => $username));
                if ($result == 1) {
                    $new_data_sess = array(
                        'username' => $data_sess['username'],
                        'pengguna' => $data_sess['pengguna'],
                        'password' => $password_baru
                    );
                    $this->session->set_userdata('login', $new_data_sess);
                    header('location:' . base_url() . 'index.php/adminwebsite/settingpassword/1');
                } else {
                    header('location:' . base_url() . 'index.php/adminwebsite/settingpassword/0');
                }
            } else {
                header('location:' . base_url() . 'index.php/adminwebsite/settingpassword/0');
            }
        } else {
            $this->load->view('adminwebsite/pagenotfound', array('title' => 'page not found'));
        }
    }

    function destroyingsession() {  //checked by hatma @ 18 okt
        $this->session->sess_destroy();
        if (!isset($_SESSION)) {
            session_start();
        }
        //session_destroy();
        header('location:' . base_url() . 'index.php/adminwebsite/login');
    }

    function cek_session() {    // checked by Hatma @ 17 okt
        if (!$this->session->userdata('login')) {
            header('location:' . base_url() . 'index.php/adminwebsite/login');
            exit(0);
        }
    }

    /* ------KOPERASI -------- */

    //INSERT
    function insertuser() { //checked by hatma 19oct
        $this->cek_session();
        $data_sess = $this->session->userdata('login');
        $data = array(
            'session' => $this->session->userdata('login'),
            'username' => $data_sess['pengguna'],
            'id_userkoperasi' => '',
            'nama' => '',
            'nip' => '',
            'no_anggota' => '',
            'unit' => '',
            'tgl_bergabung' => '',
            'status' => 'baru',
            'title' => 'Dasboard admin Koperasi ITS - Insert Anggota'
        );
        $this->template->display('adminwebsite/input_anggota1', $data);
    }

    function saveanggota() {    // checked by hatma 19 oct
        $this->cek_session();
        if ($_POST) {
            $data_sess = $this->session->userdata('login');
            $nama = $_POST['nama'];
            $nip = $_POST['nip'];
            $no_anggota = $_POST['no_anggota'];
            $no_anggota_lama = $_POST['no_anggota_lama'];
            $password = ($_POST['password']);
            $unit = $_POST['unit'];
            $tgl_bergabung = $_POST['tgl_bergabung'];
            $status_simpan = $_POST['status_simpan'];
            $kode_anggota = $_POST['id_userkoperasi'];
            if ($status_simpan == "baru") {
                $data = array(
                    'nama' => $nama,
                    'nip' => $nip,
                    'no_anggota' => $no_anggota,
                    //'password' => md5($password),
                    'unit' => $unit,
                    'tgl_bergabung' => $tgl_bergabung
                );
                $result = $this->m_koperasi->InsertData('anggota', $data);
               
                $data2 = array(
                    'no_anggota' => $no_anggota,
                    'password' => md5($password)
                );
                $result2 = $this->m_koperasi->InsertData('anggotapassword', $data2);
                
                if ($result = 1) {
                    header('location:' . base_url() . 'index.php/adminwebsite/dataanggota/2');
                } else {
                    header('location:' . base_url() . 'index.php/adminwebsite/dataanggota/0');
                }
            } else {
                $data = array(
                    'nama' => $nama,
                    'nip' => $nip,
                    'no_anggota' => $no_anggota,
                    //'password' => md5($password),
                    'unit' => $unit,
                    'tgl_bergabung' => $tgl_bergabung
                );
                $result = $this->m_koperasi->UpdateData('anggota', $data, array('id_userkoperasi' => $kode_anggota));
                
                $data2 = array(
                    'no_anggota' => $no_anggota,
                    'password' => md5($password)
                );
                $result2 = $this->m_koperasi->UpdateData('anggotapassword', $data2, array('no_anggota' => $no_anggota_lama));
                
                if ($result == 1) {
                    header('location:' . base_url() . 'index.php/adminwebsite/dataanggota/3');
                } else {
                    header('location:' . base_url() . 'index.php/adminwebsite/dataanggota/0');
                }
            }
        } else {
            $this->load->view('adminwebsite/pagenotfound', array('title' => 'page not found'));
        }
    }

    function editanggota($kode = 0) {   // checked by hatma 19okt
        $this->cek_session();
        $data_sess = $this->session->userdata('login');
        $data_content = $this->m_koperasi->Getdataanggota("where id_userkoperasi = '$kode'")->result_array();
        /* label to array */
        $data = array(
            'session' => $this->session->userdata('login'),
            'username' => $data_sess['pengguna'],
            'id_userkoperasi' => $data_content[0]['id_userkoperasi'],
            'nama' => $data_content[0]['nama'],
            'nip' => $data_content[0]['nip'],
            'no_anggota' => $data_content[0]['no_anggota'],
            'password' => $data_content[0]['password'],
            'unit' => $data_content[0]['unit'],
            'tgl_bergabung' => $data_content[0]['tgl_bergabung'],
            'status' => 'lama',
            'title' => 'Dasboard admin Koperasi ITS - edit content'
        );
        $this->template->display('adminwebsite/input_anggota1', $data);
    }

    function tampilprofile($kode = 0) { //checked by hatma 19 okt
        $this->cek_session();
        $data_sess = $this->session->userdata('login');
        $data_content = $this->m_koperasi->Getdataanggota("where id_userkoperasi = '$kode'")->result_array();
        /* label to array */
        $data = array(
            'session' => $this->session->userdata('login'),
            'username' => $data_sess['pengguna'],
            'id_userkoperasi' => $data_content[0]['id_userkoperasi'],
            'nama' => $data_content[0]['nama'],
            'nip' => $data_content[0]['nip'],
            'no_anggota' => $data_content[0]['no_anggota'],
            'password' => $data_content[0]['password'],
            'unit' => $data_content[0]['unit'],
            'tgl_bergabung' => $data_content[0]['tgl_bergabung'],
            'status' => 'lama',
            'title' => 'Dasboard admin Koperasi ITS - edit content'
        );
        $this->template->display('adminwebsite/input_anggota1', $data);
    }

    function deleteanggota($kode = 0) {
        $this->cek_session();
        $result = $this->m_koperasi->DeleteData('anggota', array('id_userkoperasi' => $kode));
        $this->m_koperasi->hapus_password_userx($kode);
        if ($result == 1) {
            header('location:' . base_url() . 'index.php/adminwebsite/dataanggota/1');
        } else {
            header('location:' . base_url() . 'index.php/adminwebsite/dataanggota/0');
        }
    }

    //IMPORT
    function insertusers() {   //checked by hatma 19okt
        $this->cek_session();
        $data_sess = $this->session->userdata('login');
        $data = array(
            'session' => $this->session->userdata('login'),
            'username' => $data_sess['pengguna'],
            'judul_content' => '',
            'header_post' => '',
            'status' => 'baru',
            'label' => $this->m_koperasi->GetLabel()->result_array(),
            'label_post' => array(),
            'title' => 'Dasboard admin Koperasi ITS - Import Anggota'
        );
        $this->template->display('adminwebsite/input_anggota', $data);
    }

    function do_upload() {  //checked by hatma 19 okt
        $this->cek_session();
        $config['upload_path'] = './asset/files/data_koperasi/';
        $config['allowed_types'] = 'xls';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            $data = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('msg_excel', 'Insert failed. Please check your file, only .xls file allowed.');
        } else {

            $data = array('error' => false);
            $upload_data = $this->upload->data();

            $this->load->library('excel_reader');
            $this->excel_reader->setOutputEncoding('CP1251');

            $file = $upload_data['full_path'];
            $this->excel_reader->read($file);
            error_reporting(E_ALL ^ E_NOTICE);

            // Sheet 1
            $data = $this->excel_reader->sheets[0];
            $dataexcel = Array();

            for ($i = 2; $i <= $data['numRows']; $i++) {
                if ($data['cells'][$i][1] == '')
                    break;
                $dataexcel[$i - 1]['nama'] = $data['cells'][$i][1];
                $dataexcel[$i - 1]['nip'] = $data['cells'][$i][2];
                $dataexcel[$i - 1]['no_anggota'] = $data['cells'][$i][3];
                //$dataexcel[$i - 1]['password'] = $data['cells'][$i][4];
                $dataexcel[$i - 1]['unit'] = $data['cells'][$i][5];
                $dataexcel[$i - 1]['tgl_bergabung'] = $data['cells'][$i][6];
            }


            //cek data
            //$check = $this->m_koperasi->search_anggota($dataexcel);
            /* var_dump($check);
              exit(); */
            //if (count($check) > 0) {
            //    $this->m_koperasi->update_anggota($dataexcel);
            //    header('location:' . base_url() . 'index.php/adminwebsite/dataanggota/1');
            //} else {
                $this->m_koperasi->truncate_anggota();
                $this->m_koperasi->tambah_anggota($dataexcel);
                $this->m_koperasi->set_default_password_anggota();
                echo "<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Upload Anggota Sukses !')
                        window.location.href='" . base_url() . "index.php/admin';
                        </SCRIPT>";
                //header('location:' . base_url() . 'index.php/adminwebsite/');
            //}
        }
        //	header('location:'.base_url().'index.php/adminwebsite/dataanggota');
    }

    function dataanggota($mess = -1) {  // checked by hatma @ 19 oct 2015
        $this->cek_session();
        $data_sess = $this->session->userdata('login');
        $data = array(
            'session' => $this->session->userdata('login'),
            'status' => '',
            'message' => $mess,
            'data_anggota' => $this->m_koperasi->getdataanggotaall()->result_array(),
            'label_post' => array(),
            'title' => 'Dasboard admin Koperasi ITS - Daftar Anggota'
        );
        $this->template->display('adminwebsite/data_anggota', $data);
    }

    function insertsimpanan() { // checked by hatma 19 okt
        $this->cek_session();
        $data_sess = $this->session->userdata('login');
        $data = array(
            'session' => $this->session->userdata('login'),
            'username' => $data_sess['pengguna'],
            'judul_content' => '',
            'header_post' => '',
            'status' => '',
            'label' => $this->m_koperasi->GetLabel()->result_array(),
            'label_post' => array(),
            'title' => 'Dasboard admin Koperasi ITS - isi content'
        );
        $this->template->display('adminwebsite/input_simpanan', $data);
    }

    function updatesimpanan() { // checked by hatma 19 okt
        $this->cek_session();
        $config['upload_path'] = './asset/files/data_koperasi/';
        $config['allowed_types'] = 'xls';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            $data = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('msg_excel', 'Insert failed. Please check your file, only .xls file allowed.');
        } else {

            $data = array('error' => false);
            $upload_data = $this->upload->data();

            $this->load->library('excel_reader');
            $this->excel_reader->setOutputEncoding('CP1251');

            $file = $upload_data['full_path'];
            $this->excel_reader->read($file);
            error_reporting(E_ALL ^ E_NOTICE);

            // Sheet 1
            $data = $this->excel_reader->sheets[0];
            $dataexcel = Array();

            for ($i = 2; $i <= $data['numRows']; $i++) {
                if ($data['cells'][$i][1] == '')
                    break;
                $dataexcel[$i - 1]['no_anggota'] = $data['cells'][$i][1];
                $dataexcel[$i - 1]['spn_pokok'] = $data['cells'][$i][2];
                $dataexcel[$i - 1]['spn_wajib'] = $data['cells'][$i][3];
                $dataexcel[$i - 1]['total'] = $data['cells'][$i][4];
                $dataexcel[$i - 1]['tgl_update'] = Date("Y-m-d H:i:s");
            }
            //cek data
            /*
            $check = $this->m_koperasi->search_simpanan($dataexcel);
            if (count($check) > 0) {
                $this->m_koperasi->update_simpanan($dataexcel);
                header('location:' . base_url() . 'index.php/adminwebsite/dataanggota/1');
            } else {
                $this->m_koperasi->tambah_simpanan($dataexcel);
                header('location:' . base_url() . 'index.php/adminwebsite/dataanggota/1');
            } 
             */
                $this->m_koperasi->truncate_simpanan();
                $this->m_koperasi->tambah_simpanan_baru($dataexcel);
                echo "<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Upload Simpanan Sukses !')
                        window.location.href='" . base_url() . "index.php/admin';
                        </SCRIPT>";
        }
        //	header('location:'.base_url().'index.php/adminwebsite/dataanggota');
    }

    function insertpinjaman() { // checked by hatma 19 okt
        $this->cek_session();
        $data_sess = $this->session->userdata('login');
        $data = array(
            'session' => $this->session->userdata('login'),
            'username' => $data_sess['pengguna'],
            'judul_content' => '',
            'header_post' => '',
            'status' => '',
            'label' => $this->m_koperasi->GetLabel()->result_array(),
            'label_post' => array(),
            'title' => 'Dasboard admin Koperasi ITS - isi content'
        );
        $this->template->display('adminwebsite/input_pinjaman', $data);
    }

    function updatepinjaman() { // checked by hatma 19 okt
        $this->cek_session();
        $config['upload_path'] = './asset/files/data_koperasi/';
        $config['allowed_types'] = 'xls';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            $data = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('msg_excel', 'Insert failed. Please check your file, only .xls file allowed.');
        } else {

            $data = array('error' => false);
            $upload_data = $this->upload->data();

            $this->load->library('excel_reader');
            $this->excel_reader->setOutputEncoding('CP1251');

            $file = $upload_data['full_path'];
            $this->excel_reader->read($file);
            error_reporting(E_ALL ^ E_NOTICE);

            // Sheet 1
            $data = $this->excel_reader->sheets[0];
            $dataexcel = Array();

            for ($i = 2; $i <= $data['numRows']; $i++) {
                if ($data['cells'][$i][1] == '')
                    break;
                $dataexcel[$i - 1]['no_anggota'] = $data['cells'][$i][1];
                $dataexcel[$i - 1]['jumlah_pinjaman'] = $data['cells'][$i][2];
                $dataexcel[$i - 1]['masa'] = $data['cells'][$i][3];
                $dataexcel[$i - 1]['sekarang'] = $data['cells'][$i][4];
                $dataexcel[$i - 1]['sisa'] = $data['cells'][$i][5];
                $dataexcel[$i - 1]['angsuran_pokok'] = $data['cells'][$i][6];
                $dataexcel[$i - 1]['sisa_angsuran'] = $data['cells'][$i][7];
                $dataexcel[$i - 1]['keterangan'] = $data['cells'][$i][8];
                $dataexcel[$i - 1]['tgl_update'] = Date("Y-m-d H:i:s");
            }
            //cek data
            /*
            $check = $this->m_koperasi->search_pinjaman($dataexcel);
            if (count($check) > 0) {
                $this->m_koperasi->update_pinjaman($dataexcel);
                header('location:' . base_url() . 'index.php/adminwebsite/dataanggota/1');
            } else {
                $this->m_koperasi->tambah_pinjaman($dataexcel);
                header('location:' . base_url() . 'index.php/adminwebsite/dataanggota/1');
            }
             */
                $this->m_koperasi->truncate_pinjaman();
                $this->m_koperasi->tambah_pinjaman_baru($dataexcel);
                echo "<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Upload Pinjaman Sukses !')
                        window.location.href='" . base_url() . "index.php/admin';
                        </SCRIPT>";
                
        }
        //	header('location:'.base_url().'index.php/adminwebsite/dataanggota');
    }

}
