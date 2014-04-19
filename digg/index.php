<?
	$do 				= $_REQUEST ['do'];

	switch ($do) {
		case 'new' :
			$do_next	= 'save_new';
			include_once('digg/new.php');
			die();
		break;
		
		case 'save_new' :
			$data 	= $_POST['data'];
			$data[user_id] = $data[user_id][0]; 
			$res		= semua::insert_data('digg',$data);
			echo $res;
			die();
		break;
		
		case 'edit' :
			$id			= $_REQUEST['id'];
			$select		= 'g.*,u.user_name as user_name';
			$table		= 'digg g join user u on g.user_id=u.user_id';
			$data		= semua::get_single_data($table,"digg_id=$id",$select);
			$do_next	= 'save_edit';
			include_once('digg/new.php');
			die();
		break;
		
		case 'save_edit' :
			$id			= $_REQUEST['id'];
			$data 		= $_POST['data'];
			$data[user_id] = $data[user_id][0];
			$res		= semua::update_data('digg',$data,"digg_id=$id");
			echo $res;
			die();
		break;
		
		case 'detail' :
			$id			= $_REQUEST['id'];
			$select		= 'g.*,u.user_name as user_name';
			$table		= 'digg g join user u on g.user_id=u.user_id';
			$data		= semua::get_single_data($table,"digg_id=$id",$select);
			$do_next	= '';
			include_once('digg/new.php');
			die();
		break;
		
		case 'active' :
			$id			= $_REQUEST['id'];
			$status		= $_REQUEST['status'];
			if ($status == 0) $status = 1;
			else if ($status == 1) $status = 0; 	
			$data ['digg_status'] 	= $status;
			$res			= semua::update_data('digg',$data,"digg_id=$id");
			$select		= 'g.*,u.user_name as user_name';
			$table		= 'digg g join user u on g.user_id=u.user_id';
			$data		= semua::get_data($table,1,$select);	
			$display 	= 'digg/list.php';
		break;
		
		case 'delete' :
			$id			= $_REQUEST['id'];
			$res			= semua::custom("delete from digg where digg_id=$id");
	
		default :
			$select		= 'g.*,u.user_name as user_name';
			$table		= 'digg g join user u on g.user_id=u.user_id';
			$data		= semua::get_data($table,1,$select);	
			$display 	= 'digg/list.php';
	}
?>