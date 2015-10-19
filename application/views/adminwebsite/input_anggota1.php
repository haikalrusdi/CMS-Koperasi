<div class="page-header">
                    <div class="icon">
                        <span class="ico-window"></span>
                    </div>
                    <h1><?php if($status == "baru"){ ?>Input<?php }else{ ?> Edit <?php } ?> Anggota<small>Koperasi ITS</small></h1>
                </div>
                <!-- start -->
                <form method="post" id="validate" action="<?php echo base_url(); ?>index.php/adminwebsite/saveanggota">
                <div class="row-fluid">
                    <div class="span6">
                        <div class="block">
                            <div class="data-fluid">                                
                                <div class="row-form">
                                    <div class="span3"> Nama:</div>
                                    <div class="span9"><input type="text" class="validate[required]" name="nama" value="<?php echo $nama; ?>" placeholder="Nama Anggota"/></div>
                                </div>
                                <div class="row-form">
                                    <div class="span3"> N I P:</div>
                                    <div class="span9"><input type="text" class="validate[required]" name="nip" value="<?php echo $nip ?>" placeholder="N I P"/></div>
                                </div>
                               <div class="row-form">
                                        <input type="hidden" value="<?php echo $no_anggota; ?>" name="no_anggota_lama" />
                                    <div class="span3"> No Anggota:</div>
                                    <div class="span9"><input type="text" class="validate[required]" name="no_anggota" value="<?php echo $no_anggota; ?>" placeholder="No Anggota"/></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="span6">
                        <div class="block">
                            <div class="data-fluid">
                                <div class="row-form">
                                    <div class="span3"> Password:</div>
                                    <div class="span9"><input type="text" class="validate[required]" name="password" value="" placeholder="Password"/></div>
                                </div>

                                <div class="row-form">
                                    <div class="span3"> Unit:</div>
                                    <div class="span9"><input type="text" class="validate[required]" name="unit" value="<?php echo $unit; ?>" placeholder="Unit"/></div>
                                </div>              

                                <div class="row-form">
                                    <div class="span3"> Tanggal Bergabung:</div>
                                    <div class="span9"><input type="text" class="validate[required]" name="tgl_bergabung" value="<?php echo $tgl_bergabung; ?>" placeholder="Tanggal bergabung"/></div>
                                </div>
            
                                <div class="toolbar bottom tar">
                                    <div class="btn-group">
                                        <button class="btn btn-danger" style="float:right;" id="btnsubmit" onclick="$('#validate').submit();">Simpan 
                                        <span class="icon-lock icon-white"></span></button>
                                        <input type="hidden" value="<?php echo $id_userkoperasi; ?>" name="id_userkoperasi" />
                                        <input type="hidden" value="<?php echo $status; ?>" name="status_simpan" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end -->
                </form>                 
                
           
        
    </div>