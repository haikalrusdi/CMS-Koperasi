                <div class="page-header">
                    <div class="icon">
                        <span class="ico-pen-2"></span>
                    </div>
                    <h1>Setting Profile<small>your profile</small></h1>
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
					<form method="post" id="validate" action="<?php echo base_url(); ?>index.php/adminwebsite/saveprofile">
                    <div class="span7"> 
                        <div class="block">
                            <div class="head">                                
                                <h2>Setting for your profile and your account</h2>
                                <ul class="buttons">             
                                    <li><a href="#" onClick="source('form_default'); return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                </ul>                                  
                            </div>                                        
                            <div class="data-fluid">
                                <div class="row-form">
                                    <div class="span3">Username :</div>
                                    <div class="span9"><input type="text" name="username" value="<?php echo $username; ?>" readonly="readonly" placeholder="username"/></div>
                                </div>
                                <div class="row-form">
                                    <div class="span3">Nama pengguna:</div>
									<div class="span9"><input class="validate[required]" type="text" name="nama_lengkap" value="<?php echo $nama_lengkap; ?>" placeholder="nama pengguna"/></div>
                                </div>
                                <div class="row-form">
                                    <div class="span3">Facebook (url) :</div>
                                    <div class="span9"><input type="text" name="facebook" value="<?php echo $fb; ?>" placeholder="facebook"/></div>
                                </div>                    
                                <div class="row-form">
                                    <div class="span3">Google+ (url):</div>
                                    <div class="span9"><input type="text" name="g_plus" value="<?php echo $g_plus; ?>" placeholder="google+"/></div>
                                </div>
								<div class="row-form">
                                    <div class="span3">Twitter (url):</div>
                                    <div class="span9"><input type="text" name="twitter" value="<?php echo $twitter; ?>" placeholder="twitter"/></div>
                                </div>
								<div class="row-form">
                                    <div class="span3">Tentang Anda : </div>
                                    <div class="span9"><textarea name="about"><?php echo $about; ?></textarea></div>
                                </div>
								<div class="row-form">
                                    <div class="span3">Password (confirm)</div>
                                    <div class="span9"><input class="validate[required]" type="password" name="password" placeholder="passwords"/></div>
                                </div>
								 <div class="row-form">
									<div class="span3"></div>
                                    <div class="span9">
									<button class="btn btn-danger" style="float:right;" onclick="$('#validate').submit();" type="button">Simpan 
									<span class="icon-lock icon-white"></span></button>
									<input type="hidden" name="kode_user" value="<?php echo $kode_user; ?>" />
									<!--<input type="submit" value="Simpan" class="btn btn-danger" style="float:right;" />-->
									</div>
                                </div>
                            </div>
                        </div>
                    </div></form>
				</div>                
                
            </div>
            
        </div>