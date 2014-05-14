<?php
if(isset($_GET['oldal']) && $_GET['oldal']=="userinfo" && $_GET['uid']==$_SESSION['user']){
print 'Személyes menü:<br>';
print '<ul>';
print '<li><a href="?oldal=kukkolo">Kukkoló lista</a></li>';
print '<li><a href="?oldal=profilszerk">Profil szerkesztése</a></li>';
print '<li><a href="?oldal=felhaszn">Saját fiók</a></li>';
print '<li><a href="?oldal=usersettings">Chat beállítások</a></li>';
print '<li><a href="?oldal=settings">Személyes beállítások</a></li>';
print '<li><a href="felhasznalok/user_login_log.php?nick='.$_SESSION['user'].'">Saját belépések.</a></li>';
if($_SESSION['level']==5){
print '<li><a href="?oldal=admin">Admin oldal</a></li>';
print '<li><a href="?oldal=adminszoba">Admin szoba</a></li>';
}
print '</ul>';
}
else {
$sql='select count(*) from szemelyes where status="1"';
$query=mysql_query($sql);
$online=mysql_result($query,0,0);
$sqlf='select count(id) from freeuser';
$queryf=mysql_query($sqlf);
$fal=mysql_result($queryf,0,0);
?>
<ul>
	<li><a href="?oldal=login">Belépés</a></li>
	<li><a href="?oldal=fal">Nyilt szoba<?php if($fal>0) print '('.$fal.')'; else print '(0)';?></a></li>
	<li><a href="http://mobil.atlantiszchat.hu">Mobil oldalunk</a></li>
	<li><a href="http://wap.atlantiszchat.hu">Wap oldalunk</a></li>
	<li><a href="https://www.facebook.com/atlantiszchat">Facebook oldalunk</a></li>
	<li><a href="?oldal=online">Online <?php if($online>0) print '('.$online.')'; else print '(0)';?></a></li>
	<li><a href="?oldal=tarskeres">Társkereső</a></li>
	<li><a href="?oldal=apro">Apróhirdetés</a></li>
	<li><a href="?oldal=szabaly">Szabályzat</a></li>
</ul>
<?php
}
?>