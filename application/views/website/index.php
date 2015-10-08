<!DOCTYPE HTML>
<html>
<head>
<title>KPRI Institut Teknologi Sepuluh Nopember</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url(); ?>asset/website/css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url(); ?>asset/website/css/style.css" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url(); ?>asset/website/css/jquery.countdown.css" rel="stylesheet" type='text/css'/>
<link href='http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<!-- dropdown -->
<script src="<?php echo base_url(); ?>asset/website/js/jquery.easydropdown.js"></script>
<!-- start menu -->
<link href="<?php echo base_url(); ?>asset/website/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="<?php echo base_url(); ?>asset/website/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/website/js/megamenu.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/website/js/responsiveslides.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/website/js/jquery.flexslider.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: false,
      	speed: 1000,
        namespace: "callbacks",
        pager: true,
      });
    });
</script>
<!--<script src="js/jquery.countdown.js"></script>
<script src="js/script.js"></script>-->
</head>
<body>
<div class="menu-top"></div>
<div class="header">
<div class="container">
<div class="header_bottom"><img src="<?php echo base_url(); ?>asset/website/images/header.png" class="img-responsive" alt=""/>
	</div>
</div>
</div>

<div class="container">
<div class="menu-tengah"></div>
<div class="menu-nav">
<!--<div class="callbacks_container">-->
    <?php echo $_menu; ?>
<!--</div>-->
</div>
</div>
<div class="container">
<div class="index_slider">
	  <!--<div class="callbacks_container">-->
	      <?php echo $_slide; ?>
	  <!--</div>-->
	</div> 
</div>

<div class="content_middle">
	<div class="container">
		<!--<div class="callbacks_container">-->
		 <?php echo $_grid; ?>
	</div>
	<!--</div>-->
</div>

<div class="container-content">
<div class="content_middle_bottom">
	  <div class="col-md-4">
		 <?php echo $_sidebar; ?>
		</div>
		
		<div class="col-md-8">
		  <?php echo $_content; ?>
		</div>

	</div>
   <?php echo $_footer; ?>
</div>
<div class="container">
<div class="footer">
		<?php  
		$thn = date('Y');
		?>
		<p class="copy">Copyright &copy; <?php echo $thn;?> by KPRI Institut Teknologi Sepuluh Nopember</p>
	</div>
</div>
</body>
</html>		