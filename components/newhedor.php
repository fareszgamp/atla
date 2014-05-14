<div class="headleft">
	<div class="headbannleftright">
	<a href="index.php"><img class="logok" src="images/logo.jpg" alt="atlantisz chat" title="atlantisz chat"></a>
	</div>
	<div class="headbannleft">
		<h1>Atlantisz Chat.</h1>
		A letünt város nyomán épülő új közösség.<br>
	</div>
</div>
<div class="headright">
	<div class="felsosavright">
	<?php
	if(isset($_SESSION['user']) && $_SESSION['user']!=""){
		$user=substr($_SESSION['user'],0,15);
		?>
		  <div class="container">
			<div class="dropdown">
			  <a href="index.html">Gépház</a>
			  <div>
				<ul>
				  <li><a href="?oldal=kozlemenyek">Közlemények!</a></li>
				  <li><a href="?oldal=wall">Észrevételek:</a></li>
				  <li><a href="?oldal=info">Információk</a></li>
				</ul>
			  </div>
			</div>
		  </div>
	 <?php } ?> 
	  <div class="container">
		<div class="dropdown">
			<?php
			if(isset($_SESSION['user']) && $_SESSION['user']!=""){
			$user=substr($_SESSION['user'],0,15);
			?>
		  <a href="?oldal=userinfo&uid=<?php print $_SESSION['user'];?>"><?php print $user;?></a>
		  <div>
			<ul>
			  <li><a href="?oldal=userinfo&uid=<?php print $_SESSION['user'];?>">Saját fiók</a></li>
			<?php
			if(isset($_SESSION['level']) && $_SESSION['level']==5){
			?>
			  <li><a href="?oldal=admin">Admin</a></li>
			<?php
			}
			?>
			  <li><a href="?oldal=baratlista">Ismerősök</a></li>
			  <li><a href="?oldal=usersettings">Chat beállítás</a></li>
			  <li><a href="conponents/logout.php">Kilépés</a></li>
			</ul>
		  </div>
		  <?php }else {?>
		  <a href="?oldal=login">Belépés</a>
		  <div>
			<ul>
			  <li><a href="?oldal=login">Belépés</a></li>
			  <li><a href="?oldal=regiszt">Regisztráció</a></li>
			</ul>
		  </div>
		  
		  <?php }?>
		</div>
	  </div>
	</div>
</div>
<div class="clear"></div>
			<?php
			if(isset($_SESSION['user']) && $_SESSION['user']!=""){
				include("conponents/newkatmenu.php");
				}
			?>