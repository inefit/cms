<?
	$do 				= $_REQUEST ['do'];

	switch ($do) {
		case 'new' :
			$do_next	= 'save_new';
			include_once('youtube/new.php');
			die();
		break;
		
		case 'save_new' :
			$data 	= $_POST['data'];
			$data[user_id] = $data[user_id][0]; 
			$res		= semua::insert_data('user_youtube',$data);
			echo $res;
			die();
		break;
		
		case 'edit' :
			$id			= $_REQUEST['id'];
			$select		= 'y.*,u.user_name as user_name';
			$table		= 'user_youtube y join user u on y.user_id=u.user_id';
			$data		= semua::get_single_data($table,"user_youtube_id=$id",$select);
			$do_next	= 'save_edit';
			$ar[$data['login_with']] = ' checked="true" ';
			include_once('youtube/new.php');
			die();
		break;
		
		case 'save_edit' :
			$id			= $_REQUEST['id'];
			$data 	= $_POST['data'];
			$data[user_id] = $data[user_id][0];
			$res		= semua::update_data('user_youtube',$data,"user_youtube_id=$id");
			echo $res;
			die();
		break;
		
		case 'detail' :
			$id			= $_REQUEST['id'];
			$select		= 'y.*,u.user_name as user_name';
			$table		= 'user_youtube y join user u on y.user_id=u.user_id';
			$data		= semua::get_single_data($table,"user_youtube_id=$id",$select);
			$do_next	= '';
			$ar[$data['login_with']] = ' checked="true" ';
			include_once('youtube/new.php');
			die();
		break;

		case 'active' :
			$id			= $_REQUEST['id'];
			$status		= $_REQUEST['status'];
			if ($status == 0) $status = 1;
			else if ($status == 1) $status = 0; 	
			$data ['youtube_status'] 	= $status;
			$res			= semua::update_data('user_youtube',$data,"user_youtube_id=$id");
			$select		= 'y.*,u.user_name as user_name';
			$table		= 'user_youtube y join user u on y.user_id=u.user_id';
			$data		= semua::get_data($table,1,$select);	
			$display 	= 'youtube/list.php';
		break;
		
		case 'delete' :
			$id			= $_REQUEST['id'];
			$res			= semua::custom("delete from user_youtube where user_youtube_id=$id");
		
		default :
			$select		= 'y.*,u.user_name as user_name';
			$table		= 'user_youtube y join user u on y.user_id=u.user_id';
			$data		= semua::get_data($table,1,$select);	
			$display 	= 'youtube/list.php';
	}
?>