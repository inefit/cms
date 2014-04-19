<script type="text/javascript">
$(document).ready(function(){
	$("#isi2 label").width(100);
	$("#isi2 label").css({'display':'block','float':'left','margin':'5px 0 0 0'});
});
	
function submit_form(data, form, json, options){	
	var html = '';
	if (data == true){
		html = '<center><br /><br /><br /><img src="../images/success-save.png"><br /> Berhasil menyimpan data.</center>';
		$('#loader2').html(html);
		setTimeout("$.colorbox.close()",1000);
		setTimeout("load_page('?act=user','')",1005);
	}else {
		html = '<br /><br /><center><img src="../images/fail-save.png"><br /> Gagal menyimpan data.<br /> Mungkin dikarenakan ditemukan kode yg sama</center>';	
		$('#loader2').html(html);
		setTimeout("$('#loader2').hide();",2000);
		setTimeout("$('#isi2').show();",2002);	
	}
}

function loading(form,option){
	$('#loader2').show();
	$('#isi2').hide();
}

$("#ajax_form").validationEngine({
	ajaxFormValidation: true,
	onBeforeAjaxFormValidation : loading,
	onAjaxFormComplete: submit_form,
});
</script>
<div id="loader2" style="display:none">
	<br /><br /><br /><br /><center><img src="../images/loading.gif"><br /> Please Wait</center></div>
</div>
<div id="isi2">
<h2><b><?=ucfirst($do)?> User</b></h2> 
<div id="mybox" style="display:none"></div>
<form mehod="POST" action="index.php" id='ajax_form'>
	<input name="act" type="hidden" value="user"/>
	<input name="do" type="hidden" value="<?=$do_next?>"/>
	<input name="id" type="hidden" value="<?=$id?>"/>
	<label>User Name </label> : &nbsp;
	<input id="ed1" name="data[user_name]" type="text" class="validate[required]"  value="<?=$data['user_name']?>" size="50"/> <br>
	<label>Current Star </label> : &nbsp;
	<input id="ed3" name="data[current_seed]" type="text" class="validate[number]"  value="<?=$data['current_seed']?>" size="20"/> <br>
	<br>
	<?if ($do != 'detail'){?><input name="submit" type="submit" value="Save"/><?}?>
</form>
</div>
