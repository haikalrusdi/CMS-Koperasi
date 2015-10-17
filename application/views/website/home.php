<ul class="spinner1">
			<i class="paperclip"> </i>
			<li class="spinner_head"><h3>Berita</h3></li>
			<html>
<head>
<title>Berita Online</title>
<meta http-equiv="content-type"content="text/html;
charset=UTF-8">
<!-- <link href="style.css"rel="stylesheet"type="text/css"> -->
</head>
<body>
<div id="kanvas">
 <div id="header">
  <h1 align="center">SEPUTAR KPRI ITS</h1><br>
  <h1 align="center"></h1><br>
   <font size="+2"><center>Launching KPRI ITS</center></font>
   <h1 align="center"></h1><br>
  </div>
<div id="menu">
</div>
    <div id="content">
    <div class="deskripsi">
<center>
<img src="http://localhost/CMS-koperasi/asset/website/images/kopma.jpg" width="500"height="223">
<p>KPRI ITS atau yang kepanjangannya adalah Koperasi Pegawai Republik Indonesia - Institut Teknologi Sepuluh Nopember Surabaya berlokasi di samping Gelanggang Olahraga (GOR) Bulutangkis ITS.</p>
<br><br><br><br><br><br><br><br><br><br>
</center></div></div>
<div id="sidebar">
 <div class="deskripsi">
</p>
</div>
</div>
  <div style="clear:both"></div>
  <div id="footer">
   <p>Copyright &copy; 2015 Koperasi Pegawai Republik Indonesia</p>
    </div>
</div>
	<div class="clearfix"> </div>
</ul>
<div class="berita">
<?php foreach($content as $c){ ?>
	<div class="a-top">
		<div class="left-grid">
		<img src="<?php echo base_url(); ?>asset/files/header_content/<?php echo $c['image_header']; ?>" class="img-responsive" alt=""/>
	</div>
		<div class="right-grid">
		<a href="<?php echo base_url(); ?>index.php/tutorial-<?php echo strtolower(str_replace(' ','-',preg_replace("/[^a-zA-Z0-9\s]/", "", $c['judul_content']))).'-'.$c['kode_content']; ?>">
			<?php echo $c['judul_content']; ?>
		</a>
					 <div class="clearfix"></div>
					<ul>
						<li>
                            <span>Tanggal : </span>
                            <span><?php echo $c['tanggal']; ?></span>
                        </li>
                        <li>
                            <span>Posted by : </span>
                            <span><?php echo $c['penulis']; ?></span>
                        </li>
                    </ul>
					
					<p><?php echo word_limiter($c['content'],50); ?></p>
				 </div>
				 <div class="but"></div>
                   <a href="<?php echo base_url(); ?>index.php/tutorial-<?php echo strtolower(str_replace(' ','-',preg_replace("/[^a-zA-Z0-9\s]/", "", $c['judul_content']))).'-'.$c['kode_content']; ?>">
				   <h4 class="pB-readmore"> Selengkapnya . . </h4>
				   </a>
				 </div>
				 <div class="clearfix"></div>
			<?php } ?>
			<?php echo $links; ?>
			</div>
	  </body>
  </html>