<div class="page-header">
                    <div class="icon">
                        <span class="ico-arrow-right"></span>
                    </div>
                    <h1>Dashboard <small>METRO STYLE ADMIN PANEL</small></h1>
                </div>
                
                <div class="row-fluid">                    
                    <div class="span7">                        
                        <div class="block">    
                            <div class="row-fluid">
                                <div class="span4">
                                    <div class="stat">
                                        <span class="cdblue"><?php echo $page_view[0]['totalview']; ?></span> PAGE<br/> VIEWS
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="stat">
                                        <span class="cblue"><?php echo $total_post; ?></span> TOTAL<br/> POST
                                    </div>                                                                        
                                </div>
                                <div class="span4">
                                    <div class="stat">
                                        <span class="corange"><?php echo $total_comment; ?></span> TOTAL<br/> KOMENTAR
                                    </div>                                                
                                </div>               
                            </div>
                        </div>

                        <div class="block">
                            <div class="head orange">                                
                                <h2>Latest Orders</h2>
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
                                            <th><input type="checkbox" class="checkall"/></th>
                                            <th>Judul Content</th>
                                            <th width="20%">Counter</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($post as $p){ ?>
                                            <tr>
                                                <td><input type="checkbox" name="order[]" value="528"/></td>
                                                <td><a href="#"><?php echo $p['judul_content']; ?></a></td>
                                                <td><span class="label label-important"><?php echo $p['counter']; ?></span></td>
                                            </tr>
										<?php } ?>                             
                                    </tbody>
                                </table>
                            </div>                            
                        </div>                        
                        
                    </div>
                    <div class="span5">
                        <div class="block">
                            <div class="head">                                
                            </div>
                            <div class="data-fluid">
                            </div>                                   
                        </div>                        
                        
                        <div class="block">
                            <div class="head dblue">                                
                                <h2>Pending Comment</h2>
                                <ul class="buttons">             
                                    <li><a href="#" onClick="source('messages'); return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                    <li><a href="#" class="ublock"><div class="icon"><span class="ico-undo"></span></div></a></li>
                                    <li><a href="#" class="cblock"><div class="icon"><span class="ico-sort"></span></div></a></li>
                                </ul>                                
                            </div>
                            <div class="data dark npr npb">                                
                                <div class="messages scroll" style="height: 250px;">
								<?php foreach($comment as $c){ ?>
                                    <div class="item blue">
                                        <div class="arrow"></div>
                                        <div class="text"><?php echo '<b>'.$c['pengirim'].'</b><br /><br />'.$c['isi']; ?></div>
                                        <div class="date"><?php echo $c['tanggal']; ?></div>
                                    </div>
								<?php } ?>                                 
                                </div>								
                            </div>    
                            <div class="toolbar dark">                               
                            </div>
                        </div>
                        
                    </div>
                    
                </div>