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
		setTimeout("load_page('?act=youtube','')",1005);
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
<h2><b><?=ucfirst($do)?> YouTube</b></h2> 
<div id="mybox" style="display:none"></div>
<form mehod="POST" action="index.php" id='ajax_form'>
	<input name="act" type="hidden" value="youtube"/>
	<input name="do" type="hidden" value="<?=$do_next?>"/>
	<input name="id" type="hidden" value="<?=$id?>"/>
	<label>User Name </label> 
	<div style="float:left;margin-left:13px"><select id="user_id" name="data[user_id]"></select></div><br><br>
	<label>YouTube URL </label> : &nbsp;
	<input id="youtube_url"  name="data[youtube_url]" type="text" class="validate[required,custom[url]]"  value="<?=$data['youtube_url']?>" size="50"/> <br>
	<label>YouTube Star </label> : &nbsp;
	<input  name="data[youtube_seed]" type="text" class="nomer"  value="<?=$data['youtube_seed']?>" size="30"/> <br>
	<br>
	<?if ($do != 'detail'){?><input name="submit" type="submit" value="Save"/><?}?>
</form>
</div>
