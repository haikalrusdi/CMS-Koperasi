<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Formulir Pendaftaran KPRI</title>
</head>
<style type="text/css">

@media print {
input.noPrint { display: none; }
}
      #container{
        width: 700px;
        margin: 0px auto;
      }
      .header{
        height: 150px;
        width: 100%; 
      }
      .header img{
        height: 150px;
        width: 700px;
      }
      #container h1{
        margin-top: 15px;
        text-align: center;
        font-size: 28px;
        font-family: Trebuchet MS;
        margin-bottom: 30px;
      }
      #container p{
        font-family: Trebuchet MS;
      }
      #container table{
        margin:0 auto;
        width:100%;
        border-collapse:
        collapse;
        margin-bottom: 30px;
      }
        #container table td{
            font-family: Trebuchet MS;
            border:1px solid #999;
        }
        #container table td{
            padding:4px 8px;
        }
        #container table td .span{
            width: 40%;
        }
        #container li{
            font-family: Trebuchet MS;
        }
        .pernyataan{
            margin-bottom: 20px;
            height: 120px;
            width: 700px;
        }
        .ttd{
            margin: 0px 0px 0px 420px; 
        }
        .catatan{
            margin-top: -20px;
            padding: 0px 10px 0px 20px;
            border: 2px solid #000;
            width: 250px;
            border-radius: 15px;
        }
        .catatan p{
        font-size: 14px;
        }
        .catatan li{
        font-size: 14px;
        }
        .button{
            height: 60px;
            margin-bottom: 70px;
        }
        .button p{
            padding: 5px;
            width: 150px;
            background: #BFBFBF;
            border: 1px solid #919191;
        }
    </style>
<body>
<div id="container">
<div class="header">
    <img src="<?php echo base_url(); ?>asset/website/images/kop_koperasi.jpg" class="img-responsive" alt=""/>
</div>
<h1> Formulir Pendaftaran Anggota</h1>

<p>Yang bertanda tangan di bawah ini : </p>
<div class="content">
<table width="100%">
<?php
        foreach ($data as $value) {
        ?>
    <tr>
        <td width="40%">Nama</td>
        <td><?php echo $value['nama'];?></td>
    </tr>

    <tr>
        <td width="40%">N I P / N I P H</td>    
        <td><?php echo $value['nip'];?></td>
    </tr>

    <tr>
        <td width="40%">Unit Kerja</td>
        <td><?php echo $value['unit'];?></td>
    </tr>

    <tr>
        <td width="40%">Tempat / Tgl.Lahir</td>    
        <td><?php echo $value['tempat_lahir'];?> / <?php echo $value['tgl_lahir'];?></td>
    </tr>

    <tr>
        <td width="40%">Pangkat/Gol (PNS)</td>    
        <td><?php echo $value['pangkat'];?></td>
    </tr>

    <tr>
        <td width="40%">No. HP/Telp.</td>
        <td><?php echo $value['telepon'];?></td>
    </tr>

    <tr>
        <td width="40%">Email</td>
        <td><?php echo $value['email'];?></td>
    </tr>

    <tr>
        <td width="40%">Alamat rumah</td>
        <td> <?php echo $value['alamat'];?></td>
    </tr>
    <tr>
        <td width="40%">Tgl. Menjadi Anggota</td>
        <td><?php echo $value['tgl_bergabung'];?></td>
    </tr>
    <?php }?>
    </table>

    <div class="pernyataan">
    <p>Saya menyatakan untuk di daftar sebagai anggota Koperasi Pegawai Republik Indonesia
       Institut Teknologi Sepuluh Nopember  (KPRI-ITS) dengan sukarela dan bersedia 
       memenuhi/mematuhi segala hak dan kewajiban sebagai anggota sebagaimana teersebut 
       dalam Anggaran Dasar (AD) dan Anggaran Rumah Tangga (ART) serta ketentuan KPRI-ITS.
    </p>
    </div>
    <div class="ttd"><p>Surabaya, <br /> Permohonan, </p></div>
    </div>
    <div class="catatan">
        <p>Kewajiban Simpanan Anggota *):</p>
        <p>1.   Simpanan Pokok Rp. 200.000,- awal menjadi anggota <br />
           2.   Simpanan Wajib per bulan :
        <ul><li>Gol IV  : Rp. 100.000,-</li>
            <li>Gol III : Rp.   80.000,-</li>
            <li>Gol II  : Rp.   50.000,-</li>
            <li>Gol I   : Rp.   30.000,-</li>
            <li>Honorer : Rp.   20.000,-</li>
        </ul> 
        </p>
        <h6>*) Kembali penuh saat keluar dari anggota</h6>
    </div> 
    <div style="text-align:center;padding:20px;">
    <input class="noPrint" type="button" value="Cetak Halaman" onclick="window.print()">
    <? echo "<input type=button value=Batal onclick=self.history.back()>";?>
    </div>
</div>

</body>
</html>