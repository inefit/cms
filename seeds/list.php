<script type="text/javascript" src="../script/myjs2.js"></script>
<script>
$(document).ready(function(){
<? if ($res != ''){ ?>
	var html = (1 == <?=$res?>) ? 'Data saved succesfully' : 'Failed to save data';
	var tipe = (1 == <?=$res?>) ? 'valid_box' : 'error_box';
	$('#mybox').html(html);
	$('#mybox').fadeIn('slow');
	$('#mybox').addClass(tipe);
	setTimeout("$('#mybox').slideUp('slow')",3002);	
<? } ?>
});
</script>
<div id="mybox" style="display:none"></div>
<h2>Stars</h2> 
<a style="margin:-20px 0 10px 0" href="?act=seeds&do=new" class="bt_green ajax"><span class="bt_green_lft"></span><strong>Add New</strong><span class="bt_green_r"></span></a>	
<table class="data_table display">
	<thead>
		<tr>
			<th width="10">No</th>
			<th width="150">Name</th>
			<th width="200">Description</th>
			<th width="15">Amount</th>
			<th width="25">Total Stars</th>
			<th width="15">Status</th>
			<th width="35">Action</th>
		</tr>
	</thead>
	<tbody>
	<? $i = 1;
		if (is_array($data))
		foreach ($data as $data) :
	?>
		<tr>
			<td align="center">&nbsp;<?=$i++?></td>
			<td><?=$data['seeds_name']?></td>
			<td><?=$data['seeds_description']?></td>
			<td><?=$data['seeds_value']?></td>
			<td><?=$data['seeds_total']?></td>
			<td align="center"> <img alt="<?=$data['seeds_status']?>" src="../assets/images/<?=$data['seeds_status']?>.png"></td>
			<td align="center">
				<a href="?act=seeds&amp;do=active&amp;id=<?=$data['seeds_id']?>&status=<?=$data['seeds_status']?>" class="ajax"><img src="../assets/images/log.png" alt="Active" title="Active" border="0"></a> &nbsp;
				<a href="?act=seeds&amp;do=edit&amp;id=<?=$data['seeds_id']?>" class="ajax"><img src="../assets/images/ubah.png" alt="Edit" title="Edit" border="0"></a> 
				<a href="?act=seeds&amp;do=delete&amp;id=<?=$data['seeds_id']?>" class="ask"><img src="../assets/images/delete.gif" alt="Delete" title="Delete" border="0"></a> 
			</td>
		</tr>
	<? endforeach;?>
	
	</tbody>
</table>


