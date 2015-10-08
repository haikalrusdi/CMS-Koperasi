<ul class="spinner3">
			<i class="paperclip3"> </i>
			<li class="spinner_head"><h3>Profile</h3></li>
			<div class="clearfix"> </div>
		  </ul>
			<div class="berita">
				<div class="table">
				<?php foreach($profile as $pr){ ?>
				  <table>
						<tr>
							<th class="short">Nama :</th>
							<td><?php echo $pr['nama']; ?></td>
						</tr>
						<tr>
							<th class="short">NIP :</th>
							<td><?php echo $pr['nip']; ?></td>
						</tr>
						<tr>
							<th class="short">No Anggota :</th>
							<td><?php echo $pr['no_anggota']; ?></td>
						</tr>
						<tr>
							<th class="short">Unit :</th>
							<td><?php echo $pr['unit']; ?></td>
						</tr>
						<tr>
							<th class="short">Tanggal terdaftar :</th>
							<td><?php echo $pr['tgl_bergabung']; ?></td>
						</tr>
						</table>
				<?php } ?>
				</div>
				</div>