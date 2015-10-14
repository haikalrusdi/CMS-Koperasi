<!DOCTYPE html>
<html lang="en">
<head>        
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<meta name="author" content="Rizki Rinaldi (Koperasi ITS)">

    <!--[if gt IE 8]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />        
    <![endif]-->                
    <title><?php echo $title; ?></title>
    <link rel="icon" type="image/ico" href="favicon.ico"/>
    
    <link href="<?php echo base_url(); ?>asset/adminwebsite/css/stylesheets.css" rel="stylesheet" type="text/css" />
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/adminwebsite/js/plugins/jquery/jquery-1.9.1.min.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/adminwebsite/js/actions.js'></script>
    <script>
		<?php if($message == 0){?>alert("Username / Password Salah !!")<?php } ?>
	</script>
</head>
<body>    
    <div id="loader"><img src="<?php echo base_url(); ?>asset/adminwebsite/img/loader.gif"/></div>
       
    <div class="login">

        <div class="page-header">
            <div class="icon">
                <span class="ico-arrow-right"></span>
            </div>
            <h1>Login <small>METRO STYLE ADMIN PANEL</small></h1>
        </div>        
        <form method="post" action="<?php echo base_url(); ?>index.php/adminwebsite/proseslogin">
        <div class="row-fluid">
            <div class="row-form">
                <div class="span12">
                    <input type="text" name="username" placeholder="login"/>
                </div>
            </div>
            <div class="row-form">
                <div class="span12">
                    <input type="password" name="password" placeholder="password"/>
                </div>            
            </div>


            <div class="row-form">
                <div class="span12">
                <p><img src="../captcha/captcha.php" width="214px" alt="captcha"></p>
                <p><input type="text" name="captcha" value="" placeholder="Masukan kode diatas" required></p>
                </div>            
            </div>




            <div class="row-form">
                <div class="span12">
                    <!--<button class="btn">Sign in <span class="icon-arrow-next icon-white"></span></button>-->
					<input type="submit" value="Sign in" class="btn" />
                </div>                
            </div>
        </div></form>
    </div>
    
</body>
</html>
