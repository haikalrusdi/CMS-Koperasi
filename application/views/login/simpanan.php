<ul class="spinner3">
			<i class="paperclip1"> </i>
			<li class="spinner_head"><h3>Simpanan</h3></li>
			<div class="clearfix"> </div>
		  </ul>
		  <div class="berita">
				<div class="table">
				<?php foreach($simpanan as $s){ ?>
				  <table>
						<tr>
							<th class="short">Simpanan Pokok :</th>
							<td><?php echo $s['spn_pokok']; ?></td>
						</tr>
						<tr>
							<th class="short">Simpanan Wajib :</th>
							<td><?php echo $s['spn_wajib']; ?></td>
						</tr>
						<tr>
							<th class="short">Total :</th>
							<td><?php echo $s['total']; ?></td>
						</tr>
						<tr>
							<th class="short">Tanggal Update :</th>
							<td><?php echo $s['tgl_update']; ?></td>
						</tr>
						</table>
				<?php } ?>
				</div>
				</div>