<div class="page-header">
                    <div class="icon">
                        <span class="ico-layout-7"></span>
                    </div>
                    <h1>All Saran dan Kritik<small>Koperasi ITS</small></h1>
                </div>
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
                <div class="row-fluid">
                    <div class="span12">        
                        <div class="block">
                            <div class="head dblue">
                                <div class="icon"><span class="ico-layout-9"></span></div>
                                <h2>Tabel comment</h2>
                                <ul class="buttons">
                                    <li><a href="#" onClick="source('table_sort_pagination'); return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                </ul>                                                        
                            </div>                
                                <div class="data-fluid">
                                    <table class="table fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" class="checkall"/></th>
                                                <th width="25%">Judul Kontent</th>
												<th width="10%">pengirim</th>
												<th width="10%">Status</th>
                                                <th width="40%">Komentar</th>
                                                <th width="80" class="TAC">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php foreach($comment as $c){ ?>
                                            <tr>
                                                <td><input type="checkbox" name="order[]" value="528"/></td>
                                                <td><a href="#"><?php echo $c['judul_content']; ?></a></td>  
												<td><a href="mailto:<?php echo $c['email']; ?>"><?php echo $c['pengirim']; ?></a></td> 
												<?php if(strtolower($c['status']) == "pending"){ ?>
												<td width="25"><span class="label label-important">Pending</span></td>
												<?php }else{ ?>
												<td><span class="label label-success">Publish</span></td>
												<?php  } ?>
												<td><?php echo $c['isi']; ?></td>
                                                <td>
												<?php if(strtolower($c['status']) == "pending"){ ?>
                                                    <a href="<?php echo base_url(); ?>index.php/webadmin/publishingcomment/<?php echo $c['kode_comment']; ?>" class="button green" title="terbitkan" onclick="return confirm('yakin terbitkan komentar ini ?')">
                                                        <div class="icon"><span class="ico-checkmark"></span></div>
                                                    </a>
												<?php }else{?>
													<a href="<?php echo base_url(); ?>index.php/webadmin/replycomment/<?php echo $c['kode_content']; ?>" class="button blue" title="balas">
                                                        <div class="icon"><span class="ico-reply"></span></div>
                                                    </a>
												<?php } ?>
                                                    <a href="<?php echo base_url(); ?>index.php/webadmin/deletingcomment/<?php echo $c['kode_comment']; ?>" class="button red" title="hapus" onclick="return confirm('yakin hapus komentar ini ?')">
                                                        <div class="icon"><span class="ico-remove"></span></div>
                                                    </a>                                              
                                                </td>
                                            </tr> <?php } ?>
                                        </tbody>
                                    </table>                    
                                </div> 
                        </div>
                    </div>
                </div>  
            </div>            
        </div>