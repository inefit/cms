<?
	$do 				= $_REQUEST ['do'];

	switch ($do) {
		case 'new' :
			$do_next	= 'save_new';
			include_once('page/new.php');
			die();
		break;
		
		case 'save_new' :
			$data 	= $_POST['data'];
			$res		= semua::insert_data('page',$data);
			echo $res;
			die();
		break;
		
		case 'edit' :
			$id			= $_REQUEST['id'];
			$data		= semua::get_single_data('page',"page_id=$id");
			$do_next	= 'save_edit';
			include_once('page/new.php');
			die();
		break;
		
		case 'save_edit' :
			$id		= $_REQUEST['id'];
			$data 	= $_POST['data'];
			$res		= semua::update_data('page',$data,"page_id=$id");
			echo $res;
			die();
		break;
		
		case 'detail' :
			$id			= $_REQUEST['id'];
			$data		= semua::get_single_data('page',"page_id=$id");
			$do_next	= '';
			include_once('page/new.php');
			die();
		break;
		
		case 'delete' :
			$id			= $_REQUEST['id'];
			$res			= semua::custom("delete from page where page_id=$id");
			$data		= semua::get_data('page');	
			$display 	= 'page/list.php';
		break;
		
		default :
			$data		= semua::get_data('page');	
			$display 	= 'page/list.php';
	}
?>