 <ul class="spinner2">
			<i class="menu"> </i>
			<li class="spinner_head"><h3>Menu</h3></li>
			<div class="clearfix"> </div>
		  </ul>
		  <div class="login-menu">
				<ul id="menu">
					<li><a href="<?php echo base_url(); ?>index.php/login">Dashboard</a></li>
					<li><a href="<?php echo base_url(); ?>index.php/login/profile/<?php echo sha1($session['no_anggota']); ?>">Profile</a></li>
					<li><a href="<?php echo base_url(); ?>index.php/login/simpanan/<?php echo sha1($session['no_anggota']); ?>">Simpanan</a></li>
					<li><a href="<?php echo base_url(); ?>index.php/login/pinjaman/<?php echo sha1($session['no_anggota']); ?>">Pinjaman</a></li>
					<li><a href="<?php echo base_url(); ?>index.php/login/reset_pswd/<?php echo sha1($session['no_anggota']); ?>">Ganti Password</a></li>
					<li><a href="<?php echo base_url(); ?>index.php/login/destroyingsession" onclick="return confirm('Apakah anda yakin ingin keluar?');" title="logout">Keluar</a></li>
				</ul>
		  </div>
		  