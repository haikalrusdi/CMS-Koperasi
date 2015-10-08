<div class="sidebar">
            
            <div class="top">
                <a href="<?php echo base_url(); ?>" target="_blank" class="logo"></a>
                <!--<div class="search">
                    <div class="input-prepend">
                        <span class="add-on orange"><span class="icon-search icon-white"></span></span>
                        <input type="text" placeholder="search..."/>                                                      
                    </div>            
                </div>-->
            </div>
            <div class="nContainer">                
                <ul class="navigation">         
                    <li class="active"><a href="<?php echo base_url(); ?>index.php/adminwebsite/" class="blblue">Dashboard</a></li>
                    <li>
                        <a href="#" class="blblue">Berita</a>
                        <div class="open"></div>
                        <ul>
							<li><a href="<?php echo base_url(); ?>index.php/adminwebsite/newcontent">Tulis Baru</a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/adminwebsite/content">Semua Berita</a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/adminwebsite/contentpublish">Diterbitkan</a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/adminwebsite/contentdraft">Draft</a></li>
							<li><a href="<?php echo base_url(); ?>index.php/adminwebsite/labels">Label berita</a></li>
                        </ul>
                    </li>
                    <li>
                    <a href="#" class="blblue">Comment Berita</a>
						<div class="open"></div>
						<ul>
							<li><a href="<?php echo base_url(); ?>index.php/adminwebsite/listcomment">List comment</a></li>
						</ul>
					</li> 
					<li>
					<a href="#" class="blblue">Saran dan Kritik</a>
						<div class="open"></div>
						<ul>
							<li><a href="<?php echo base_url(); ?>index.php/adminwebsite/listcomment">Semua Saran dan Kritik</a></li>
						</ul>
					</li>
                    <li>
                        <a href="#" class="blblue">Koperasi</a>
                        <div class="open"></div>
                        <ul>
							<li><a href="<?php echo base_url(); ?>index.php/adminwebsite/insertusers">Import Anggota (*xls)</a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/adminwebsite/insertuser">Insert Anggota </a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/adminwebsite/insertsimpanan">Update Simpanan</a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/adminwebsite/insertpinjaman">Update Pinjaman</a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/adminwebsite/dataanggota">Semua Anggota</a></li>
                        </ul>
                    </li>  
					
                    <li>
                        <a href="#" class="blblue">Statistik</a>
                        <div class="open"></div>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>index.php/adminwebsite/statistikpost">Berita</a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/adminwebsite/statistikvisitor">Visitor</a></li>                    
                        </ul>
                    </li>
					
                    <li>
                        <a href="#" class="blblue">Setting Administrator</a>
                        <div class="open"></div>
                        <ul>
							<li><a href="<?php echo base_url(); ?>index.php/adminwebsite/users">Administrator</a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/adminwebsite/settingdasar">Setting dasar</a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/adminwebsite/settingprofile">Setting profile anda</a></li>
							<li><a href="<?php echo base_url(); ?>index.php/adminwebsite/settingpassword">Setting password anda</a></li>
                        </ul>                    
                    </li>
                </ul>
                <a class="close">
                    <span class="ico-remove"></span>
                </a>
            </div>
            <div class="widget">
                <div class="datepicker"></div>
            </div>
            
        </div>
        
        <div class="body">            
            <ul class="navigation">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/adminwebsite/" class="button">
                        <div class="icon">
                            <span class="ico-monitor"></span>
                        </div>                    
                        <div class="name">Dashboard</div>
                    </a>                
                </li>
                <li>
                    <a href="#" class="button">
                        <div class="arrow"></div>
                        <div class="icon">
                            <span class="ico-copy"></span>
                        </div>                    
                        <div class="name">Post</div>
                    </a>          
                    <ul class="sub">
						<li><a href="<?php echo base_url(); ?>index.php/adminwebsite/newcontent">Tulis Baru</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/adminwebsite/content">Semua Post</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/adminwebsite/contentpublish">Diterbitkan</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/adminwebsite/contentdraft">Draft</a></li>
                    </ul>
                </li>                
                <li>
                    <a href="<?php echo base_url(); ?>index.php/adminwebsite/labels" class="button">
                        <div class="arrow"></div>
                        <div class="icon">
                            <span class="ico-bookmark-3"></span>
                        </div>                    
                        <div class="name">Label</div>
                    </a>                   
                </li>                        
                <li>
                    <a href="<?php echo base_url(); ?>index.php/adminwebsite/users" class="button">
                        <div class="icon">
                            <span class="ico-user"></span>
                        </div>                    
                        <div class="name">Users</div>
                    </a>                
                </li>                 
                <li>
                    <a href="#" class="button">
                        <div class="arrow"></div>
                        <div class="icon">
                            <span class="ico-chart-4"></span>
                        </div>                    
                        <div class="name">Statistic</div>
                    </a> 
                    <ul class="sub">
                        <li><a href="<?php echo base_url(); ?>index.php/adminwebsite/statistikpost">Post</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/adminwebsite/statistikvisitor">Visitor</a></li>    
                    </ul>                                        
                </li>
				<li>
                    <a href="#" class="button">
                        <div class="arrow"></div>
                        <div class="icon">
                            <span class="ico-chat-3"></span>
                        </div>                    
                        <div class="name">Comment</div>
                    </a>                  
                    <ul class="sub">
                        <li><a href="<?php echo base_url(); ?>index.php/adminwebsite/listcomment">List comment</a></li>
                    </ul>                                        
                </li>
                <li>
                    <a href="#" class="button">
                        <div class="arrow"></div>
                        <div class="icon">
                            <span class="ico-cog-2"></span>
                        </div>                    
                        <div class="name">Setting</div>
                    </a>                
                    <ul class="sub">
                        <li><a href="<?php echo base_url(); ?>index.php/adminwebsite/settingdasar">Setting dasar</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/adminwebsite/settingprofile">Setting profile anda</a></li>
						<li><a href="<?php echo base_url(); ?>index.php/adminwebsite/settingpassword">Setting password anda</a></li>
                    </ul>                                        
                </li>                
                <li>
                    <div class="user">
                        <a href="#" class="name">
                            <span><?php echo @$session['pengguna']; ?></span>
                            <span class="sm">administrator</span>
                        </a>
                    </div>
					<div class="buttons">
                        <div class="sbutton blue">
                            <a href="<?php echo base_url(); ?>index.php/adminwebsite/destroyingsession" onclick="return confirm('yakin mau keluar ?');" title="logout"><span class="ico-off"></span></a>
                        </div>                        
                    </div>
                    <div class="buttons">
                        <div class="sbutton green navButton">
                            <a href="#"><span class="ico-align-justify"></span></a>
                        </div>
                        <div class="sbutton blue">
                            <a href="#"><span class="ico-cogs"></span></a>
                            <div class="popup">
                                <div class="arrow"></div>
                                <div class="row-fluid">
                                    <div class="row-form">
                                        <div class="span12"><strong>SETTINGS</strong></div>
                                    </div>                                    
                                    <div class="row-form">
                                        <div class="span4">Navigation:</div>
                                        <div class="span8"><input type="radio" class="cNav" name="cNavButton" value="default"/> Default <input type="radio" class="cNav" name="cNavButton" value="bordered"/> Bordered</div>
                                    </div>                                    
                                    <div class="row-form">
                                        <div class="span4">Content:</div>
                                        <div class="span8"><input type="radio" class="cCont" name="cContent" value=""/> Responsive <input type="radio" class="cCont" name="cContent" value="fixed"/> Fixed</div>
                                    </div>                                    
                                </div>
                            </div>
                        </div>                        
                    </div>
                </li>
               
            </ul>