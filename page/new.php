<script type="text/javascript">
	function load_editor(id){
		if ($('#'+id).length > 0){
			var instance = CKEDITOR.instances[id];
			if(instance)
			{
				CKEDITOR.remove(instance);
			}
			CKEDITOR.replace(id);
		}
	}

	$(document).ready(function(){
		load_editor('editor');	
	})
	
	function submit_form(data, form, json, options){	
		var html = '';
		if (data == true){
			html = '<center><br /><br /><br /><img src="../images/success-save.png"><br /> Berhasil menyimpan data.</center>';
			$('#loader2').html(html);
			//$('#param').val('?act=page');
			setTimeout("$.colorbox.close()",1000);
			setTimeout("load_page('?act=page','')",1005);
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
<h2><b><?=ucfirst($do)?> Page</b></h2> 
<div id="mybox" style="display:none"></div>
<form mehod="POST" action="index.php" id='ajax_form'>
	<input name="act" type="hidden" value="page"/>
	<input name="do" type="hidden" value="<?=$do_next?>"/>
	<input name="id" type="hidden" value="<?=$id?>"/>

	Page Name : <br><input id="nama" name="data[page_name]" type="text" class="validate[required]"  value="<?=$data['page_name']?>" size="50"/> <br><br>
	Content : <br><textarea id="editor" name="data[page_content]" cols=100 rows=20 class="validate[required]"><?=$data['page_content']?></textarea>
	
	<br>
	<?if ($do != 'detail'){?><input name="submit" type="submit" value="Save"/><?}?>
</form>
</div>
