<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Login</title>
<link rel="stylesheet" type="text/css" href="../style/adstyle.css" />
<script type="text/javascript" src="../script/jquery.js"></script>
<script language="javascript" type="text/javascript" src="../script/niceforms.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="../style/niceforms-default.css" />

</head>
<body>
<div id="main_container">

	<div class="header_login">
    <div class="logo"><!--a href="#"><img src="images/logo.gif" alt="" title="" border="0" /></a--></div>
    
    </div>

     
         <div class="login_form" style="margin-top:100px">
         
         <h3>Admin Panel Login</h3>
         
         <!--<a href="#" class="forgot_pass">Forgot password</a> -->
         
         <form action="" method="post" class="niceform">
			<input type="hidden" name="act" value="do_login" />
         		
                <fieldset>
				<?php if ($error != ''){?>
					<div style="text-align:center;color:#FF0000;text-decoration:blink"><b>* Invalid ID or password</b></div>
				<?php } ?>
                    <dl>
						<dt><label for="email">Username:</label></dt>
                        <dd><input type="text" name="user" size="54" value="" /></dd>

                    </dl>
                    <dl>
                        <dt><label for="password">Password:</label></dt>
                        <dd><input type="password" name="pass" size="54" value="" /></dd>
                    </dl>
                    
                    <dl>
                        <dt><label></label></dt>
                        <dd>

                    <input type="checkbox" name="remember" value="OK" /><label class="check_label">Remember me</label>
                        </dd>
                    </dl>
                    
                     <dl class="submit">
                    <input type="submit" name="submit" id="submit" value="Enter" />
                     </dl>
                    
                </fieldset>
                
         </form>

         </div>  

    <div class="footer_login">
    
    	<div class="left_footer_login"></div>
    	<div class="right_footer_login"></div>
    
    </div>

</div>		
</body>
</html>