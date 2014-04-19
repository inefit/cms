<?
	$do	= $_REQUEST ['do'];

	switch ($do) {
		case 'cari_ac':
			$tag 		= $_GET['tag'];
			$where	= "user_id like '%$tag%' or user_name like '%$tag%'";
			$data 		= semua::get_data('user',$where);
			for ($i=0;$i<count($data);$i++)
				$array[] = array(key => $data[$i]['user_id'] , value => $data[$i]['user_name'].' / '.$data[$i]['twitter_user'] );
			echo json_encode($array);
			die();
		break;
		
		case 'new' :
			$ar[1]		= ' checked="true" ';
			$do_next	= 'save_new';
			include_once('user/new.php');
			die();
		break;
		
		case 'save_new' :
			$data 	= $_POST['data'];
			$res		= semua::insert_data('user',$data);
			echo $res;
			die();
		break;
		
		case 'edit' :
			$id			= $_REQUEST['id'];
			$data		= semua::get_single_data('user',"user_id=$id");
			$do_next	= 'save_edit';
			$ar[$data['login_with']] = ' checked="true" ';
			include_once('user/new.php');
			die();
		break;
		
		case 'save_edit' :
			$id		= $_REQUEST['id'];
			$data 	= $_POST['data'];
			$res		= semua::update_data('user',$data,"user_id=$id");
			echo $res;
			die();
		break;
		
		case 'detail' :
			$id			= $_REQUEST['id'];
			$data		= semua::get_single_data('user',"user_id=$id");
			$do_next	= '';
			$ar[$data['login_with']] = ' checked="true" ';
			include_once('user/new.php');
			die();
		break;
		
		case 'delete' :
			$id			= $_REQUEST['id'];
			$res			= semua::custom("delete from user where user_id=$id");
			$data		= semua::get_data('user');	
			$display 	= 'user/list.php';
		break;
		
		default :
			$data		= semua::get_data('user');	
			$display 	= 'user/list.php';
	}
?>