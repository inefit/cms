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
<h2>Users</h2> 
<a style="margin:-20px 0 10px 0" href="?act=user&do=new" class="bt_green popup"><span class="bt_green_lft"></span><strong>New User</strong><span class="bt_green_r"></span></a>	
<table class="data_table display">
	<thead>
		<tr>
			<th width="170">User Name</th>
			<th width="170">Twitter User</th>
			<th width="170">Twitter Name</th>
			<th width="100">Current Stars</th>
			<th width="100">Status</th>
			<th width="90">Action</th>
		</tr>
	</thead>
	<tbody>
	<? $i = 1;
		if (is_array($data))
		foreach ($data as $data) :
	?>
		<tr>
			<td> <?=$data['user_name']?></td>
			<td> <?=$data['twitter_user']?></td>
			<td> <?=$data['twitter_name']?></td>
			<td align="center"> <?=$data['current_seed']?></td>
			<td align="center"> <img alt="<?=$data['user_status']?>" src="../assets/images/<?=$data['user_status']?>.png"></td>
			<td align="center">
				<a href="?act=user&amp;do=edit&amp;id=<?=$data['user_id']?>" class="popup"><img src="../assets/images/ubah.png" alt="Edit" title="Edit" border="0"></a> 
				<a href="?act=user&amp;do=delete&amp;id=<?=$data['user_id']?>" class="ask"><img src="../assets/images/delete.gif" alt="Delete" title="Delete" border="0"></a> 				
			</td>
		</tr>
	<? endforeach;?>
	
	</tbody>
</table>


