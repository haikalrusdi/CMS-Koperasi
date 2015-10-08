<div class="page-header">
                    <div class="icon">
                        <span class="ico-window"></span>
                    </div>
                    <h1><?php if(@$status == "baru"){ ?>Input <?php }else{ ?> Edit <?php } ?> Anggota<small>Koperasi ITS</small></h1>
                </div>
				<!-- start -->
	           
				<div class="row-fluid">
					<div class="span6">
                        <div class="block">
                            <div class="data-fluid">                                
                                <div class="row-form">
                                    <div class="span3">File exel (*.xls):</div>
                                        <?php echo form_open_multipart('adminwebsite/do_upload');?>
                                                <input type="file" id="file_upload" name="userfile" size="20" />
                                                <button class="btn btn-danger" style="float:right;"  type="submit">Upload Anggota</button>
                                        <?php echo form_close();?>    
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
				<!-- end -->  
    </div>
	