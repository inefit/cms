<?
	$do 				= $_REQUEST ['do'];

	switch ($do) {
		case 'new' :
			$do_next	= 'save_new';
			include_once('seeds/new.php');
			die();
		break;
		
		case 'save_new' :
			$data 	= $_POST['data'];
			$res		= semua::insert_data('seeds',$data);
			echo $res;
			die();
		break;
		
		case 'edit' :
			$id			= $_REQUEST['id'];
			$data		= semua::get_single_data('seeds',"seeds_id=$id");
			$do_next	= 'save_edit';
			include_once('seeds/new.php');
			die();
		break;
		
		case 'save_edit' :
			$id		= $_REQUEST['id'];
			$data 	= $_POST['data'];
			$res		= semua::update_data('seeds',$data,"seeds_id=$id");
			echo $res;
			die();
		break;
		
		case 'detail' :
			$id			= $_REQUEST['id'];
			$data		= semua::get_single_data('seeds',"seeds_id=$id");
			$do_next	= '';
			include_once('seeds/new.php');
			die();
		break;
		
		case 'active' :
			$res 		= false;
			$id			= $_REQUEST['id'];
			$status		= $_REQUEST['status'];
			if ($status == 0) $status = 1;
			else if ($status == 1) $status = 0; 	
			$data ['seeds_status'] 	= $status;
			$res			= semua::update_data('seeds',$data,"seeds_id=$id");
			$data		= semua::get_data('seeds');	
			$display 	= 'seeds/list.php';
		break;
		
		case 'delete' :
			$id			= $_REQUEST['id'];
			$res			= semua::custom("delete from seeds where seeds_id=$id");
			$data		= semua::get_data('seeds');	
			$display 	= 'seeds/list.php';
		break;
		
		default :
			$data		= semua::get_data('seeds');	
			$display 	= 'seeds/list.php';
	}
?>