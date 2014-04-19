<?php

include_once '../lib/config.php';
include_once '../models/function.php';

session_start();
if (!$_SESSION['logged']){
	$act = $_REQUEST ['act'];

	switch ($act) {
		case 'do_login' :
			$user = $_POST['user'];
			$pass = md5($_POST['pass']);
			$where = "lower(username) = lower('$user') and password = '$pass'";
			$data = semua::get_single_data('admin',$where);
			if (is_array($data)){
				$_SESSION['user'] 	= $data['user'];
				$_SESSION['logged'] = true;
				$_SESSION['admin'] = true;
				header('Location: index.php') ;
				die();
			} else {
				$error = 1;
			}
		break;
		default :
			$error = '';
	}

	include_once "login.php";
}
else{
	$act 	= $_REQUEST ['act'];
	$ajax 	= $_REQUEST ['ajax'];
	$index = $act.'/index.php';

	if ($act=='logout'){
		unset($_SESSION ['logged']);
		unset($_SESSION ['admin']);
		unset($_SESSION ['user']);
		header('Location: index.php') ;
		die();
	}

	if (file_exists($index)) 
		include_once $index;
	else
		$display = 'views/body.php';

	if ($ajax){
		$mode 	= 'ajax';
		include_once "$display";
		die();
	}
		
	include_once "views/header.php";
	include_once "views/menu.php";
	include_once "$display";
	include_once "views/footer.php";
}
?>
