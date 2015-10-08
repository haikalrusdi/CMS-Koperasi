<ul class="spinner1">
			<i class="paperclip"> </i>
			<li class="spinner_head"><h3>Selamat Datang </h3></li>
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
					
					<p><?php echo $c['content']; ?></p>
				 </div>
				 <div class="but"></div>


                   
				 </div>
				 <div class="clearfix"></div>
			<?php } ?>
			
			</div>
			<div class="clearfix"></div>
