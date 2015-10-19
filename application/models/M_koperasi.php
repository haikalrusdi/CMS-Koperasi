<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_koperasi extends CI_Model {
    /*
      Aplikasi Koperasi Pegawai Negeri Institut Teknologi Sepuluh Nopember (ITS)
      Oleh Rizki Rinaldi
      file : m_koperasi.php untuk load data dari database
     */

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function GetLabel($where = '') {
        return $this->db->query("select * from label $where;");
    }

    function Getprofile($where = '') {
        return $this->db->query("select * from kop_anggota $where;");
    }

    function Getsimpanan($where = '') {
        return $this->db->query("select * from kop_simpanan $where;");
    }

    function Getpinjaman($where = '') {
        return $this->db->query("select * from kop_pinjaman $where;");
    }

    function GetLabelContent($where = '') {
        return $this->db->query("select * from content_label $where;");
    }

    function GetUser($where = '') {
        return $this->db->query("select * from userapp $where;");
    }

    function Getdataanggota($where = '') {
        return $this->db->query("select * from kop_anggota $where;");
    }

    function getdataanggotaall($where = '') {
        return $this->db->query("select * from kop_anggota LEFT JOIN kop_simpanan ON kop_simpanan.no_anggota=kop_anggota.no_anggota ;");
    }

    function GetContent($where = '') {
        return $this->db->query("select * from content $where;");
    }

    function GetContentJoinLabel($where = '') {
        return $this->db->query("select * from content inner join content_label on content.kode_content=content_label.kode_content $where;");
    }

    function GetContentView() {
        return $this->db->query("select sum(counter) as totalview from content where status = 'publish'");
    }

    function GetSetting() {
        return $this->db->query("select * from setting;");
    }

    function GetComment($where = "") {
        return $this->db->query("select content.judul_content,komentar.*  from content inner join komentar on komentar.kode_content=content.kode_content $where;");
    }

    /* Queries for Website */

    function GetAnggota($where = '') {
        return $this->db->query("select * from kop_anggota $where;");
    }

    function GetCalon($where = '') {
        return $this->db->query("select * from calon_anggota $where;");
    }

    function GetContentBlog($where = "") {
        return $this->db->query("select content.*,count(komentar.kode_comment)as totalkomentar from content left join (select * from komentar where status = 'publish' group by kode_content)as komentar on content.kode_content=komentar.kode_content inner join content_label on content.kode_content=content_label.kode_content $where;");
    }

    function GetContentPublished($where = "") {
        return $this->db->query("select count(*)as total from (select content.*,count(komentar.kode_comment)as totalkomentar from content left join komentar on content.kode_content=komentar.kode_content inner join content_label on content.kode_content=content_label.kode_content $where group by content.kode_content order by content.kode_content desc) as temp");
    }

    function GetContentDetail($where = "") {
        return $this->db->query("select content.*,count(komentar.kode_comment)as totalkomentar from content inner join komentar on content.kode_content=komentar.kode_content $where;");
    }

    function GetVisitor($where = "") {
        return $this->db->query("select * from visitor $where");
    }

    public function InsertData($table, $data) {
        return $this->db->insert($table, $data);
    }

    public function UpdateData($table, $data, $where) {
        return $this->db->update($table, $data, $where);
    }

    public function UbahPassAnggota($no_anggota, $password_baru) { //check by hatma @ 17 okt
        $this->db->where(array('sha1(no_anggota)' => $no_anggota));
        return $this->db->update('kop_anggota', array('password' => md5($password_baru)));
    }

    public function DeleteData($table, $where) {
        return $this->db->delete($table, $where);
    }

    public function view() {
        return $this->db->get('calon_anggota')->result();
    }

    function truncate_anggota() {   // checked by hatma 19 okt
        $this->db->truncate('anggota');
    }

    function truncate_simpanan() {   // checked by hatma 19 okt
        $this->db->truncate('kop_simpanan');
    }

    function truncate_pinjaman() {   // checked by hatma 19 okt
        $this->db->truncate('kop_pinjaman');
    }

    function set_default_password_anggota() {   // checked by hatma 19 oct
        $query = $this->db->query('SELECT no_anggota FROM kop_anggota WHERE password IS NULL');

        foreach ($query->result() as $row) {
           // echo $row->title;
            $this->db->query("INSERT INTO anggotapassword VALUES ('".$row->no_anggota."', md5('".$row->no_anggota."') ) ");
        }
    }

    function hapus_password_userx($id_userkoperasi) {   // checked by hatma 19 oct
        $query = $this->db->query("SELECT no_anggota FROM kop_anggota WHERE id_userkoperasi ='".$id_userkoperasi."' ");

        foreach ($query->result() as $row) {
            //echo $row->no_anggota;
            $this->db->query("DELETE FROM anggotapassword WHERE no_anggota = '".$row->no_anggota."' ) ");
        }
    }

    /* -----------Uploads Anggota---------- */

    function tambah_anggota($dataarray) { { // checked by hatma 19okt
            for ($i = 1; $i <= count($dataarray); $i++) {
                $data = array(
                    'nama' => $dataarray[$i]['nama'],
                    'nip' => $dataarray[$i]['nip'],
                    'no_anggota' => $dataarray[$i]['no_anggota'],
                    //'password'=>($dataarray[$i]['password'].$this->config->item("key_login")),
                    'unit' => $dataarray[$i]['unit'],
                    'tgl_bergabung' => $dataarray[$i]['tgl_bergabung']
                );
                $this->db->insert('anggota', $data);
            }
        }
    }

    /* -----------Uploads Simpanan---------- */

    function tambah_simpanan_baru($dataarray) { { // checked by hatma 19okt
            for ($i = 1; $i <= count($dataarray); $i++) {
                $data = array(
                    'no_anggota' => $dataarray[$i]['no_anggota'],
                    'spn_pokok' => $dataarray[$i]['spn_pokok'],
                    'spn_wajib' => $dataarray[$i]['spn_wajib'],
                    'total' => $dataarray[$i]['total'],
                    'tgl_update' => $dataarray[$i]['tgl_update']
                );
                $this->db->insert('kop_simpanan', $data);
            }
        }
    }

    /* -----------Uploads Pinjaman---------- */

    function tambah_pinjaman_baru($dataarray) { { // checked by hatma 19okt
            for ($i = 1; $i <= count($dataarray); $i++) {
                $data = array(
                    'no_anggota' => $dataarray[$i]['no_anggota'],
                    'jumlah_pinjaman' => $dataarray[$i]['jumlah_pinjaman'],
                    'masa' => $dataarray[$i]['masa'],
                    'sekarang' => $dataarray[$i]['sekarang'],
                    'sisa' => $dataarray[$i]['sisa'],
                    'angsuran_pokok' => $dataarray[$i]['angsuran_pokok'],
                    'sisa_angsuran' => $dataarray[$i]['sisa_angsuran'],
                    'keterangan' => $dataarray[$i]['keterangan'],
                    'tgl_update' => $dataarray[$i]['tgl_update']
                );
                $this->db->insert('kop_pinjaman', $data);
            }
        }
    }

    function update_anggota($dataarray) {
        for ($i = 1; $i <= count($dataarray); $i++) {
            $data = array(
                'nama' => $dataarray[$i]['nama'],
                'nip' => $dataarray[$i]['nip'],
                'no_anggota' => $dataarray[$i]['no_anggota'],
                'password' => ($dataarray[$i]['password']),
                'unit' => $dataarray[$i]['unit'],
                'tgl_bergabung' => $dataarray[$i]['tgl_bergabung']
            );
            $param = array(
                'nip' => $dataarray[$i]['nip']
            );
            $this->db->where($param);
            return $this->db->update('kop_anggota', $data);
        }
    }

    function search_anggota($dataarray) {
        for ($i = 1; $i <= count($dataarray); $i++) {
            $search = array(
                'nip' => $dataarray[$i]['nip']
            );
        }
        $data = array();
        $this->db->where($search);
        $this->db->limit(1);
        $Q = $this->db->get('kop_anggota');
        if ($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }
        $Q->free_result();
        return $data;
    }

    /* -----------Uploads Simpanan---------- */

    function tambah_simpanan($dataarray) { {
            for ($i = 1; $i <= count($dataarray); $i++) {
                $data = array(
                    'no_anggota' => $dataarray[$i]['no_anggota'],
                    'spn_pokok' => $dataarray[$i]['spn_pokok'],
                    'spn_wajib' => $dataarray[$i]['spn_wajib'],
                    'total' => $dataarray[$i]['total'],
                    'tgl_update' => $dataarray[$i]['tgl_update']
                );
                $this->db->insert('kop_simpanan', $data);
            }
        }
    }

    function update_simpanan($dataarray) {
        for ($i = 1; $i <= count($dataarray); $i++) {
            $data = array(
                'no_anggota' => $dataarray[$i]['no_anggota'],
                'spn_pokok' => $dataarray[$i]['spn_pokok'],
                'spn_wajib' => $dataarray[$i]['spn_wajib'],
                'total' => $dataarray[$i]['total'],
                'tgl_update' => $dataarray[$i]['tgl_update']
            );
            $param = array(
                'no_anggota' => $dataarray[$i]['no_anggota']
            );
            $this->db->where($param);
            return $this->db->update('kop_simpanan', $data);
        }
    }

    function search_simpanan($dataarray) {
        for ($i = 1; $i <= count($dataarray); $i++) {
            $search = array(
                'no_anggota' => $dataarray[$i]['no_anggota']
            );
        }
        $data = array();
        $this->db->where($search);
        $this->db->limit(1);
        $Q = $this->db->get('kop_simpanan');
        if ($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }
        $Q->free_result();
        return $data;
    }

    /* -----------Uploads Pinjaman---------- */

    function tambah_pinjaman($dataarray) { {
            for ($i = 1; $i <= count($dataarray); $i++) {
                $data = array(
                    'no_anggota' => $dataarray[$i]['no_anggota'],
                    'jumlah_pinjaman' => $dataarray[$i]['jumlah_pinjaman'],
                    'nip' => $dataarray[$i]['nip'],
                    'masa' => $dataarray[$i]['masa'],
                    'sekarang' => $dataarray[$i]['sekarang'],
                    'sisa' => $dataarray[$i]['sisa'],
                    'angsuran_pokok' => $dataarray[$i]['angsuran_pokok'],
                    'sisa_angsuran' => $dataarray[$i]['sisa_angsuran'],
                    'keterangan' => $dataarray[$i]['keterangan'],
                    'tgl_update' => $dataarray[$i]['tgl_update']
                );
                $this->db->insert('kop_pinjaman', $data);
            }
        }
    }

    function update_pinjaman($dataarray) {
        for ($i = 1; $i <= count($dataarray); $i++) {
            $data = array(
                'no_anggota' => $dataarray[$i]['no_anggota'],
                'nip' => $dataarray[$i]['nip'],
                'jumlah_pinjaman' => $dataarray[$i]['jumlah_pinjaman'],
                'masa' => $dataarray[$i]['masa'],
                'sekarang' => $dataarray[$i]['sekarang'],
                'sisa' => $dataarray[$i]['sisa'],
                'angsuran_pokok' => $dataarray[$i]['angsuran_pokok'],
                'sisa_angsuran' => $dataarray[$i]['sisa_angsuran'],
                'keterangan' => $dataarray[$i]['keterangan'],
                'tgl_update' => $dataarray[$i]['tgl_update']
            );
            $param = array(
                'no_anggota' => $dataarray[$i]['no_anggota']
            );
            $this->db->where($param);
            return $this->db->update('kop_pinjaman', $data);
        }
    }

    function search_pinjaman($dataarray) {
        for ($i = 1; $i <= count($dataarray); $i++) {
            $search = array(
                'nip' => $dataarray[$i]['nip'], // Tambahkan kolom NIP di Database dan set "Masa" dan "NIP" menjadi NULL
                'no_anggota' => $dataarray[$i]['no_anggota']
            );
        }
        $data = array();
        $this->db->where($search);
        $this->db->limit(1);
        $Q = $this->db->get('kop_pinjaman');
        if ($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }
        $Q->free_result();
        return $data;
    }

}

?>
