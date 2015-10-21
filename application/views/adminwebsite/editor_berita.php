<div class="page-header">
                    <div class="icon">
                        <span class="ico-window"></span>
                    </div>
                    <h1><?php if($status == "baru"){ ?>Write <?php }else{ ?> Edit <?php } ?> Post<small>Koperasi ITS</small></h1>
                </div>
				<!-- start -->
				<form action="<?=base_url()?>index.php/adminwebsite/savecontent" method="post" enctype="multipart/form-data">
				<div class="row-fluid">
					<div class="span6">
                        <div class="block">
                            <div class="data-fluid">                                
                                <div class="row-form">
                                    <div class="span3"> Judul Berita:</div>
                                    <div class="span9"><input type="text" class="validate[required]" name="judul_post" value="<?php echo $judul_content; ?>" placeholder="judul berita"/></div>
                                </div>
                                <div class="row-form">
                                    <div class="span3">Header Berita:</div>
                                    <div class="span9">
                                            <input type="file" class="validate[required]" id="header_post" name="filefoto" value="<?php echo $header_post; ?>" accept="image/*" required/>
                                    </div>
                                </div> 
                                <div class="row-form">
                                    <div class="span3">Deskripsi Penelusuran:</div>
                                    <div class="span9"><textarea placeholder="deskripsi untuk google" name="deskripsi"><?php echo $deskripsi; ?></textarea></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="span6">
                        <div class="block">
                            <div class="data-fluid">								
                                <div class="row-form">
                                    <div class="span3">Status:</div>
                                    <div class="span9">
										<?php $arr_status = array('Publish','Draft'); ?>
                                        <select name="status">
										<?php 
											foreach($arr_status as $r){ 
												if(strtolower($r) == $status_content){
										?>
                                            <option selected="selected" value="<?php echo strtolower($r); ?>"><?php echo $r; ?></option>
										<?php }else{ ?>
											<option value="<?php echo strtolower($r); ?>"><?php echo $r; ?></option>
										<?php } } ?>
                                        </select>
                                    </div>
                                </div>                  

                                <div class="row-form">
                                    <div class="span3">Status Tampilan:</div>
                                    <div class="span9">
                                        <?php $arr_tstatus = array('Utama','Biasa'); ?>
                                        <select name="tampilan_status">
                                        <?php 
                                            foreach($arr_tstatus as $r){ 
                                                if(strtolower($r) == $tampilan_status){
                                        ?>
                                            <option selected="selected" value="<?php echo strtolower($r); ?>"><?php echo $r; ?></option>
                                        <?php }else{ ?>
                                            <option value="<?php echo strtolower($r); ?>"><?php echo $r; ?></option>
                                        <?php } } ?>
                                        </select>
                                    </div>
                                </div>         

                                <div class="row-form">
                                    <div class="span3">Labels Berita:</div>
                                    <div class="span9">
                                        <select name="labels[]" multiple="multiple" class="validate[required] select" style="width: 100%;">
										<?php 
											foreach($label as $l){
												if(!in_array($l['kode_label'],$label_post)){
										?>
                                            <option value="<?php echo $l['kode_label'] ?>"><?php echo $l['judul_label'] ?></option>
										<?php } else { ?>
											<option selected="selected" value="<?php echo $l['kode_label'] ?>"><?php echo $l['judul_label'] ?></option>
										<?php } } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row-form">
                                    <div class="span3">Tags input:</div>
                                    <div class="span9">
                                        <input type="text" class="validate[required] tags" name="tags" value="<?php echo $tags; ?>"/>
                                    </div>
                                </div>
								<div class="toolbar bottom tar">
                                    <div class="btn-group">
										<button class="btn btn-primary" type="button" onclick="window.open('<?php echo base_url(); ?>index.php/adminwebsite/pratinjau','_blank')">Pratinjau 
										<span class="icon-zoom-in icon-white"></span></button>
                                        <button class="btn btn-info" type="button" onClick="$('#validate').validationEngine('hide');">Refresh
										<span class="icon-refresh icon-white"></span></button>
                                        <button class="btn btn-danger" style="float:right;" id="btnsubmit" onclick="$('#validate').submit();">Simpan 
										<span class="icon-lock icon-white"></span></button>
										<input type="hidden" value="<?php echo $kode_content; ?>" name="kode_content" />
										<input type="hidden" value="<?php echo $status; ?>" name="status_simpan" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<!-- end -->
                <div class="row-fluid">

                    <div class="span12">   
                        <div class="block">
                            <div class="head orange">
                                <h2>CKEditor</h2>
                                <ul class="buttons">             
                                    <li><a href="#" onClick="source('editor_ck'); return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                </ul>                                                                
                            </div>
                            <div class="data-fluid">
                                <textarea id="ckeditor" name="isi" style="height: 800px;"><?php echo $isi;?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        
    </div>
	<form id="pratinjo" target="_blank" action="<?php echo base_url(); ?>index.php/adminwebsite/cetak"></form>
    
    <script>
		$(document).ready(function(){
			$.post('<?php echo base_url(); ?>index.php/adminwebsite/session_preview',$("#validate").serialize(),function(data){});
			setInterval(function(){				
				$.post('<?php echo base_url(); ?>index.php/adminwebsite/session_preview',$("#validate").serialize(),function(data){});
			},1000);
			
			/*$("#btnbrowse").click(function(){
				window.KCFinder = {
					callBack: function(url) {
						$('#header_post').val(url);
						window.KCFinder = null;					
					}
				};
				window.open('<?php echo base_url(); ?>asset/adminwebsite/js/kcfinder/browse.php?type=images', 'kcfinder_textbox',
					'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
					'resizable=1, scrollbars=0, width=800, height=600'
				);
				return false;
			});
			
			$("#btnsubmit").click(function(){
				alert("submit");
				$('#validate').submit();				
			});*/
		});
        var ckeditor = CKEDITOR.replace('ckeditor',{
			height:'600px',
			filebrowserBrowseUrl : '<?php echo base_url(); ?>asset/adminwebsite/js/kcfinder/browse.php?type=files',
			filebrowserImageBrowseUrl : '<?php echo base_url(); ?>asset/adminwebsite/js/kcfinder/browse.php?type=images',
			filebrowserFlashBrowseUrl : '<?php echo base_url(); ?>asset/adminwebsite/js/kcfinder/browse.php?type=flash',
			filebrowserUploadUrl : '<?php echo base_url(); ?>asset/adminwebsite/js/kcfinder/upload.php?type=files',
			filebrowserImageUploadUrl : '<?php echo base_url(); ?>asset/adminwebsite/js/kcfinder/upload.php?type=images',
			filebrowserFlashUploadUrl : '<?php echo base_url(); ?>asset/adminwebsite/js/kcfinder/upload.php?type=flash'		
		});
        CKEDITOR.disableAutoInline = true;
        CKEDITOR.inline('editable');		
    </script>
