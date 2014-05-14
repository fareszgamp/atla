<?php

	include('models/room_modell.php');										//szoba modell
	
        if(isset($url['1'])){
            $szid = clearText($url['1']);								//megtisztítja a get tömböt
            $id = issetRoom($szid);	
        										//ha létezik a szoba akkor $id=1 ha nem akkor $id=0
	if($id!=0){
		if(isset($url['2'])) $page = clearText($url['2']);
		else $page = 1;
		$pages = pager($szid);										//lapozáshoz szükséges számok
		$limits = offset($szid,$page);								//lapozáshoz szükséges offset és limit
		$roomContent = room_content($szid,$limits['offset']);		//offset és limit alapján a megadott szoba tartalma
		
		include('views/room/room_view.php');									//szoba megjelenítése
		
	}else print 'Nincs ilyen szoba';
        } else print 'Nincs megadva szobaszám!';
