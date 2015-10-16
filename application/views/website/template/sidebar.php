 <ul class="spinner">
			<i class="spinner_icon"> </i>
			<li class="spinner_head"><h3>Login Anggota</h3></li>
			<div class="clearfix"> </div>
		  </ul>
		  <div class="login">
			  <form method="post" action="<?php echo base_url(); ?>index.php/login/masuk">
				<p><input type="text" name="no_anggota" value="" placeholder="No Anggota"></p>
				<p><input type="password" name="password" value="" placeholder="Password"></p>
				<p style="font-size: small">Captcha</p>
                <p><img src="<?php echo base_url(); ?>index.php/captcha" width="214px" alt="captcha"></p>
				<p><input type="text" name="captcha" value="" placeholder="Masukkan captcha diatas" required></p>
				
				
				<p class="submit">
				
				<input type="submit" name="login" value="Login"></p>

			  </form>
		  </div>
		  
		  <br />
		  
		  <ul class="spinner">
			<i class="spinner_icon"> </i>
			<li class="spinner_head"><h3>Download</h3></li>
			<div class="clearfix"> </div>
		  </ul>
		  
		  <div class="download">
			  <ul>
					<li>
						<a href="#">Formulir Peminjaman </a>
					</li>
					<li>
						<a href="#">Persyaratan Anggota </a>
					</li>
				</ul>
		  </div>
		  
		  <br />
		 
		   <ul class="spinner">
		   <i class="spinner_icon"> </i>
			<li class="spinner_head"><h3>Kritik dan Saran</h3></li>
			<div class="clearfix"> </div>
		  </ul>
		  <div class="kritik-dan-saran">
			  <form method="post" action="<?php echo base_url(); ?>index.php/login/saran_kritik">
				<input type="text" name="kritik" placeholder="kritik">
				<input type="text" name="saran" placeholder="saran">
				<!--<img src="1435119411.85.jpeg?rand=<?php echo rand(); ?>"
				id = "captchaing">-->
				<img src="http://localhost/CMS-Koperasi/index.php/captcha" width="214px" alt="captcha">
				<label for="message">Masukkan kode diatas :</label>
				<input id="6_letters_code" name="6_letters_code" type="text">
				<input type="submit" name="login" value="submit">
			  </form>
		  </div>
		  
		  <br />
		  
		  <ul class="spinner">
			<i class="spinner_icon"> </i>
			<li class="spinner_head"><h3>Layanan Anggota</h3></li>
			<div class="clearfix"> </div>
		  </ul>
		  
		  <div class="sidebar-box">
		   
		  <table class="scroll">
			<tbody>
			<tr>
				<td><li><a href="#">Ini Baru Contoh Tata cara Registrasi </a></li></td>
			</tr>
			<tr>
				<td><li><a href="#">Ini Baru Contoh Tata cara Login </a></li></td>
			</tr>
			<tr>
				<td><li><a href="#">Ini Baru Contoh Informasi terbaru tentang Koperasi  </a></li></td>
			</tr>
			<tr>
				<td><li><a href="#">Ini Baru Contoh Syarat Untuk Menjadi Member atau anggota Koperasi</a></li></td>
			</tr>
			<tr>
				<td><li><a href="#">Ini Baru Contoh Syarat Untuk Menjadi Member atau anggota Koperasi</a></li></td>
			</tr>
			<tr>
				<td><li><a href="#">Ini Baru Contoh Syarat Untuk Menjadi Member atau anggota Koperasi</a></li></td>
			</tr>
			<tr>
				<td><li><a href="#">Ini Baru Contoh Syarat Untuk Menjadi Member atau anggota Koperasi</a></li></td>
			</tr>
			<tr>
				<td><li><a href="#">Ini Baru Contoh Syarat Untuk Menjadi Member atau anggota Koperasi</a></li></td>
			</tr>
			</tbody>
		   </table>
		
		<div class="sidebar-box-fot"></div>
		
		</div>
