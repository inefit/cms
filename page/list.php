<script type="text/javascript" src="../script/myjs2.js"></script>
<script>
$(document).ready(function(){
<? if ($res != ''){ ?>
	var html = (1 == <?=$res?>) ? 'Remove succes' : 'Failed to remove';
	var tipe = (1 == <?=$res?>) ? 'valid_box' : 'error_box';
	$('#mybox').html(html);
	$('#mybox').fadeIn('slow');
	$('#mybox').addClass(tipe);
	setTimeout("$('#mybox').slideUp('slow')",3002);	
<? } ?>
});
</script>
<div id="mybox" style="display:none"></div>
<h2>Page</h2> 
<a style="margin:-20px 0 10px 0" href="?act=page&do=new" class="bt_green popup"><span class="bt_green_lft"></span><strong>New Page</strong><span class="bt_green_r"></span></a>	
<table class="data_table display">
	<thead>
		<tr>
			<th width="30">No</th>
			<th width="900">Name</th>
			<th width="90">Action</th>
		</tr>
	</thead>
	<tbody>
	<? $i = 1;
		if (is_array($data))
		foreach ($data as $data) :
	?>
		<tr>
			<td align="center">&nbsp;<?=$i++?></td>
			<td> &nbsp;<?=$data['page_name']?></td>
			<td align="center">
				<a href="?act=page&amp;do=edit&amp;id=<?=$data['page_id']?>" class="popup"><img src="../assets/images/ubah.png" alt="Edit" title="Edit" border="0"></a> 
				<a href="?act=page&amp;do=delete&amp;id=<?=$data['page_id']?>" class="ask"><img src="../assets/images/delete.gif" alt="Delete" title="Delete" border="0"></a> 
				<a href="?act=page&amp;do=detail&amp;id=<?=$data['page_id']?>" class="popup"><img src="../assets/images/detail.png" alt="View" title="View" border="0"></a>
			</td>
		</tr>
	<? endforeach;?>
	
	</tbody>
</table>


