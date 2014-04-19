<script type="text/javascript">
$(document).ready(function(){
	$("#isi2 label").width(130);
	$("#isi2 label").css({'display':'block','float':'left','margin':'5px 0 0 0'});
});

function submit_form(data, form, json, options){	
	var html = (data == true) ? 'Password changed' : 'Failed to change';
	var tipe = (data == true) ? 'valid_box' : 'error_box';
	$('#mybox').html(html);
	$('#mybox').addClass(tipe);
	$('#mybox').fadeIn('slow');	
	setTimeout("$('#mybox').slideUp('slow')",3002);	
}

$("#ajax_form").validationEngine({
	ajaxFormValidation: true,
	//onBeforeAjaxFormValidation : loading,
	onAjaxFormComplete: submit_form,
});
</script>
<div id="mybox" style="display:none"></div>
<h2><b>Change my Password</b></h2> 
<div id="mybox" style="display:none"></div>
<div id="isi2">
<form mehod="POST" action="index.php" id='ajax_form'>
	<input name="act" type="hidden" value="setting"/>
	<input name="do" type="hidden" value="do_change"/>
	<label>Old Password </label> : &nbsp;
	<input id="ed1" name="op" type="password" class="validate[required]" size="30"/> <br>
	<label>New Password </label> : &nbsp;
	<input id="ed2" name="np" type="password" class="validate[required]" size="30"/> <br>
	<label>Confirm Password </label> : &nbsp;
	<input id="ed3" name="cp" type="password" class="validate[equals[ed2]]" size="30"/> <br>
	<br>
	<input name="submit" type="submit" value="Save"/>
</form>
</div>