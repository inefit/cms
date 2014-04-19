<?
	$do 				= $_REQUEST ['do'];

	switch ($do) {
		case 'chpass' :
			$display 	= 'setting/password.php';
		break;
		case 'do_change' :
			$op			= md5('code['.$_REQUEST ['op'].']lab');
			$np			= md5('code['.$_REQUEST ['np'].']lab');
			$user		= $_SESSION ['user'];
			$where	= "user='$user' and pass='$op'";
			$data 	= semua::get_data('admin',$where);
			if (is_array($data)){
				$send['pass'] = $np;
				$where			= "user='$user'";
				$bool 			 	= semua::update_data('admin',$send,$where);
				if ($bool) echo '1';
			} else echo 0;
			die();
		break;
		case 'save_setting' :
			$data 	= $_POST['data'];
			$cek	= semua::get_single_data('settings');
			if (is_array($cek)){
				$res		= semua::update_data('settings',$data);
			} else {
				$res		= semua::insert_data('settings',$data);
			}
			echo $res;
			die();
		break;
		default :
			$data		= semua::get_single_data('settings');
			$display 	= 'setting/setting.php';
	}
?>