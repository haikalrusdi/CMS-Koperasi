<div class="page-header">
                    <div class="icon">
                        <span class="ico-arrow-right"></span>
                    </div>
                    <h1>Reply Comment Berita<small>Koperasi</small></h1>
                </div>
                
                <div class="row-fluid"> 
                    <div class="span12">
                        <div class="block">
                            <div class="row-form">
								<div class="span2"><b>Judul post :</b></div>
                                <div class="span10"><input type="text" value="<?php echo $comment[0]['judul_content']; ?>" readonly="readonly"/></div>
                            </div>                                  
                        </div>    
                        
                        <div class="block">
                            <div class="head dblue">                                
                                <h2>Comment Post</h2>
                                <ul class="buttons">             
                                    <li><a href="#" onClick="source('messages'); return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                    <li><a href="#" class="ublock"><div class="icon"><span class="ico-undo"></span></div></a></li>
                                    <li><a href="#" class="cblock"><div class="icon"><span class="ico-sort"></span></div></a></li>
                                </ul>                                
                            </div>
                            <div class="data dark npr npb">								
                                <div class="messages scroll" style="height: 300px;">
								<?php foreach($comment as $c){ ?>
								<?php if($c['website'] != "KP-RI ITS"){ ?>
                                    <div class="item blue">
                                        <div class="arrow"></div>
                                        <div class="text"><?php echo '<a href="mailto:'.$c['email'].'" style="color:white;"><b>'.$c['pengirim'].'</b></a><br /><br />'; ?><?php echo $c['isi']; ?></div>
                                        <div class="date"><?php echo $c['tanggal']; ?></div>
                                    </div>
								<?php }else{ ?>
                                    <div class="item dblue out">
                                        <div class="arrow"></div>
                                        <div class="text"><?php echo '<b>'.$c['pengirim'].'</b><br /><br />'; ?><?php echo $c['isi']; ?>.</div>
                                        <div class="date"><?php echo $c['tanggal']; ?></div>
                                    </div>
								<?php } } ?>
                                </div>                                
                            </div>    
                            <div class="toolbar dark">
							<form method="post" id="validate" action="<?php echo base_url(); ?>index.php/webadmin/myreply">
                                <div class="input-prepend input-append">
                                    <span class="add-on dblue"><span class="icon-envelope icon-white"></span></span>
                                    <input type="text" class="validate[required]" name="mycomment"/>
									<input type="hidden" name="kode_content" value="<?php echo $comment[0]['kode_content']; ?>" />
                                    <button class="btn dblue" type="button" onclick="$('#validate').submit();">Send  <span class="icon-arrow-next icon-white"></span></button>
                                </div>
							</form>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>