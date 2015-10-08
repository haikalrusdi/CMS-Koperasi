                
                <div class="page-header">
                    <div class="icon">
                        <span class="ico-layout-7"></span>
                    </div>
                    <h1>View Days <small>Koperasi ITS</small></h1>
                </div>
				<div class="row-fluid">                                                            
                    <div class="span12">
                        <div class="widgets">
                            <div class="widget blue value">
                                <div class="right" style="width:75%;">
								<?php foreach($post as $p){ ?>
                                    <?php echo $p['judul_content'] ?><br/>
								<?php } ?>
								</div>
                                <div class="right" style="width:20%; text-align:right;">
								<?php foreach($post as $p){ ?>
                                    <?php echo $p['counter'] ?><br/>
								<?php } ?>
                                </div>
                                <div class="bottom">
                                    <a href="#">Some link for widget</a>
                                </div>
                            </div>
                            <div class="widget green icon">
                                <div class="left">
                                    <div class="icon">
                                        <span class="ico-lamp-3"></span>
                                    </div>
                                </div>
                                <div class="right">
                                    <table cellpadding="0" cellspacing="0" width="100%">
                                        <tr>
                                            <td>Hari ini </td><td><?php echo $visitor['day']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kemarin </td><td><?php echo $visitor['yesterday']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Bulan ini </td><td><?php echo $visitor['mounth']; ?></td> 
                                        </tr>
                                        <tr>
                                            <td>Tahun ini </td><td><?php echo $visitor['year']; ?></td> 
                                        </tr>
                                        <tr>
                                            <td>Sepanjang Waktu </td><td><?php echo $visitor['sepanjang_waktu']; ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="bottom">
                                    <a href="#">Some link for widget</a>
                                </div>                            
                            </div>                                             
                            
                        </div>
                    </div>
                </div>
           