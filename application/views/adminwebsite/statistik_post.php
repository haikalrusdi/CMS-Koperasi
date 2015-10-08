
                
                <div class="page-header">
                    <div class="icon">
                        <span class="ico-layout-7"></span>
                    </div>
                    <h1>Counter Post <small>Koperasi ITS</small></h1>
                </div>

                <div class="row-fluid">
                    <div class="span12">        
                        <div class="block">
                            <div class="head dblue">
                                <div class="icon"><span class="ico-layout-9"></span></div>
                                <h2>Tabel content</h2>
                                <ul class="buttons">
                                    <li><a href="#" onClick="source('table_sort_pagination'); return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                </ul>                                                        
                            </div>                
                                <div class="data-fluid">
                                    <table class="table fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
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
                </div>  
           