
<ul class="spinner3">
			<i class="paperclip"> </i>
			<li class="spinner_head"><h3>form Pendaftaran Anggota Baru</h3></li>
			<div class="clearfix"> </div>
		  </ul>
			<div class="berita">
<div id="envelope">
<table>
<form action="<?php echo base_url('index.php/daftar/daftar_baru'); ?>" name='daftar' method="post" onsubmit="return cekForm()">
<tr><th>Nama  :</th>
<td><input name="nama" placeholder="Nama" type="text" required width="100px;"></td>
</tr>
<tr><th>N I P / N I P H  :</th>
<td><input name="nip" placeholder="NIP NIPH" type="text" required width="100px;"></td>
</tr>
<tr><th>Unit Kerja  :</th>
<td><input name="unit_kerja" placeholder="Unit Kerja" type="text" required width="100px;"></td>
</tr>
<tr><th>Tempat Lahir  :</th>
<td><input name="tempat_lahir" placeholder="Tempat Lahir" type="text" required width="60px;"></td>
</tr>
<tr><th>Tanggal Lahir  :</th>
<td><input type="text" name="tgl_lahir" id="tgl_lahir" placeholder="Klik disini Untuk menampilkan tanggal" required value="" /></td>
</tr>
<tr><th>Pangkat / Gol (PNS)  :</th>
<td><select type="text" name="pangkat" placeholder="Pangkat / Gol (PNS)"  required style="width:378px;">
   <option value="blank" selected="selected"> </option>
   <option value="IA">I A</option>
   <option value="IIB">I B</option>
   <option value="IIC">I C</option>
   <option value="IID">I D</option>
   <option value="IIA">II A</option>
   <option value="IIB">II B</option>
   <option value="IIC">II C</option>
   <option value="IID">II D</option>
   <option value="IIIA">III A</option>
   <option value="IIIB">III B</option>
   <option value="IIIC">III C</option>
   <option value="IIID">III D</option>
   <option value="IVA">IV A</option>
   <option value="IVB">IV B</option>
   <option value="IVC">IV C</option>
   <option value="IVD">IV D</option>
   <option value="IVE">IV E</option>
</select></td>
</tr>
<tr><th>No. HP / Telpon  :</th>
<td><input name="telepon" placeholder="No. HP / Telepon" type="number" required style="width:382px;"></td>
</tr>
<tr><th>Email  :</th>
<td><input name="email" placeholder="Email" type="email" required width="100px;"></td>
</tr>
<tr><th>Alamat  :</th>
<td><input name="alamat" placeholder="Alamat" type="text" required width="100px;"></td>
</tr>
<!--<tr><th>Tanggal Menjadi Anggota  :</th>
<td><input name="tgl_bergabung" placeholder="" type="text" width="100px;"></td>
</tr>-->
<tr><td colspan="2">  <p><input type="checkbox" id="cek" name="cekdaftar" value="1" />Saya menyatakan untuk di daftar sebagai anggota Koperasi Pegawai Republik Indonesia 
						Institut Teknologi Sepuluh Nopember (KPRI-ITS) dengan sukarela dan bersedia memenuhi/mematuhi 
						segala hak dan kewajiban sebagai anggota sebagaimana tersebut dalam Anggaran Dasar (AD) dan 
						Anggoran Rumah Tangga (ART) serta ketentuan KPRI-ITS.</p></td>
</tr>
<tr><th>&nbsp</th>
<td><input id="submit" type="submit" name="simpan" value="Daftar Menjadi Anggota"></td>
</tr>
</form>
</table>
</div>
</div>
<script type="text/javascript">
	function cekForm(){
			var frm=document.daftar;
			var cekdaftar=frm.cekdaftar.checked;
			if(cekdaftar==false){
				alert("Anda harus menyetujui dan Centang untuk melanjutkan");
				return false;
			}
			else {
				alert("Selamat! Anda telah berhasil terdaftar sebagai anggota KPRI-ITS");
				return true;
			}
			}

	    $('#tgl_lahir').datetimepicker({
		  timepicker:false,
		  format:'Y-m-d',
		  formatDate:'Y-m-d',
		  //minDate:'-1970/01/02', // yesterday is minimum date
		//maxDate:'+1970/01/02' // and tommorow is maximum date calendar
});
	</script>