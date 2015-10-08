<div class="page-header">
                    <div class="icon">
                        <span class="ico-layout-7"></span>
                    </div>
                    <h1>All Post Berita <small>Keperasi ITS</small></h1>
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
                                <h2>Tabel content</h2>
                                <ul class="buttons">
                                    <li><a href="#" onClick="source('table_sort_pagination'); return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                </ul>                                                        
                            </div>                
                                <div class="data-fluid">
                                    <table class="table fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" class="checkall"/></th>
                                                <th>Judul Post</th>
                                                <th width="20%">Tanggal</th>
                                                <th width="20%">Status</th>
                                                <th width="20%">Tampilan Status</th>
                                                <th width="20%">Penulis</th>
                                                <th width="80" class="TAC">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php foreach($content as $c){ ?>
                                            <tr>
                                                <td><input type="checkbox" name="order[]" value="528"/></td>
                                                <td><a href="#"><?php echo $c['judul_content']; ?></a></td>
                                                <td><?php echo $c['tanggal']; ?></td>
												<?php if($c['status'] == "publish"){ ?>
                                                <td><span class="label label-info"><?php echo $c['status']; ?></span></td>
												<?php }else{ ?>
												<td><span class="label label-important"><?php echo $c['status']; ?></span></td>
												<?php } ?>
                                                <?php if($c['tampilan_status'] == "Utama"){ ?>
                                                <td><span class="label label-info"><?php echo $c['tampilan_status']; ?></span></td>
                                                <?php }else{ ?>
                                                <td><span class="label label-important"><?php echo $c['tampilan_status']; ?></span></td>
                                                <?php } ?>
                                                <td><?php echo $c['penulis']; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url(); ?>index.php/adminwebsite/editcontent/<?php echo $c['kode_content']; ?>" class="button green">
                                                        <div class="icon"><span class="ico-pencil"></span></div>
                                                    </a>
                                                    <a href="<?php echo base_url(); ?>index.php/adminwebsite/deletecontent/<?php echo $c['kode_content']; ?>" onclick="return confirm('yakin hapus data ini ?')" class="button red">
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