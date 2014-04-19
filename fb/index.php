<?
	$do 				= $_REQUEST ['do'];

	switch ($do) {
		case 'new' :
			$do_next	= 'save_new';
			include_once('fb/new.php');
			die();
		break;
		
		case 'save_new' :
			$data 	= $_POST['data'];
			$data[user_id] = $data[user_id][0]; 
			$res		= semua::insert_data('fb_page',$data);
			echo $res;
			die();
		break;
		
		case 'edit' :
			$id			= $_REQUEST['id'];
			$select		= 'f.*,u.user_name as user_name';
			$table		= 'fb_page f join user u on f.user_id=u.user_id';
			$data		= semua::get_single_data($table,"fb_page_id=$id",$select);
			$do_next	= 'save_edit';
			include_once('fb/new.php');
			die();
		break;
		
		case 'save_edit' :
			$id			= $_REQUEST['id'];
			$data 		= $_POST['data'];
			$data[user_id] = $data[user_id][0];
			$res			= semua::update_data('fb_page',$data,"fb_page_id=$id");
			echo $res;
			die();
		break;
		
		case 'active' :
			$id			= $_REQUEST['id'];
			$status		= $_REQUEST['status'];
			if ($status == 0) $status = 1;
			else if ($status == 1) $status = 0; 	
			$data ['fb_status'] 	= $status;
			$res			= semua::update_data('fb_page',$data,"fb_page_id=$id");
			$select		= 'f.*,u.user_name as user_name';
			$table		= 'fb_page f join user u on f.user_id=u.user_id';
			$data		= semua::get_data($table,1,$select);	
			$display 	= 'fb/list.php';
		break;
		
		case 'detail' :
			$id			= $_REQUEST['id'];
			$select		= 'f.*,u.user_name as user_name';
			$table		= 'fb_page f join user u on f.user_id=u.user_id';
			$data		= semua::get_single_data($table,"fb_page_id=$id",$select);
			$do_next	= '';
			include_once('fb/new.php');
			die();
		break;
		
		case 'delete' :
			$id			= $_REQUEST['id'];
			$res			= semua::custom("delete from gplus where fb_page_id=$id");
	
		default :
			$select		= 'f.*,u.user_name as user_name';
			$table		= 'fb_page f join user u on f.user_id=u.user_id';
			$data		= semua::get_data($table,1,$select);	
			$display 	= 'fb/list.php';
	}
?>