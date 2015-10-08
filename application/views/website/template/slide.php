		
		<ul class="rslides" id="slider">
			<?php foreach(@$slide as $s){ ?>
	        <li><img src="<?php echo base_url(); ?>asset/files/header_content/<?php echo $s['image_header']; ?>" class="img-responsive" alt=""/>
	        <span class="bottom"><strong><a href="<?php echo base_url(); ?>index.php/tutorial-<?php echo strtolower(str_replace(' ','-',preg_replace("/[^a-zA-Z0-9\s]/", "", $s['judul_content']))).'-'.$s['kode_content']; ?>">
					<?php echo $s['judul_content']; ?>
					</a></strong><br /><?php echo word_limiter($s['content'],30); ?></span>
	        </li>
	        <?php } ?>
	        </ul>
	        
			<!--<li><img src="<?php echo base_url(); ?>asset/website/images/3.jpg" class="img-responsive" alt=""/></li>
			<li><img src="<?php echo base_url(); ?>asset/website/images/4.jpg" class="img-responsive" alt=""/></li>
			<li><img src="<?php echo base_url(); ?>asset/website/images/5.jpg" class="img-responsive" alt=""/></li>
			<li><img src="<?php echo base_url(); ?>asset/website/images/6.jpg" class="img-responsive" alt=""/></li>
	      </ul>-->