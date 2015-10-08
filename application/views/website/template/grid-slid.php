<ul id="flexiselDemo3">
						<li><img src="<?php echo base_url(); ?>asset/website/images/n1.png"  class="img-responsive" /><div class="grid-flex"><h4>Laptob </h4><p>Segera Hadir</p>
						
						</div></li>
						<li><img src="<?php echo base_url(); ?>asset/website/images/n2.png"  class="img-responsive" /><div class="grid-flex"><h4>Handphone </h4><p>Segera Hadir </p>
						
						</div></li>
						<li><img src="<?php echo base_url(); ?>asset/website/images/n3.png"  class="img-responsive" /><div class="grid-flex"><h4>Sepeda Motor </h4><p>Segera Hadir </p>
						
						</div></li>
						<li><img src="<?php echo base_url(); ?>asset/website/images/n4.png"  class="img-responsive" /><div class="grid-flex"><h4>Mobil  </h4><p>Segera Hadir</p>
						
						</div></li>
						<li><img src="<?php echo base_url(); ?>asset/website/images/n5.png"  class="img-responsive" /><div class="grid-flex"><h4>Sepeda Polygon </h4><p>Segera Hadir</p>
						
						</div></li>
				     </ul>
				     <script type="text/javascript">
					 $(window).load(function() {
						$("#flexiselDemo3").flexisel({
							visibleItems: 6,
							animationSpeed: 1000,
							autoPlay:true,
							autoPlaySpeed: 3000,    		
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
					    	responsiveBreakpoints: { 
					    		portrait: { 
					    			changePoint:480,
					    			visibleItems: 1
					    		}, 
					    		landscape: { 
					    			changePoint:640,
					    			visibleItems: 2
					    		},
					    		tablet: { 
					    			changePoint:768,
					    			visibleItems: 3
					    		}
					    	}
					    });
					    
					});
				   </script>
				   <script type="text/javascript" src="<?php echo base_url(); ?>asset/website/js/jquery.flexisel.js"></script>