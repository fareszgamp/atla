<div class="menu">
	<ul>
	<?php
// require("../conponents/dbconfig.php");
mysql_query("character_set_connection 'utf-8'");
	$sql='select * from szoba_online where user="'.$_SESSION['user'].'" limit 1';
	$query=mysql_query($sql);
	if(mysql_query($sql) && mysql_num_rows($query)!=0){
	$room=mysql_result($query,0,'szoba_nev');
	$roomId=mysql_result($query,0,'szoba_id');
	}
	else
	{
		$room="Szobák";
		$roomId=NULL;
	}
	
//----------------------------szobák----------------------------------
		
		?>
		<li><a href="?oldal=szobalista">Chat</a>
			<ul><?php if($roomId) {?>
				<li><a href="?oldal=szoba&amp;szid=<?php print $roomId;?>"><?php print $room;?></a></li>
				<?php } else {?>
				<li><a href="?oldal=szobalista">Szobák</a></li>
				<?php }?>
				<li><a href="?oldal=szobalista">Szobák</a></li>
			</ul>
		</li>
		<?php
		
//-----------------------------fórumok---------------------------------------
		
		?>
		<li><a href="?oldal=forum">Fórum</a>
			<ul>
				<li><a href="?oldal=toptemak">Top témák</a></li>
				<li><a href="?oldal=kedvencek">Kedvencek</a></li>
				<li><a href="?oldal=topickereso">Kereső</a></li>
			</ul>
		</li>
		<?php
		
//------------------------------saját fiók-------------------------------------		
		
		?>
		<li><a href="?oldal=atlablog&name=<?php print $_SESSION['user'];?>">Atlablog</a>
			<ul>
				<li><a href="?oldal=blog&lap=blog&name=<?php print $_SESSION['user'];?>">Blogom</a></li>
				<li><a href="?oldal=sendblog">Blog írás</a></li>
				<li><a href="?oldal=blog&lap=friss">Új blogok</a></li>
			</ul>
		</li>
		<?php
		
//-------------------------------üzenetek----------------------------------------
	

$sql1='select count(id) from msg where cimzett="'.$_SESSION['user'].'" and status="1"';
	$query1=mysql_query($sql1);
			$sqlin='select count(id) from msg where cimzett="'.$_SESSION['user'].'" and c_del!=1';
			$queryin=mysql_query($sqlin);
			$countin=mysql_result($queryin,0);
			$sqlout='select count(id) from msg where kuldo="'.$_SESSION['user'].'" and k_del!=1';
			$queryout=mysql_query($sqlout);
			$countout=mysql_result($queryout,0);
			if($countin>=90) $inc="red";
			else $inc="white";
			if($countout>=90) $outc="red";
			else $outc="white";
	if(mysql_query($sql1) && mysql_num_rows($query1)>=1)
	{
		$uzi=mysql_result($query1,0,0);
	}
	else
	{
		$uzi=false;
	}
	$uzi ? $color="red" : $color="white";
	?>
	<li><a href="?oldal=uzibox">Üzenetek <?php if($uzi==true){?><span style="background-color:<?php print $color;?>"><?php print $uzi;?></span><?php }?></a>
			<ul>
				<li><a href="?oldal=bejovo">Bejövő <span style="color:<?php print $inc;?>">(<?php print $countin;?>)</span></a></li>
				<li><a href="?oldal=kimeno">Kimenő <span style="color:<?php print $outc;?>">(<?php print $countout;?>)</span></a></li>
				<li><a href="?oldal=sendmesage">Küldés</a></li>
				<li><a href="?oldal=uzenetkezel">Kezelő</a></li>
			</ul>
	</li>
	<?php
//----------------------------------------------online---------------------------------------------------
$sql='select * from szemelyes where status="1"';
$query=mysql_query($sql);
$online=mysql_num_rows($query);
if($_SESSION['level']==5){
$sql33='select * from figyelt_user where figyelo="'.$_SESSION['user'].'" and nick IN (select nick from szemelyes where status="1")';
$query33=mysql_query($sql33);
if(mysql_query($sql33) && mysql_num_rows($query33)>=1) {
$figyeltek=mysql_num_rows($query33);
}
else {
$figyeltek=0;
}
?>
<li><a href="?oldal=online">Online( <?php print $online.' | '.$figyeltek; ?> )</a></li>
<?php
}
else {
?>
		<li><a href="?oldal=online">Online( <?php print $online; ?> )</a></li>
<?php
}
?>

		<li><a href="?oldal=extra">Extrák</a>
			<ul>
				<li><a href="?oldal=viccek">Viccek:</a></li>
				<li><a href="?oldal=jatekok">Játékok:</a></li>
				<li><a href="?oldal=album&amp;nick=<?php print $_SESSION['user'];?>">Képalbum:</a></li>
				<li><a href="?oldal=tarskeres">Társkereső:</a></li>
				<li><a href="?oldal=ajanlo">Oldalajánló</a></li>
				<li><a href="?oldal=hirek">Origo Hírek:</a></li>
				<li><a href="?oldal=idojaras">Időjárás:</a></li>
			</ul>
		</li>
		
	</ul>
</div>