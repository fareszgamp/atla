<?php
function cim (){
	if(isset($_GET['oldal']) && isset($_SESSION['user'])) {
	require("functions.php");
			$sqlin='select count(id) from msg where cimzett="'.$_SESSION['user'].'" and c_del=0';
			$queryin=mysql_query($sqlin);
			$countin=mysql_result($queryin,0);
			$sqlout='select count(id) from msg where kuldo="'.$_SESSION['user'].'" and k_del=0';
			$queryout=mysql_query($sqlout);
			$countout=mysql_result($queryout,0);
		$oldal=$_GET['oldal'];
		if($oldal=="topic"){
			$tid=$_GET['tid'];
			$sqlt = 'select * from topicok where id=' . $tid . '';
			$queryt = mysql_query($sqlt);
		if(strlen(mysql_result($queryt,0,'topic'))>50) $pont="...";
		else $pont="";
			$topic=szavakrovid(mysql_result($queryt,0,'topic')).$pont;
		}
	if(isset($_GET['szid'])){
	$szid=$_GET['szid'];
	$sql2='select szoba_nev from szobak where id='.$szid.'';
	$query2=mysql_query($sql2);
	}
	if(isset($_GET['uid'])) $uid=$_GET['uid'];
	if(isset($_GET['name'])) $name=$_GET['name'];
	if(isset($_GET['nick'])) $nick=$_GET['nick'];
					// require("conponents/dbconfig.php");
					// mysql_query("character_set_connection 'utf-8'");
		switch ($oldal){
			case "loginszoba":$cim="Belépés a ".mysql_result($query2,0,0).' szobába:';break;
			case "szobalista":$cim="Atlantisz szobái:";break;
			case "aktiv":$cim="Megynyitott szobák:";break;
			case "adminszoba":$cim="Admin szoba:";break;
			case "createszoba":$cim="Szoba létrehozása:";break;
			case "kukkolo":$cim="Kukkoló lista:";break;
			case "admin":$cim="Admin oldal:";break;
			case "ajanlo":$cim="Oldal ajánló:";break;
			case "ajanloform":$cim="Oldal ajánlás:";break;
			case "album":$cim="$nick fényképalbuma:";break;
			case "fegyelmi":$cim="Fegyelmi lista:";break;
			case "felhaszn":$cim='<a href="?oldal=felhaszn">'.ucwords($_SESSION['user']).'</a>  <a href="conponents/logout.php">      [kilépés] </a>';break;
			case "online":$cim="Online felhasználók";break;
			case "kozlemeny":$cim="Rendszer közlemények:";break;
			case "szoba":$cim='<a href="?oldal=szobainfo&amp;szid='.$szid.'"><u>Szobainfo.</u></a> | 
								<a href="szoba/logoutszoba.php?szid='.$szid.'"><u>( X )</u></a> | 
								<a href="?oldal=szobaform&amp;szid='.$szid.'"><u>Hozzászól</u></a>';break;
			case "wall":$cim="Üzenőfal";break;
			// case "hozzaszol":include("szoba/hozzaszol.php");break;
			case "szobainfo":$cim="Szoba info:";break;
			case "settings":$cim='Felhasználói adatok megváltoztatása: '.ucwords($_SESSION['user']);break;
			case "usersettings":$cim='Chat beállítások: '.ucwords($_SESSION['user']);break;
			case "userinfo":$cim=$uid.' info:';break;
			case "baratlista":$cim="Barátlisa:";break;
			case "viccek":$cim="Napi jókedv:";break;
			case "vicciras":$cim="Vicc beküldése:";break;
			case "uzenet":$cim='Üzenetek | 
								<a href="?oldal=uzibox">Üzibox</a> | 
								<a href="?oldal=sendmesage">Üzenet írás</a> | 
								<a href="?oldal=kimeno">Kimenő ('.$countout.')</a> | 
								<a href="?oldal=bejovo">Bejövő ('.$countin.')</a> | 
								<a href="?oldal=uzenetkezel">Kezelés</a>';break;
			case "sendmesage":$cim='<a href="?oldal=uzibox">Üzibox</a> | <a href="?oldal=sendmesage">Üzenet írás</a> | 
								<a href="?oldal=kimeno">Kimenő ('.$countout.')</a> | 
								<a href="?oldal=bejovo">Bejövő ('.$countin.')</a> | 
								<a href="?oldal=uzenetkezel">Kezelés</a>';break;
			case "uzibox":$cim='Üzibox | 
								<a href="?oldal=sendmesage">Üzenet írás</a> | 
								<a href="?oldal=kimeno">Kimenő ('.$countout.')</a> | 
								<a href="?oldal=bejovo">Bejövő ('.$countin.')</a> | 
								<a href="?oldal=uzenetkezel">Kezelés</a>';break;
			case "kimeno":$cim='<a href="?oldal=uzibox">Üzibox</a> | 
								<a href="?oldal=sendmesage">Üzenet írás</a> | 
								<a href="?oldal=kimeno">Kimenő ('.$countout.')</a> | 
								<a href="?oldal=bejovo">Bejövő ('.$countin.')</a> | 
								<a href="?oldal=uzenetkezel">Kezelés</a>';break;
			case "bejovo":$cim='<a href="?oldal=uzibox">Üzibox</a> | <a href="?oldal=sendmesage">Üzenet írás</a> | 
								<a href="?oldal=kimeno">Kimenő ('.$countout.')</a> | 
								<a href="?oldal=bejovo">Bejövő ('.$countin.')</a> | 
								<a href="?oldal=uzenetkezel">Kezelés</a>';break;
			case "uzenetkezel":$cim='<a href="?oldal=uzibox">Üzibox</a> | <a href="?oldal=sendmesage">Üzenet írás</a> | 
								<a href="?oldal=kimeno">Kimenő ('.$countout.')</a> | 
								<a href="?oldal=bejovo">Bejövő ('.$countin.')</a> | 
								<a href="?oldal=uzenetkezel">Kezelés</a>';break;
			case "blog":$cim=ucwords($name).' Atlablogja:';break;
			case "atlablog":$cim="Atlablog:";break;
			case "sendblog":$cim="Atlabloggolás:";break;
			case "fal":$cim="Atlantisz Chat szoba:";break;
			case "falform":$cim="Atlantisz chat szoba:";break;
			case "forum":$cim="Atlantisz fórum:";break;
			case "forum":$cim="Atlantisz fórum:";break;
			case "topic":$cim="Atlantisz fórum: $topic , topic:";break;
			case "toptemak":$cim="Atlantisz fórum TopTémák:";break;
			case "kedvencek":$cim="Atlantisz fórum Kedvencek:";break;
			default:$cim=$_GET['oldal'];break;
		}//switch
	}//isset oldal
	else {
		$cim="Főoldal";
	}
return ($cim);
}


?>