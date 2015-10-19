<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Website extends CI_Controller {
    /*
      Aplikasi Koperasi Pegawai Negeri Institut Teknologi Sepuluh Nopember (ITS)
      Oleh Rizki Rinaldi
      file : websitesite.php untuk websitesite Koperasi
     */

    function __construct() {
        parent::__construct();
        if (!isset($_SESSION)) {
            session_start();
        }
        $this->load->library(array('pagination', 'session', 'template_web'));
        $this->load->model('m_koperasi');
        $this->load->helper(array('form', 'url'));
    }

    function index($offset = 0) {
        $this->countervisitor();
        $data_setting = $this->m_koperasi->GetSetting()->result_array();
        $total_data = $this->m_koperasi->GetContentPublished("where content.status = 'publish'")->result_array();
        $page_config = array(
            'per_page' => $data_setting[0]['limit_content'],
            'total_rows' => $total_data[0]['total'],
            'base_url' => base_url() . 'index.php/website/index/',
            'full_tag_open' => '<div class="pager clr">',
            'full_tag_close' => '</div>'
        );
        $view_stat = array(
            'day' => $this->m_koperasi->GetVisitor("where SUBSTRING(tanggal,1,10) = '" . date("Y-m-d") . "'")->num_rows(),
            'yesterday' => $this->m_koperasi->GetVisitor("where SUBSTRING(tanggal,1,10) = '" . date("Y-m-d", strtotime("yesterday")) . "'")->num_rows(),
            'mounth' => $this->m_koperasi->GetVisitor("where SUBSTRING(tanggal,1,7) = '" . date("Y-m") . "'")->num_rows(),
            'year' => $this->m_koperasi->GetVisitor("where SUBSTRING(tanggal,1,4) = '" . date("Y") . "'")->num_rows(),
            'sepanjang_waktu' => $this->m_koperasi->GetVisitor()->num_rows(),
        );

        $this->pagination->initialize($page_config);

        $data = array(
            'links' => $this->pagination->create_links(),
            'recent_post' => $this->m_koperasi->GetContent("where status = 'publish' order by rand() limit 5")->result_array(),
            'label' => $this->m_koperasi->GetLabel()->result_array(),
            'content' => $this->m_koperasi->GetContentBlog("where content.status = 'publish' group by content.kode_content order by content.kode_content desc limit $offset," . $data_setting[0]['limit_content'])->result_array(),
            'slide' => $this->m_koperasi->GetContentBlog("where content.tampilan_status = 'Utama' group by content.kode_content order by content.kode_content desc limit $offset," . $data_setting[0]['limit_content'])->result_array(),
            'deskripsi' => $data_setting[0]['deskripsi_blog'],
            'author' => 'Rizki Rinaldi (KPN-ITS)',
            'title' => $data_setting[0]['judul_blog'],
            'visitor' => $view_stat,
            'facebook' => $data_setting[0]['facebook'],
            'fb_fans_page' => $data_setting[0]['facebook_fans_page'],
            'twitter' => $data_setting[0]['twitter'],
            'g_plus' => $data_setting[0]['g_plus'],
            'email' => $data_setting[0]['email']
        );
        $this->template_web->display('website/home', $data);
    }

    function kategori($kode = -1, $offset = 0) {
        $this->countervisitor();
        $data_setting = $this->m_koperasi->GetSetting()->result_array();
        $data_label = $this->m_koperasi->GetLabel("where kode_label = '$kode'")->result_array();

        $total_data = $this->m_koperasi->GetContentPublished("where content.status = 'publish' and content_label.kode_label = '$kode'")->result_array();
        $page_config = array(
            'per_page' => $data_setting[0]['limit_content'],
            'total_rows' => $total_data[0]['total'],
            'base_url' => base_url() . 'index.php/website/kategori/' . $kode,
            'full_tag_open' => '<div class="pager clr">',
            'full_tag_close' => '</div>'
        );

        $this->pagination->initialize($page_config);
        $data = array(
            'links' => $this->pagination->create_links(),
            'recent_post' => $this->m_koperasi->GetContent("where status = 'publish' order by rand() limit 5")->result_array(),
            'label' => $this->m_koperasi->GetLabel()->result_array(),
            'content' => $this->m_koperasi->GetContentBlog("where content.status = 'publish' and content_label.kode_label = '$kode' group by content.kode_content order by kode_content desc limit $offset," . $data_setting[0]['limit_content'])->result_array(),
            'deskripsi' => $data_setting[0]['deskripsi_blog'],
            'author' => 'Rizki Rinaldi (KPN-ITS)',
            'title' => $data_setting[0]['judul_blog'] . ' - kategori ' . $data_label[0]['judul_label'],
            'facebook' => $data_setting[0]['facebook'],
            'fb_fans_page' => $data_setting[0]['facebook_fans_page'],
            'twitter' => $data_setting[0]['twitter'],
            'g_plus' => $data_setting[0]['g_plus'],
            'email' => $data_setting[0]['email']
        );
        $this->load->view('website/index', $data);
    }

    function detail($judul = '', $kode = 0) {
        $this->countervisitor();
        $data_setting = $this->m_koperasi->GetSetting()->result_array();
        //$data_content =  $this->m_koperasi->GetContentDetail("where content.kode_content = '$kode'")->result_array();		
        $data_content = $this->m_koperasi->GetContentBlog("where content.kode_content = '$kode'")->result_array();
        $view_stat = array(
            'day' => $this->m_koperasi->GetVisitor("where SUBSTRING(tanggal,1,10) = '" . date("Y-m-d") . "'")->num_rows(),
            'yesterday' => $this->m_koperasi->GetVisitor("where SUBSTRING(tanggal,1,10) = '" . date("Y-m-d", strtotime("yesterday")) . "'")->num_rows(),
            'mounth' => $this->m_koperasi->GetVisitor("where SUBSTRING(tanggal,1,7) = '" . date("Y-m") . "'")->num_rows(),
            'year' => $this->m_koperasi->GetVisitor("where SUBSTRING(tanggal,1,4) = '" . date("Y") . "'")->num_rows(),
            'sepanjang_waktu' => $this->m_koperasi->GetVisitor()->num_rows(),
        );
        $data = array(
            'recent_post' => $this->m_koperasi->GetContent("where status = 'publish' order by rand() limit 5")->result_array(),
            'content' => $data_content,
            'penulis' => $this->m_koperasi->GetUser("where nama_lengkap = '" . $data_content[0]['penulis'] . "' limit 1")->result_array(),
            'deskripsi' => $data_setting[0]['deskripsi_blog'],
            'visitor' => $view_stat,
            'author' => 'Rizki Rinaldi (KPN-ITS)',
            'title' => $data_setting[0]['judul_blog'] . '-' . $data_content[0]['judul_content'],
            'komentar' => $this->m_koperasi->GetComment("where komentar.kode_content = '$kode' and komentar.status = 'publish'")->result_array(),
            'facebook' => $data_setting[0]['facebook'],
            'fb_fans_page' => $data_setting[0]['facebook_fans_page'],
            'twitter' => $data_setting[0]['twitter'],
            'g_plus' => $data_setting[0]['g_plus'],
            'email' => $data_setting[0]['email']
        );
        $this->cookiesetter($kode);
        $this->template_web->display_detail('website/detail', $data);
    }

    function savecomment() {
        if ($_POST) {
            $data = array(
                'kode_content' => $_POST['kode_content'],
                'isi' => htmlentities($_POST['isi_comment']),
                'status' => 'pending',
                'pengirim' => htmlentities($_POST["name"]),
                'websitesite' => htmlentities($_POST["websitesite"]),
                'email' => htmlentities($_POST["email"]),
                'tanggal' => date("Y-m-d H:i:s")
            );
            $result = $this->m_koperasi->InsertData('komentar', $data);
            if ($result == 1) {
                echo "1";
            } else {
                echo "0";
            }
        } else {
            echo "<h2>Access Denied !!</h2>";
        }
    }

    function ajaxcaptcha($kode = 0) {
        $vals = array(
            'img_path' => './captcha/',
            'img_url' => base_url() . 'captcha/',
            'font_path' => base_url() . 'system/font/texb.ttf',
            'img_width' => 200,
            'img_height' => 60,
            'word_length' => 8,
            'font_size' => 16,
            'expiration' => 90,
            'pool' => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
        );

        $cap = create_captcha($vals);
        $data = array(
            'captcha_time' => $cap['time'],
            'ip_address' => $this->input->ip_address(),
            'word' => $cap['word']
        );
        $expiration = time() - 90;
        $this->db->query("delete from captcha where captcha_time < " . $expiration);
        $this->dbkpri->Insert_string('captcha', $data);
        echo 'Submit the word you see below:';
        echo $cap['image'];
        echo '<input type="text" name="captcha" value="" />';
        $this->load->view('website/form_komentar', array('kode_content' => $kode, 'image' => $cap['image']));
    }

    function validasicaptcha() {
        if ($_POST) {
            $expiration = time() - 90;
            $this->dbkpri->where('captcha_time < ', $expiration)
                    ->delete('captcha');
            //$this->dbkpri->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);

            $sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
            $binds = array($_POST['text_user'], $this->input->ip_address(), $expiration);
            $query = $this->db->query($sql, $binds);
            $row = $query->row();

            if ($row->count == 0) {
                echo "0";
            } else {
                echo "1";
            }
        } else {
            echo "<H2>Access Denied !!</H2>";
        }
    }

    function contact() {
        $this->countervisitor();
        $data_setting = $this->m_koperasi->GetSetting()->result_array();
        $data = array(
            'recent_post' => $this->m_koperasi->GetContent("where status = 'publish' order by rand() limit 5")->result_array(),
            'deskripsi' => $data_setting[0]['deskripsi_blog'],
            'author' => 'Rizki Rinaldi (KPN-ITS)',
            'title' => $data_setting[0]['judul_blog'] . ' - Contact',
            'facebook' => $data_setting[0]['facebook'],
            'fb_fans_page' => $data_setting[0]['facebook_fans_page'],
            'twitter' => $data_setting[0]['twitter'],
            'g_plus' => $data_setting[0]['g_plus'],
            'email' => $data_setting[0]['email'],
            'info' => $data_setting[0]['information'],
        );
        $this->load->view('website/contact', $data);
    }

    private function cookiesetter($kode = 0) {
        if (!isset($_COOKIE[$kode])) {
            $content = $this->m_koperasi->GetContent("where kode_content = '$kode'")->result_array();
            $result = $this->m_koperasi->UpdateData('content', array('counter' => ($content[0]['counter'] + 1)), array('kode_content' => $kode));
            if ($result == 1) {
                setcookie($kode, "http://KPN-ITS", time() + 3600);
            }
        }
    }

    private function countervisitor() {
        if ($this->agent->is_browser()) {
            $agent = $this->agent->browser() . ' ' . $this->agent->version();
        } elseif ($this->agent->is_robot()) {
            $agent = $this->agent->robot();
        } elseif ($this->agent->is_mobile()) {
            $agent = $this->agent->mobile();
        } else {
            $agent = 'Unidentified User Agent';
        }

        $data_visitor = $this->m_koperasi->GetVisitor("where ip = '" . $_SERVER['REMOTE_ADDR'] . "'")->result_array();
        if ($data_visitor == NULL) {
            $data = array(
                'ip' => $_SERVER['REMOTE_ADDR'],
                'os' => $this->agent->platform(),
                'browser' => $agent,
                'tanggal' => date("Y-m-d H:i:s")
            );
            $this->m_koperasi->InsertData('visitor', $data);
            $this->session->set_userdata('KPN-ITS', "Rizki Rinaldi");
            setcookie("KPN-ITS", 'Rizki Rinaldi', time() + 3600 * 24);
        } else {
            if (!isset($_COOKIE['KPN-ITS'])) {
                $data_visitor = $this->m_koperasi->GetVisitor("where ip = '" . $_SERVER['REMOTE_ADDR'] . "' and tanggal = '" . date("Y-m-d H:i:s") . "'");
                if ($data_visitor != NULL) {
                    if (!$this->session->userdata('KPN-ITS')) {
                        $data = array(
                            'ip' => $_SERVER['REMOTE_ADDR'],
                            'os' => $this->agent->platform(),
                            'browser' => $agent,
                            'tanggal' => date("Y-m-d H:i:s")
                        );
                        $this->m_koperasi->InsertData('visitor', $data);
                        $this->session->set_userdata('KPN-ITS', "Rizki Rinaldi");
                        setcookie("KPN-ITS", 'Rizki Rinaldi', time() + 3600 * 24);
                    } else {
                        setcookie("KPN-ITS", 'Rizki Rinaldi', time() + 3600 * 24);
                    }
                } else {
                    $data = array(
                        'ip' => $_SERVER['REMOTE_ADDR'],
                        'os' => $this->agent->platform(),
                        'browser' => $agent,
                        'tanggal' => date("Y-m-d H:i:s")
                    );
                    $this->m_koperasi->InsertData('visitor', $data);
                    $this->session->set_userdata('KPN-ITS', "Rizki Rinaldi");
                    setcookie("KPN-ITS", 'Rizki Rinaldi', time() + 3600 * 24);
                }
            }
        }
    }

}
