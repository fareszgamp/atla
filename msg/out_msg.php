<?php
$user = "faresz";

	include('msg_model.php');
	

	$id = issetOutMsg($user);
	if($id!=0){
		if(isset($_GET['page'])) $page = clearText($_GET['page']);
		else $page = 1;
        $where = 'kuldo = ? and k_del!=1';
		$pages = pager($user,$where);
		$limits = offset($user,$page,$where);
		$roomContent = msg_content($user,$limits['offset'],$where);
		
		include('out_msg_view.php');
		
	}else print 'Nincs ilyen szoba';
