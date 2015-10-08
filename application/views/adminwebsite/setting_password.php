
                <div class="page-header">
                    <div class="icon">
                        <span class="ico-pen-2"></span>
                    </div>
                    <h1>Setting Password<small>your password</small></h1>
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
					<form method="post" id="validate" action="<?php echo base_url(); ?>index.php/webadmin/savepassword">
                    <div class="span7"> 
                        <div class="block">
                            <div class="head">                                
                                <h2>Setting your password</h2>
                                <ul class="buttons">             
                                    <li><a href="#" onClick="source('form_default'); return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                </ul>                                  
                            </div>                                        
                            <div class="data-fluid">
                                <div class="row-form">
                                    <div class="span3">Username :</div>
                                    <div class="span9"><input type="text" readonly="readonly" name="username" value="<?php echo $username; ?>" placeholder="username"/></div>
                                </div>
								<div class="row-form">
                                    <div class="span3">Password Baru : </div>
                                    <div class="span9"><input class="validate[required]" type="password" name="password_baru" placeholder="password baru"/></div>
                                </div>
								<div class="row-form">
                                    <div class="span3">Password Lama : </div>
                                    <div class="span9"><input class="validate[required]" type="password" name="password_lama" placeholder="password lama (confirm)"/></div>
                                </div>
								 <div class="row-form">
									<div class="span3"></div>
                                    <div class="span9">
									<button class="btn btn-danger" style="float:right;" onclick="$('#validate').submit();" type="button">Simpan 
									<span class="icon-lock icon-white"></span></button>
									<!--<input type="submit" value="Simpan" class="btn btn-danger" style="float:right;" />-->
									</div>
                                </div>
                            </div>
                        </div>
                    </div></form>
				</div>                
                
            </div>
            
        </div>