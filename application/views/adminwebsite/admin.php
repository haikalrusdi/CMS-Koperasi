<div class="page-header">
                    <div class="icon">
                        <span class="ico-layout-7"></span>
                    </div>
                    <h1>All Administrator <small>Koperasi ITS</small></h1>
                </div>
				<!-- start -->
				<div class="block">
					<?php if($message != 0 && $message != -1){ ?>
						<div class="alert alert-success">            
							<strong>Well done!</strong> Operasi berhasil...
						</div>
					<?php }else if($message == 0 && $message == 3){ ?>
						<div class="alert alert-error">            
							<strong>Oh snap (-_-") !</strong> terjadi kesalahan... 
						</div>
					<?php } ?>
				<div>
				<form method="post" id="validate" action="<?php echo base_url(); ?>index.php/adminwebsite/saveuser">
				<div class="row-fluid">
					<div class="span6">
                        <div class="block">
							<div class="head">                                
                                <h2>Tambah User (Admin) </h2>
                                <ul class="buttons">             
                                    <li><!--<a href="#" onClick="source('form_default'); return false;"><div class="icon"><span class="ico-info"></span></div></a>
									--></li>
                                </ul>                                  
                            </div> 
							<?php 
							if (!isset($datauser) ){
							$datausername="";
							$datanama_lengkap="";
							$datapassword = "";
							
							}else{
							foreach($datauser as $u){
							$datausername=$u['username'];
							$datanama_lengkap=$u['nama_lengkap'];
							$datapassword = $u['password'];
							}}
							
							 ?>
                            <div class="data-fluid">                                
                                <div class="row-form">
                                    <div class="span3"> Username :</div>
                                    <div class="span9"><input type="text" class="validate[required]" name="username" placeholder="username" value="<?php echo $datausername; ?>"/> </div>
                                </div>                 
                                <div class="row-form">
                                    <div class="span3"> Nama Pengguna :</div>
                                    <div class="span9"><input type="text" class="validate[required]" name="pengguna" placeholder="nama pengguna"  value="<?php echo $datanama_lengkap; ?>"/></div>
                                </div>
                                <div class="row-form">
                                    <div class="span3"> Password :</div>
                                    <div class="span9"><input type="text" class="validate[required]" name="password" placeholder="password" value="<?php echo $datapassword; ?>"/></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="span6">
                        <div class="block">
							<div class="head">                                
                                <h2></h2>
                                <ul class="buttons">             
                                    <li>
									<a href="#" onClick="source('form_default'); return false;"><div class="icon"><span class="ico-info"></span></div></a>
									</li>
                                </ul>
                            </div> 
                            <div class="data-fluid">								
                                <div class="row-form">
                                    <div class="span3"> Google+ (url) :</div>
                                    <div class="span9"><input type="text" name="g_plus" placeholder="google+" /></div>
                                </div> 
                                <div class="row-form">
                                    <div class="span3"> Facebook (url) :</div>
                                    <div class="span9"><input type="text" name="facebook" placeholder="facebook" /></div>
                                </div>
                                <div class="row-form">
                                    <div class="span3"> Twitter (url):</div>
                                    <div class="span9"><input type="text" name="twitter" placeholder="twitter" /></div>
                                </div>
									
								 <div class="row-form">
                                    <div class="span3"></div>
                                    <div class="span9" >
                                        <button class="btn btn-danger" onclick="$('#validate').submit();" style="float:right;" type="button">Simpan 
										<span class="icon-lock icon-white"></span></button>
										<!--<input type="submit" value="Simpan" class="btn btn-danger" style="float:right;" />-->
                                    </div>
                                </div>
								<div class="row-form">
                                    <div class="span3"></div>
                                    <div class="span9" >
                                        <button class="btn btn-danger" onclick="$('#validate').update();" style="float:right;" type="button">Update 
										<span class="icon-lock icon-white"></span></button>
										<!--<input type="update" value="Update" class="btn btn-danger" style="float:right;" />-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				</form>
				<!-- end -->
                <div class="row-fluid">
                    <div class="span12">        
                        <div class="block">
                            <div class="head dblue">
                                <div class="icon"><span class="ico-layout-9"></span></div>
                                <h2>Tabel User</h2>
                                <ul class="buttons">
                                    <li><a href="#" onClick="source('table_sort_pagination'); return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                </ul>                                                        
                            </div>                
                                <div class="data-fluid">
                                    <table class="table fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" class="checkall"/></th>
                                                <th width="25%">Nama pengguna</th>
                                                <th>Facebook</th>
                                                <th width="20%">Twitter</th>
                                                <th width="20%">Google+</th>
                                                <th width="80" class="TAC">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php foreach($user as $u){ ?>
                                            <tr>
                                                <td><input type="checkbox" name="order[]" value="528"/></td>
                                                <td><a href="#"><?php echo $u['nama_lengkap']; ?></a></td>
                                                <td><a href=""><?php echo $u['facebook']; ?></a></td>
                                                <td><a href=""><?php echo $u['twitter']; ?></a></td>
                                                <td><a href=""><?php echo $u['g_plus']; ?></a></td>
                                                <td>
                                                    <a href="<?php echo base_url(); ?>index.php/Adminwebsite/deleteuser/<?php echo $u['kode_user']; ?>" onclick="return confirm('Apakah anda yakin menghapus data ini ?');" class="button red">
                                                        <div class="icon"><span class="ico-remove"></span></div>
                                                    </a>
													
													<a href="<?php echo base_url(); ?>index.php/adminwebsite/edituser/<?php echo $u['kode_user']; ?>" onclick="return confirm('Apakah anda yakin mengedit data ini ?');" class="button blue">
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