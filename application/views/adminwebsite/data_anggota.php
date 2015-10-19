<div class="page-header">
                    <div class="icon">
                        <span class="ico-layout-7"></span>
                    </div>
                    <h1>All Anggota <small>Keperasi ITS</small></h1>
                </div>
                <div class="row-fluid">
                    <div class="span12">
						<div class="block">
						<?php if($message != 0 && $message != -1){ ?>
							<div class="alert alert-success">            
								<strong>Well done!</strong> Operasi berhasil...
							</div>
						<?php }else if($message == 0){ ?>
							<div class="alert alert-error">            
								<strong>Oh snap (-_-") !</strong> terjadi kesalahan... 
							</div>
						<?php } ?>
						<div>
                        <div class="block">
                            <div class="head dblue">
                                <div class="icon"><span class="ico-layout-9"></span></div>
                                <h2>Tabel Anggota Koperasi</h2>
                                <ul class="buttons">
                                    <li><a href="#" onClick="source('table_sort_pagination'); return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                </ul>                                                        
                            </div>                
                                <div class="data-fluid">
                                    <table class="table fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" class="checkall"/></th>
                                                <th>Nama</th>
                                                <th width="20%">Nip</th>
                                                <th width="20%">No Anggota</th>
                                                <th width="20%">Unit</th>
                                                <th width="20%">Tgl bergabung</th>
                                                <th width="20%">simpanan</th>
                                               <!-- <th width="20%">profile</th>
                                                <th width="20%">pinjaman</th> 
                                                masih proses -->
                                                <th width="80" class="TAC">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php foreach($data_anggota as $c){ ?>
                                            <tr>
                                                <td><input type="checkbox" name="order[]" value="528"/></td>
                                                <td><a href="#"><?php echo $c['nama']; ?></a></td>
                                                <td><?php echo $c['nip']; ?></td>
                                                <td><?php echo $c['no_anggota']; ?></td>
                                                <td><?php echo $c['unit']; ?></td>
                                                <td><?php echo $c['tgl_bergabung']; ?></td>
                                                <td><?php echo $c['total']; ?></td>
        
                                                <td>
                                                    <!-- <a href="<?php echo base_url(); ?>index.php/adminwebsite/tampilprofile/<?php echo $c['id_userkoperasi']; ?>" class="button green">
                                                        <div class="icon"><span class="ico-info"></span></div>
                                                    </a> -->
                                                    <a href="<?php echo base_url(); ?>index.php/adminwebsite/editanggota/<?php echo $c['id_userkoperasi']; ?>" class="button green">
                                                        <div class="icon"><span class="ico-pencil"></span></div>
                                                    </a>
                                                    <a href="<?php echo base_url(); ?>index.php/adminwebsite/deleteanggota/<?php echo $c['id_userkoperasi']; ?>" onclick="return confirm('yakin hapus data ini ?')" class="button red">
                                                        <div class="icon"><span class="ico-remove"></span></div>
                                                    </a>                                              
                                                </td>
                                            </tr>
										<?php } ?>
                                        </tbody>
                                    </table>                    
                                </div> 
                        </div>
                    </div>
                </div>  
            </div>            
        </div>