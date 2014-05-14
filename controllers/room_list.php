<?php
include('models/room_modell.php');

	$openRoom = roomsOpen();
	$closedRoom = roomsClosed();
	$tempRoom = roomsTemp();
	
include('views/room/room_list_view.php');
