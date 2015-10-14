<ul class="spinner3">
			<i class="paperclip2"> </i>
			<li class="spinner_head"><h3>Ganti Password</h3></li>
			<div class="clearfix"> </div>
		  </ul>
		  <div class="berita">
		  <?php
				$id = sha1($session['no_anggota']);
		?>
			<div class="bootstrap-frm">
				<form action="<?php echo base_url('index.php/login/ganti_pswd/'.$id.''); ?>" method="post" onsubmit="return cekForm()">
					<label>
						<span>Password Lama :</span>
						<input id="password_lama" type="password" name="password_lama" placeholder="Password lama" />
					</label>
				   
					<label>
						<span>Password Baru :</span>
						<input id="password_baru" type="password" name="password_baru" placeholder="Password baru" />
					</label>
				   
					<label>
						<span>Ulangi Password :</span>
						<input id="ulangi_password" type="password" name="ulangi_password" placeholder="Ulangi Password" />
					</label>  
					 <label>
						<span>&nbsp;</span>
						<input type="submit" class="button" name="ganti" value="Ganti Password" />
					</label>    
				</form>
				</div>
				</div>
				</div>
<script type="text/javascript">


function validatePassword() {
var password_lama,password_baru,ulangi_password,output = true;

password_lama = document.frmChange.password_lama;
password_baru = document.frmChange.password_baru;
ulangi_password = document.frmChange.ulangi_password;

if(!password_lama.value) {
password_lama.focus();
document.getElementById("password_lama").innerHTML = "required";
output = false;
}
else if(!password_baru.value) {
password_baru.focus();
document.getElementById("password_baru").innerHTML = "required";
output = false;
}
else if(!ulangi_password.value) {
ulangi_password.focus();
document.getElementById("ulangi_password").innerHTML = "required";
output = false;
}
if(password_baru.value != ulangi_password.value) {
password_baru.value="";
ulangi_password.value="";
password_baru.focus();
document.getElementById("ulangi_password").innerHTML = "not same";
output = false;
} 	
return output;
}



	//function cekForm(){
			//if($('#password_baru').val()!=$('#ulangi_password').val()){
				//alert('Password Tidak Sama !')
				//return false;
			//}if($('#password_lama').val()==$('#password_baru').val()){
				//alert('Password Baru sama dengan Password lama !')
				//return false;
			//}
			//}
	</script>