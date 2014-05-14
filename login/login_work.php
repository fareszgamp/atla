<?php
session_start();
if(isset($_POST['sub'])){

	include('login_model.php');
	
	$id=NULL;
        $email = clearText($_POST['email']);
        $passwd = MD5($_POST['passwd']);
	$date = strtotime('now');

    $valid = validUserLogin($email,$passwd);
    if ($valid == 1)
    {
        $update = updateLoginUser($date,$email);
        $_SESSION['login']=$update;
        
        print $_SESSION['login'];
    }
    else $_SESSION['login']=false;
}