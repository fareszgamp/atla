<?php
if(isset($_POST['sub'])){

	include('msg_model.php');
	$senduser = "faresz";

	$id=NULL;
    $rang = 2;
    $kuldo = clean($senduser);
	$cimzett = clean($_POST['cimzett']);
    $date = strtotime('now');
    $msg = clearText($_POST['uzenet']);
	$status = 1;
	$cdel = 0;
	$kdel = 0;

    $emp = issetUser ($cimzett);
	if($emp !=0 && $msg!=""){
        $insert = insertMsg($id,$rang,$kuldo,$cimzett,$date,$msg,$status,$cdel,$kdel);
        if($insert==1){
            header("location: out_msg.php");
        }else print "Sikertelen bevitel";
    }
    else
    {
        header("location: msg_form.php");
    }
}