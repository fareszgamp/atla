<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
require'config/paths.php';
if(isset($_GET['oldal'])){
	if($_GET['oldal']=="tarskeres" || $_GET['oldal']=="tarsprofil" || $_GET['oldal']=="tarsprofilszerk"){
		print '<title>Atlantisz Chat társkereső</title>';
	}
	elseif($_GET['oldal']=="vicc"){
		print '<title>Atlantisz Chat Viccek</title>';
	}
	elseif($_GET['oldal']=="apro"){
		print '<title>Atlantisz Chat Apró</title>';
	}
	else{
		print '<title>Atlantisz Chat</title>';
	}
}
else{
	print '<title>Atlantisz Chat</title>';
}
?>
	<meta name="keywords" lang="hu" content="atlantisz, chat, cset, beszélgetés, ismerkedés, közösség, társkeresés, társkereső, ingyenes">
	<meta name="description" lang="hu" content="A hely ahol ismerkedhetsz, barátokat szerezhetsz, beszélgethetsz.">
	<meta name="robots" content="index,follow"> 
		<?php
		if(isset($korhatar)){
		if($korhatar==1) $style="stylezold.css";
		elseif($korhatar==2) $style="styleszurke.css";
		elseif($korhatar==3) $style="style.css";
		elseif($korhatar==4) $style="stylekek.css";
		elseif($korhatar==0) $style="style.css";
		}
		elseif(!isset($korhatar)) $style="stylekek.css";
		//print '<link rel="stylesheet" href="css/newstyle.css" type="text/css" media="all">';
		?>
	<link rel="stylesheet" href="<?php print URL;?>css/newstyle.css" type="text/css" media="all">
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	<link rel="shortcut icon" href="images/favicon.ico">
	<?php 
	if(isset($_GET['szid']) && $_GET['oldal']=="szoba"){
		$szid=$_GET['szid'];
		if($refresh!=0){
			print '<meta http-equiv="refresh" content="'.$refresh.'">';
		}
	}
	if(isset($_GET['oldal']) && $_GET['oldal']=="album" || isset($_GET['oldal']) && $_GET['oldal']=="szoba" && $_GET['szid']==21){
	?>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
	<script>
		!window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
	</script>
	<script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.4.css" media="screen">
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			*   Examples - images
			*/

			$("a#example1").fancybox();

			$("a#example2").fancybox({
				'overlayShow'	: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic'
			});

			$("a#example3").fancybox({
				'transitionIn'	: 'none',
				'transitionOut'	: 'none'	
			});

			$("a#example4").fancybox({
				'opacity'		: true,
				'overlayShow'	: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'none'
			});

			$("a#example5").fancybox();

			$("a#example6").fancybox({
				'titlePosition'		: 'outside',
				'overlayColor'		: '#000',
				'overlayOpacity'	: 0.9
			});

			$("a#example7").fancybox({
				'titlePosition'	: 'inside'
			});

			$("a#example8").fancybox({
				'titlePosition'	: 'over'
			});

			$("a[rel=example_group]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});

			/*
			*   Examples - various
			*/

			$("#various1").fancybox({
				'titlePosition'		: 'inside',
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});

			$("#various2").fancybox();

			$("#various3").fancybox({
				'width'				: '75%',
				'height'			: '75%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});

			$("#various4").fancybox({
				'padding'			: 0,
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});
		});
	</script>
	<?php
	}//oldal=album.
	?>
	<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-45534184-1']);
  _gaq.push(['_setDomainName', 'atlantiszchat.hu']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body>
<div class="content">
<!-- fejléc -->
	<div class="head">
		<?php include("components/newhedor.php"); ?>
	</div>
<!-- fejléc vége -->
<!-- tartalom -->
	<div class="tartalom">
		<!-- fő tartalom-->
			<div id="kozep">
<?php
require("components/cim.php");
// require("components/dbbase.php");
mysql_query("character_set_connection 'utf-8'");
	print '<div class="cimsav">'.cim().'</div>';
	print '<div class="reg">';


// ----------------------Ha létezik a session user--------------------------------------------

//--------------------------------------reg div tartalma------------------------------------------
    require 'libs/Bootstrap.php';


$app = new Bootsrap();
//-------------------------------------------------reg div tartalom vége---------------------------



?>
            
			</div>
		</div>
		<!--fő tartalom vége-->
	<!--banners-->
			<div id="banners">
			<?php
				include("components/jobbsavnew.php");
			?>
			</div>
	<!-- banners end-->
	</div>
<!-- tartalom vége -->
<!-- footer -->
		<div id="footer">
			<div class="left">
			&copy; Copyright 2013 <a href="#">Atlantisz chat</a><br>
			<a href="http://atlantiszchat.hu"><img src="http://atlantiszchat.hu/images/atlantiszchat4.gif" alt="gowihost.org"></a>
			</div>
			<div class="right">
			Szerkeszti: <a href="http://faresz-web.hu">faresz-WEB</a>
			</div>
		</div>
<!--footer end-->
</div>
		
</body>
</html>