<?php
	// if(!isset($_SESSION['logged'])){
?>
<h3>Atlantisz chat belépés:</h3>
<div class="login">
A chat-et csak <a href="?oldal=regiszt">Regisztráció</a> után lehet használni!!!<br>
<form name="login" method="post" action="login/login_work.php">
	&nbsp;<br>
	<input type="text" name="email" placeholder="E-mail cím" required><br>
		&nbsp;<br>
		<input type="password" name="passwd" placeholder="Jelszó" required><br>
	&nbsp;<br>
		<input type="submit" name="sub" value="Belépés">
		<input type="submit" name="seclog" value="Jelszó emlékeztető">
</form><br>
<a href="?oldal=regiszt">Regisztráció</a>
</div>
<?php
// }//státusz vizsgálat vége
// else {
	// print 'Belépve: <a href="?oldal=felhaszn">'.ucwords($_SESSION['user']).'</a><br>   ';
	// print '<a href="conponents/logout.php">      [kilépés] </a><br>';
	// if($_SESSION['level']==5){
	// print '<a href="?oldal=admin">Admin oldal.</a><br>';

	
	
	// }
	// print 'Aktív szobák:<br>';
	// include("szoba/aktiv.php");
// }
?>