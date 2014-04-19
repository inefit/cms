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
});
</script>
    <h2>Welcome in Admin Panel</h2> 
	<div style="display:none">
	<textarea id="editor"><?=$data['page_content']?></textarea>
	</div>
	
