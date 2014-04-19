<script type="text/javascript">
$(document).ready(function(){
	$("#isi2 label").width(100);
	$("#isi2 label").css({'display':'block','float':'left','margin':'5px 0 0 0'});
	$("#user_id").fcbkcomplete({
		json_url: "?act=user&do=cari_ac",
		addontab: true,                   
		maxitems: 1,
		height: 10,
		width: 350,
		cache: true,
		input_min_size: 0,
		onselect: function(value){
			$('#user_id').val(value._value);
		}
	});
	<? if ($do=='edit'){ ?>
	$("#user_id").trigger("addItem",[{"title": "<?=$data['user_name']?>", "value": "<?=$data['user_id']?>"}]);
	<?}?>
});
	
function submit_form(data, form, json, options){	
	var html = '';
	if (data == true){
		html = '<center><br /><br /><br /><img src="../images/success-save.png"><br /> Berhasil menyimpan data.</center>';
		$('#loader2').html(html);
		setTimeout("$.colorbox.close()",1000);
		setTimeout("load_page('?act=twitter','')",1005);
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
<h2><b><?=ucfirst($do)?> Twitter</b></h2> 
<div id="mybox" style="display:none"></div>
<form mehod="POST" action="index.php" id='ajax_form'>
	<input name="act" type="hidden" value="twitter"/>
	<input name="do" type="hidden" value="<?=$do_next?>"/>
	<input name="id" type="hidden" value="<?=$id?>"/>
	<label>User Name </label> 
	<? if ($do == 'new'){ ?>
		<div style="float:left;margin-left:13px"><select id="user_id" name="user_id"></select></div><br><br>
	<? } else { ?>
		: &nbsp; <?=$data['user_name']?><br><br>
	<? } ?>	
	<label>Twitter ID </label> : &nbsp;
	<input id="1"  name="data[twitter_id]" type="text" class="validate[required]"  value="<?=$data['twitter_id']?>" size="50"/> <br>
	<label>Twitter User </label> : &nbsp;
	<input id="2"  name="data[twitter_user]" type="text" class="validate[required]"  value="<?=$data['twitter_user']?>" size="50"/> <br>
	<label>Twitter Name </label> : &nbsp;
	<input id="3"  name="data[twitter_name]" type="text" class="validate[required]"  value="<?=$data['twitter_name']?>" size="50"/> <br>
	<label>Twitter Star </label> : &nbsp;
	<input id="4"  name="data[twitter_seed]" type="text" class="validate[required]"  value="<?=$data['twitter_seed']?>" size="50"/> <br>
	<br>
	<?if ($do != 'detail'){?><input name="submit" type="submit" value="Save"/><?}?>
</form>
</div>
