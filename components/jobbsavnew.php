<?php
if(isset($_SESSION['user'])){
	if(isset($_GET['oldal']) && $_GET['oldal']!=""){
		if($_GET['oldal']=="tarskeres" || $_GET['oldal']=="tarsprofil" || $_GET['oldal']=="tarsprofilszerk"){
			?>
			<div class="felh" style="margin:2px 0 0 0; width:230px; padding:2px 30px 0 30px;">
				Társkereső menü:
				
			</div>
			<div class="tovabbi">

			<ul>
				<li><a href="?oldal=tarskeres">Társkereső főoldal</a></li>
				<li><a href="?oldal=tarsprofil&amp;uid=<?php print $_SESSION['user'];?>">Társkereső profil</a></li>
				<li><a href="?oldal=tarsprofilszerk">Társkereső profil szerkesztés</a></li>
			</ul>
			</div>
			<?php
		}//ha létezik a user és társkereső
		elseif($_GET['oldal']=="apro" || $_GET['oldal']=="hirdetes" || $_GET['oldal']=="feladas" || $_GET['oldal']=="sajatapro"){
			?>
			<div class="felh" style="margin:2px 0 0 0; width:230px; padding:2px 30px 0 30px;">
				Apróhírdetés menü:
				
			</div>
			<div class="tovabbi">

			<ul>
				<li><a href="?oldal=apro">Hírdetés főoldal</a></li>
				<li><a href="?oldal=sajatapro">Saját hirdetések</a></li>
				<li><a href="?oldal=feladas">Hírdetés feladás</a></li>
			</ul>
			<?php
			include("apro/xmlhttp_lista.php");
			?>
			</div>
			<?php
		}//ha létezik a user és társkereső
		else {
	?>
<div class="felh" style="margin:2px 0 0 0; width:230px; padding:2px 30px 0 30px;">
Al menük:
</div>
<div class="tovabbi">
	<ul>
		<li><a href="?oldal=kozlemenyek">Közlemények</a></li>
		<li><a href="?oldal=wall">Észrevételek</a></li>
		<li><a href="?oldal=felhaszn">Saját fiók</a></li>
		<li><a href="?oldal=kukkolo">Kukkoló lista</a></li>
		<li><a href="?oldal=profilszerk">Profil szerkesztése</a></li>
		<li><a href="?oldal=usersettings">Chat beállítások</a></li>
		<li><a href="?oldal=settings">Személyes beállítások</a></li>
		<li><a href="felhasznalok/user_login_log.php">Saját belépések.</a></li>
	</ul>
</div>
	<?php
		
		}
	}
	
}// isset user
?>
<?php
if(isset($_SESSION['privat']) && $_SESSION['privat']!=""){
	require("components/smajli.php");
print '<div class="felh" style="margin:2px 0 0 0; width:230px; padding:2px 30px 0 30px;">';
print $_SESSION['privat'].' üzibox.';
print '</div>';
print '<div class="topsee" id="doboz1">';
include("uzenet/sendmsg.php");
		print '<form name="privi" method="post" action="">';
		print '<input type="submit" name="kilep" value="Kilép!">';
		print '</form>';
		if(isset($_POST['kilep'])){
			unset($_SESSION['privat']);
			print '<meta http-equiv="refresh" content="0;URL=\'index.php\'">';
		}
	$name=$_SESSION['privat'];
	$sql='select * from msg where cimzett="'.$_SESSION['user'].'" and kuldo="'.$name.'" and rang<3 and c_del!=1 or 
	(cimzett="'.$name.'" and kuldo="'.$_SESSION['user'].'" and rang<3 and k_del!=1)
	order by send_date desc limit 0,5';
	$query=mysql_query($sql);
	
		for($i=0;$i<mysql_num_rows($query);$i++){
	if(mysql_result($query,$i,'kuldo')==$_SESSION['user']) {
		if(mysql_result($query,$i,'status')==0){
			print '<p>';
			print 'Címzett: '.mysql_result($query,$i,'cimzett');
			print ' ('.date("m/d H:i",mysql_result($query,$i,'send_date')).')<br> ';
			print igazitas(alapsmajli(smajli(mysql_result($query,$i,'uzenet')))).'</p>';
			print '<hr>';
		}
		else {
			print '<p style="color:brown;">';
			print 'Olvasatlan: '.mysql_result($query,$i,'cimzett');
			print ' ('.date("m/d H:i",mysql_result($query,$i,'send_date')).')<br> ';
			print igazitas(alapsmajli(smajli(mysql_result($query,$i,'uzenet')))).'</p>';
			print '<hr>';
			
		}
	}
	else {
	
		if(mysql_result($query,$i,'rang')!=3 && 
			mysql_result($query,$i,'rang')!=4 && 
			mysql_result($query,$i,'rang')!=5){
			print '<p>';
			print 'Küldő: <a href="?oldal=userinfo&uid='.mysql_result($query,$i,'kuldo').'">'.mysql_result($query,$i,'kuldo').'</a> ';
			print ' ('.date("m/d H:i",mysql_result($query,$i,'send_date')).')<br> ';
			print igazitas(alapsmajli(smajli(mysql_result($query,$i,'uzenet')))).'<br></p>';
			print '<hr>';
		}
		else {
			print '<p>';
			if(mysql_result($query,$i,'rang')==3) $kuldo="Szoba op";
			elseif(mysql_result($query,$i,'rang')==4) $kuldo="Moderátor";
			elseif(mysql_result($query,$i,'rang')==5) $kuldo="Admin";
			print 'Küldő: <b>'.$kuldo.'</b> ';
			print ' ('.date("m/d H:i",mysql_result($query,$i,'send_date')).')<br> ';
			print igazitas(alapsmajli(smajli(mysql_result($query,$i,'uzenet')))).'</p>';
			print '<hr>';
		}
		print '<div class="clear"></div>';
	}//else
			// print '<hr>';
}
	
print '</div>';
}
?>
<div class="felh" style="margin:2px 0 0 0; width:230px; padding:2px 30px 0 30px;">
	További oldalaink:
	
</div>
<div class="tovabbi">
<?php
include("components/tovabbi.php");
?>
</div>
<div class="banner">
<?php
if(file_exists("images/banners/")){
		$mappau = "images/banners/";
$diru = opendir($mappau);
while (($nameu = readdir($diru)) !== false){
if (is_file($mappau."/".$nameu) && $nameu != "." && $nameu != ".." && $nameu != "thumb.db" && $nameu != "Thumbs.db" && $nameu !="thumbs"){
$kepek[]=$nameu;
 }//if
}//while
}
closedir($diru);
$banner=rand(0,count($kepek)-1);
print '<a href="http://atlantiszchat.hu"><img src="images/banners/'.$kepek[$banner].'" alt="atlantiszchat"></a>';
?>
</div>

<div class="topread">
	<div class="felh" style="margin:0; width:230px; padding:2px 30px 0 30px;" id="navigacio">
		Online users:
	</div>
	<div class="topsee" id="doboz1">
		<?php
		if(isset($_GET['szid'])){
			include("szoba/useronline.php");
		}
		else {
			include("szoba/online.php");
		}
		?>
	</div>
</div>
	<div class="felh" style="margin:15px 0 0 0; width:230px; padding:2px 30px 0 30px;">
		Napi jókedv:
	</div>
<div class="tovabbi">
		<?php
			include("szoba/viccbox.php");
		?>
	<a href="?oldal=viccek">Több vicc</a>
</div>