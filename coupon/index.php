<?
	$do	= $_REQUEST ['do'];

	switch ($do) {

	case 'new' :
			$do_next	= 'save_new';
			include_once('coupon/new.php');
			die();
		break;
		
		case 'save_new' :
			$data 	= $_POST['data'];
			$res		= semua::insert_data('coupon',$data);
			echo $res;
			die();
		break;
		
		case 'edit' :
			$id			= $_REQUEST['id'];
			$data		= semua::get_single_data('coupon',"coupon_id=$id");
			$do_next	= 'save_edit';
			include_once('coupon/new.php');
			die();
		break;
		
		case 'save_edit' :
			$id		= $_REQUEST['id'];
			$data 	= $_POST['data'];
			$res		= semua::update_data('coupon',$data,"coupon_id=$id");
			echo $res;
			die();
		break;
		
		case 'delete' :
			$id			= $_REQUEST['id'];
			$res			= semua::custom("delete from coupon where coupon_id=$id");
			$data		= semua::get_data('coupon');	
			$display 	= 'coupon/list.php';
		break;
		
		default :
			$data		= semua::get_data('coupon');	
			$display 	= 'coupon/list.php';
	}
?>