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
    <!--[if lte IE 7]>
        <link href="<?php echo base_url(); ?>asset/adminwebsite/css/ie.css" rel="stylesheet" type="text/css" />
        <script type='text/javascript' src='<?php echo base_url(); ?>asset/adminwebsite/js/plugins/other/lte-ie7.js'></script>
    <![endif]-->    
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/adminwebsite/js/plugins/jquery/jquery-1.9.1.min.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/adminwebsite/js/plugins/jquery/jquery-ui-1.10.1.custom.min.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/adminwebsite/js/plugins/jquery/jquery-migrate-1.1.1.min.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/adminwebsite/js/plugins/jquery/globalize.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/adminwebsite/js/plugins/other/excanvas.js'></script>
    
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/adminwebsite/js/plugins/other/jquery.mousewheel.min.js'></script>
        
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/adminwebsite/js/plugins/bootstrap/bootstrap.min.js'></script>            
    
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/adminwebsite/js/plugins/cookies/jquery.cookies.2.2.0.min.js'></script>    
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/adminwebsite/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js'></script>    
    <script type='text/javascript' src="<?php echo base_url(); ?>asset/adminwebsite/js/plugins/uniform/jquery.uniform.min.js"></script>
	
	<script type='text/javascript' src='<?php echo base_url(); ?>asset/adminwebsite/js/plugins/datatables/jquery.dataTables.min.js'></script>

    <script type='text/javascript' src='<?php echo base_url(); ?>asset/adminwebsite/js/plugins/cleditor/jquery.cleditor.js'></script>        
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/adminwebsite/js/plugins/ckeditor/ckeditor.js'></script>    
    <script type='text/javascript' src="<?php echo base_url(); ?>asset/adminwebsite/js/plugins/select/select2.min.js"></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/adminwebsite/js/plugins/tagsinput/jquery.tagsinput.min.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/adminwebsite/js/plugins/maskedinput/jquery.maskedinput-1.3.min.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/adminwebsite/js/plugins/multiselect/jquery.multi-select.min.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/adminwebsite/js/plugins/shbrush/XRegExp.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/adminwebsite/js/plugins/shbrush/shCore.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/adminwebsite/js/plugins/shbrush/shBrushXml.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/adminwebsite/js/plugins/shbrush/shBrushJScript.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/adminwebsite/js/plugins/shbrush/shBrushCss.js'></script>    
    
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/adminwebsite/js/plugins.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/adminwebsite/js/charts.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/adminwebsite/js/actions.js'></script>
	
	<script type='text/javascript' src='<?php echo base_url(); ?>asset/adminwebsite/js/plugins/validationEngine/languages/jquery.validationEngine-en.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>asset/adminwebsite/js/plugins/validationEngine/jquery.validationEngine.js'></script>
    
</head>
<body>    
    <div id="loader"><img src="<?php echo base_url(); ?>asset/adminwebsite/img/loader.gif"/></div>
    <div class="wrapper">
		<?php  echo $_navigation ;?>
            <div class="content">
                <?php   echo $_content;?>   
            </div>
        </div>
    
    <div class="dialog" id="source" style="display: none;" title="Source"></div>
    
</body>
</html>
