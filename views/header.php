<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CodeLab</title>
<link rel="stylesheet" type="text/css" href="../style/adstyle.css" />
<link rel="stylesheet" type="text/css" media="all" href="../style/colorbox.css" />
<link rel="stylesheet" type="text/css" media="all" href="../style/jquery-ui-1.8.16.custom.css" />
<link rel="stylesheet" type="text/css" media="all" href="../style/jqtransform.css" />
<link rel="stylesheet" type="text/css" media="all" href="../style/fcbkcomplete.css" />
<link rel="stylesheet" type="text/css" media="all" href="../style/validationEngine.jquery.css" />
<link rel="stylesheet" type="text/css" media="all" href="../style/jquery.datepick.css" />
<link rel="stylesheet" type="text/css" media="all" href="../style/demo_table_jui.css" />

<script type="text/javascript" src="../script/jquery.js"></script>
<script type="text/javascript" src="../script/jquery.colorbox.js"></script>
<script type="text/javascript" src="../script/jquery.jclock-1.2.0.js"></script>
<script type="text/javascript" src="../script/jconfirmaction.jquery.js"></script>
<script type="text/javascript" src="../script/jquery.fcbkcomplete.js"></script>
<script type="text/javascript" src="../script/jquery.numeric.js"></script>
<script type="text/javascript" src="../script/jquery.jqtransform.js"></script>
<script type="text/javascript" src="../script/jquery.validationEngine.js"></script>
<script type="text/javascript" src="../script/jquery.validationEngine-en.js"></script>
<script type="text/javascript" src="../script/jquery.datepick.js"></script>
<script type="text/javascript" src="../script/jquery.dataTables.js"></script>
<script type="text/javascript" src="../script/myjs.js"></script>
<script type="text/javascript" src="../script/ckeditor/ckeditor.js"></script>
<script type="text/javascript">

function load_page(page,send){	
	page = page+'&ajax=1';
	$('#ajax_form').validationEngine('hideAll'); 
	$('#loader').show();
	$('#isi').hide();
	$.post( 
		page,
		send,
		function(data){
			$('#isi').html(data);
			$('#loader').hide();
			$('#isi').slideDown('slow');
		}
	)
}	
</script>
</head>
<body>
<div id="main_container">

	<div class="header">
    <div class="logo"><input type="hidden" id="param"><!--<a href="#"><img src="/images/logo.gif" alt="" title="" border="0" /></a>--></div>
    
    <div class="right_header">Welcome <?=$_SESSION['user']?>  | <a href="?act=logout" class="logout">Logout</a></div>
    <div class="jclock"></div>
    </div>
    