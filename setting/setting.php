<script type="text/javascript">
$(document).ready(function(){
	$("#isi2 label").width(130);
	$("#isi2 label").css({'display':'block','float':'left','margin':'5px 0 0 0'});
});

function submit_form(data, form, json, options){	
	var html = (data == true) ? 'Data saved' : 'Failed to save';
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
<div id="isi2">
<h2><b>Setting</b></h2> 
<div id="mybox" style="display:none"></div>
<form mehod="POST" action="index.php" id='ajax_form'>
	<input name="act" type="hidden" value="setting"/>
	<input name="do" type="hidden" value="save_setting"/>
	<label>Paypal Account </label> : &nbsp;
	<input name="data[paypal_acc]" type="text" value="<?=$data['paypal_acc']?>" size="50"/> <br>
	<label>Adv Code </label> <span>: &nbsp;</span>
	<textarea name="data[adv]" cols="50" rows="5"><?=$data['adv']?></textarea><br>
	<input name="submit" type="submit" value="Save"/>
</form>
</div>
