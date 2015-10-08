
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
<td><input name="nip" placeholder="NIP NIPH" type="text"  width="100px;"></td>
</tr>
<tr><th>Unit Kerja  :</th>
<td><input name="unit_kerja" placeholder="Unit Kerja" type="text" width="100px;"></td>
</tr>
<tr><th>Tempat Lahir  :</th>
<td><input name="tempat_lahir" placeholder="Tempat Lahir" type="text" width="60px;"></td>
</tr>
<tr><th>Tanggal Lahir  :</th>
<td><input type="text" name="tgl_lahir" id="tgl_lahir" placeholder="Klik disini Untuk menampilkan tanggal" value="" /></td>
</tr>
<tr><th>Pangkat / Gol (PNS)  :</th>
<td><input name="pangkat" placeholder="Pangkat / Gol (PNS)" type="text" width="100px;"></td>
</tr>
<tr><th>No. HP / Telpn.  :</th>
<td><input name="telepon" placeholder="No. HP / Telepon" type="text" width="100px;"></td>
</tr>
<tr><th>Email  :</th>
<td><input name="email" placeholder="Email" type="text" width="100px;"></td>
</tr>
<tr><th>Alamat  :</th>
<td><input name="alamat" placeholder="Alamat" type="text" width="100px;"></td>
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
			}

	    $('#tgl_lahir').datetimepicker({
		  timepicker:false,
		  format:'Y-m-d',
		  formatDate:'Y-m-d',
		  //minDate:'-1970/01/02', // yesterday is minimum date
		//maxDate:'+1970/01/02' // and tommorow is maximum date calendar
});
	</script>