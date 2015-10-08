<div class="page-header">
                    <div class="icon">
                        <span class="ico-layout-7"></span>
                    </div>
                    <h1>All Label Berita <small>Koperasi ITS</small></h1>
                </div>
				<!-- start -->
				<div class="row-fluid">
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
					<div class="span6">
                        <div class="block">
							<div class="head">                                
                                <h2>Tambah / Edit Label </h2>
                                <ul class="buttons">             
                                    <li><!--<a href="#" onClick="source('form_default'); return false;"><div class="icon"><span class="ico-info"></span></div></a>
									--></li>
                                </ul>                                  
                            </div> 
                            <div class="data-fluid">                                
                                <div class="row-form">
								<form method="post" id="validate" action="<?php echo base_url(); ?>index.php/adminwebsite/savelabel">
                                    <div class="span3"> Label :</div>
                                    <div class="span9"><input type="text" name="judul_label" value="<?php echo $judul_label; ?>" class="validate[required]" placeholder="judul label"/></div>
									<input type="hidden" name="kode_label" value="<?php echo $kode_label; ?>" />
									<input type="hidden" name="status" value="<?php echo $status; ?>" />								
                                </div>
								<div class="row-form">
                                    <div class="span3"></div>
                                    <div class="span9" >
                                        <button class="btn btn-primary" style="float:right;" onclick="$('#validate').submit();">Simpan 
										<span class="icon-lock icon-white"></span></button>
										<!--<input type="submit" class="btn btn-primary" style="float:right;" value="simpan" /><i class="icon-lock icon-white"></i>-->
                                    </div>
                                </div></form>
                            </div>
                        </div>
                    </div>
                    <div class="span6">
                        <div class="block">
                            <div class="head orange">                                
                                <h2>List Label</h2>
                                <ul class="buttons">
                                    <li><a href="#" onClick="source('table_main'); return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                    <li><a href="#" class="ublock"><div class="icon"><span class="ico-undo"></span></div></a></li>
                                    <li><a href="#" class="cblock"><div class="icon"><span class="ico-sort"></span></div></a></li>
                                </ul>
                            </div>
                            <div class="data-fluid">
                                <table cellpadding="0" cellspacing="0" width="100%" class="table lcnp">
                                    <thead>
                                        <tr>
                                            <th width="16"><input type="checkbox" class="checkall"/></th>                                        
                                            <th>Judul Label</th>                      
                                            <th width="78">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach($label as $l){ ?>
                                        <tr>
                                            <td><input type="checkbox" name="checkbox"/></td>                                        
                                            <td><?php echo $l['judul_label']; ?></td>                      
                                            <td>
                                                <a href="<?php echo base_url(); ?>index.php/adminwebsite/editlabel/<?php echo $l['kode_label']; ?>" class="button green">
                                                    <div class="icon"><span class="ico-pencil"></span></div>
                                                </a>
                                                <a href="<?php echo base_url(); ?>index.php/adminwebsite/deletelabel/<?php echo $l['kode_label']; ?>" onclick="return confirm('yakin hapus data ini??');" class="button red">
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
				<!-- end -->
            </div>