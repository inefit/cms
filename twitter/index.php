<?
	$do 				= $_REQUEST ['do'];

	switch ($do) {
		case 'new' :
			$do_next	= 'save_new';
			include_once('twitter/new.php');
			die();
		break;
		
		case 'save_new' :
			$data 	= $_POST['data'];
			$id 		= $_POST['user_id'][0];
			$res		= semua::update_data('user',$data,"user_id='$id'");
			echo $res;
			die();
		break;
		
		case 'edit' :
			$id			= $_REQUEST['id'];
			$data		= semua::get_single_data('user',"user_id=$id");
			$do_next	= 'save_edit';
			include_once('twitter/new.php');
			die();
		break;
		
		case 'save_edit' :
			$id			= $_REQUEST['id'];
			$data 		= $_POST['data'];
			$res			= semua::update_data('user',$data,"user_id=$id");
			echo $res;
			die();
		break;
		
		case 'detail' :
			$id			= $_REQUEST['id'];
			$data		= semua::get_single_data('user',"user_id=$id");
			$do_next	= '';
			include_once('twitter/new.php');
			die();
		break;
		
		case 'active' :
			$id			= $_REQUEST['id'];
			$status		= $_REQUEST['status'];
			if ($status == 0) $status = 1;
			else if ($status == 1) $status = 0; 	
			$data ['twitter_status'] 	= $status;
			$res			= semua::update_data('user',$data,"user_id=$id");
			$data		= semua::get_data('user','twitter_user <> ""');	
			$display 	= 'twitter/list.php';
		break;
		
		case 'delete' :
			$id			= $_REQUEST['id'];
			$data['twitter_id'] 		= '';
			$data['twitter_user'] 	= '';
			$data['twitter_name'] 	= '';
			$data['twitter_seed'] 	= '';
			$where = "user_id=$id";
			$res 	= semua::update_data('user',$data,$where);
			
	
		default :
			$data		= semua::get_data('user','twitter_user <> ""');	
			$display 	= 'twitter/list.php';
	}
?>