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
<h2>Coupons</h2> 
<a style="margin:-20px 0 10px 0" href="?act=coupon&do=new" class="bt_green popup"><span class="bt_green_lft"></span><strong>Add New</strong><span class="bt_green_r"></span></a>	
<table class="data_table display">
	<thead>
		<tr>
			<th width="170">Coupon Code</th>
			<th width="170">Coupon Seeds</th>
			<th width="90">Action</th>
		</tr>
	</thead>
	<tbody>
	<? $i = 1;
		if (is_array($data))
		foreach ($data as $data) :
	?>
		<tr>
			<td> <?=$data['coupon_code']?></td>
			<td align="center"> <?=$data['coupon_seeds']?></td>
			<td align="center">
				<a href="?act=coupon&amp;do=edit&amp;id=<?=$data['coupon_id']?>" class="popup"><img src="../assets/images/ubah.png" alt="Edit" title="Edit" border="0"></a> 
				<a href="?act=coupon&amp;do=delete&amp;id=<?=$data['coupon_id']?>" class="ask"><img src="../assets/images/delete.gif" alt="Delete" title="Delete" border="0"></a> 				
			</td>
		</tr>
	<? endforeach;?>
	
	</tbody>
</table>


