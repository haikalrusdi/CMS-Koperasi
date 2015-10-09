                <div class="page-header">
                    <div class="icon">
                        <span class="ico-pen-2"></span>
                    </div>
                    <h1>Setting Website<small>Dasar</small></h1>
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
                    <div class="span6">
					<form method="post" id="validate" action="<?php echo base_url(); ?>index.php/adminweb/savesettingdasar"> 
                        <div class="block">
                            <div class="head">                                
                                <h2>Setting for Blog</h2>
                                <ul class="buttons">             
                                    <li><a href="#" onClick="source('form_default'); return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                </ul>                                  
                            </div>                                        
                            <div class="data-fluid">
                                <div class="row-form">
                                    <div class="span3">Judul Blog (Site) :</div>
                                    <div class="span9"><input type="text" class="validate[required]" name="site_title" value="<?php echo $setting[0]['judul_blog']; ?>" placeholder="site title"/></div>
                                </div>
                                <div class="row-form">
                                    <div class="span3">Deskripsi :</div>
                                    <div class="span9"><textarea placeholder="deskripsi blog" name="deskripsi"><?php echo $setting[0]['deskripsi_blog']; ?></textarea></div>
                                </div>
                                <div class="row-form">
                                    <div class="span3">Limit Content:</div>
									<div class="span9"><input type="text" class="validate[required]" name="limit_content" value="<?php echo $setting[0]['limit_content']; ?>" placeholder="limit content"/></div>
                                </div>
                                <div class="row-form">
                                    <div class="span3">Facebook (URL) :</div>
                                    <div class="span9"><input type="text" name="fb" value="<?php echo $setting[0]['facebook']; ?>" placeholder="facebook"/></div>
                                </div>                    
                                <div class="row-form">
                                    <div class="span3">FB Fans page (URL):</div>
                                    <div class="span9"><input type="text" name="fb_fans" value="<?php echo $setting[0]['facebook_fans_page']; ?>" placeholder="facebook fans page"/></div>
                                </div>
								<div class="row-form">
                                    <div class="span3">Twitter (URL):</div>
                                    <div class="span9"><input type="text" name="twitter" value="<?php echo $setting[0]['twitter']; ?>" placeholder="twitter"/></div>
                                </div>
								<div class="row-form">
                                    <div class="span3">Google+ (URL):</div>
                                    <div class="span9"><input type="text" name="g_plus" value="<?php echo $setting[0]['g_plus']; ?>" placeholder="google+"/></div>
                                </div>
								<div class="row-form">
                                    <div class="span3">email </div>
                                    <div class="span9"><input type="text" name="email" value="<?php echo $setting[0]['email']; ?>" placeholder="email"/></div>
                                </div>
								 <div class="row-form">
									<div class="span3"></div>
                                    <div class="span9">
									<button class="btn btn-danger" style="float:right;" onclick="$('#validate').submit();" type="button">Simpan 
									<span class="icon-lock icon-white"></span></button>
									</div>
                                </div>
                            </div>
                        </div></form>
                    </div>
					<!-- span 6 -->
					<div class="span6">
                        <div class="block">
                            <div class="head">                                
                                <h2>Blog Information (Contact)</h2>
                                <ul class="buttons">             
                                    <li><a href="#" onClick="source('form_pa'); return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                </ul>                                                                  
                            </div>
							<form method="post" id="forminfo" action="<?php echo base_url(); ?>index.php/webadmin/saveinformation">
                            <div class="data-fluid">
                                <div class="row-form">
                                    <div class="span3">Information :</div>
                                    <div class="span9"><textarea id="ckeditor" name="information"><?php echo $setting[0]['information']; ?></textarea>
                                    </div>
                                </div>
								<div class="row-form">
									<div class="span3"></div>
                                    <div class="span9">
									<button class="btn btn-success" style="float:right;" onclick="$('#forminfo').submit();" type="button">Simpan 
									<span class="icon-lock icon-white"></span></button>
									<!--<input type="submit" value="Simpan" class="btn btn-danger" style="float:right;" />-->
									</div>
                                </div>								
                            </div></form>              
                        </div>
                    </div>
					<!-- end span 6 -->
				</div>
            </div>
            
        </div>
 <script>

        var ckeditor = CKEDITOR.replace('ckeditor');

        CKEDITOR.disableAutoInline = true;
        CKEDITOR.inline('editable');

</script>