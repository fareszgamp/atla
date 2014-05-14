<?php

	include('models/room_modell.php');
	if(isset($url['1'])){
	$szid = clearText($url['1']);
	$id = issetRoom($szid);
        }
	if($id!=0){
		
		include('views/room/room_form_view.php');
		
	}
        else print 'Nincs ilyen szoba';
