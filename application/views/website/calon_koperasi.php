<ul class="spinner3">
			<i class="paperclip3"> </i>
			<li class="spinner_head"><h3>Data Anda</h3></li>
			<div class="clearfix"> </div>
		  </ul>
			<div class="berita">
				<div class="table">
				<h2> <?php echo $title;?> </h2>
				<?php foreach($datanya as $pr){ ?>
				  <table>
						<tr>
							<th class="short">Nama :</th>
							<td><?php echo $pr['nama']; ?></td>
						</tr>
						<tr>
							<th class="short">NIP / N I P H :</th>
							<td><?php echo $kode = $pr['nip']; ?></td>
						</tr>
						<tr>
							<th class="short">Unit Kerja :</th>
							<td><?php echo $pr['unit']; ?></td>
						</tr>
						<tr>
							<th class="short">Tempat Tgl. Lahir :</th>
							<td><?php echo $pr['tempat_lahir']; ?> / <?php echo $pr['tgl_lahir']; ?></td>
						</tr>
						<tr>
							<th class="short">Pangkat/Gol (PNS) :</th>
							<td><?php echo $pr['pangkat']; ?></td>
						</tr>
						<tr>
							<th class="short">No. Hp/Telp. :</th>
							<td><?php echo $pr['telepon']; ?></td>
						</tr>
						<tr>
							<th class="short">Alamat :</th>
							<td><?php echo $pr['alamat']; ?></td>
						</tr>
						<tr>
							<th class="short">Tgl. Menjadi Anggota :</th>
							<td><?php echo $pr['tgl_bergabung']; ?></td>
						</tr>
						</table>
						<div class="print" ><a href='<?php echo base_url('index.php/daftar/print_data/'.$kode.'');?>' >Print Formulir</a></div>
				<?php } ?>
				</div>
				</div>