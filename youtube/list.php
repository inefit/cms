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
<h2>YouTube</h2> 
<a style="margin:-20px 0 10px 0" href="?act=youtube&do=new" class="bt_green popup"><span class="bt_green_lft"></span><strong>New YouTube</strong><span class="bt_green_r"></span></a>	
<table class="data_table display">
	<thead>
		<tr>
			<th width="340">URL</th>
			<th width="180">Username</th>
			<th width="100">Stars</th>
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
			<td> <a href="<?=$data['youtube_url']?>" target="_blank"><?=$data['youtube_url']?></td>
			<td> <?=$data['user_name']?></td>
			<td align="center"> <?=$data['youtube_seed']?></td>
			<td align="center"> <img alt="<?=$data['youtube_status']?>" src="../assets/images/<?=$data['youtube_status']?>.png"></td>
			<td align="center">
				<a href="?act=youtube&amp;do=active&amp;id=<?=$data['user_youtube_id']?>&status=<?=$data['youtube_status']?>" class="ajax"><img src="../assets/images/log.png" alt="Active" title="Active" border="0"></a> &nbsp;
				<a href="?act=youtube&amp;do=edit&amp;id=<?=$data['user_youtube_id']?>" class="popup"><img src="../assets/images/ubah.png" alt="Edit" title="Edit" border="0"></a>  &nbsp;
				<a href="?act=youtube&amp;do=delete&amp;id=<?=$data['user_youtube_id']?>" class="ask"><img src="../assets/images/delete.gif" alt="Delete" title="Delete" border="0"></a>  &nbsp;
			</td>
		</tr>
	<? endforeach;?>
	
	</tbody>
</table>


