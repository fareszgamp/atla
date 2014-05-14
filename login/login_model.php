<?php
include('../components/mydbal_db.php');


    function validUserLogin ($email,$passwd){
        $mydb = new myDBC();
        $sql="select email, passwd from szemelyes where email=? and passwd=?";
        $par = array($email,$passwd);
        $type = array('s','s');
        $tomb = array("sql"=>$sql,"type"=>$type,"param"=>$par);
        if($mydb->rowsCounter($tomb) == 1)
        {
            $id=1;
        }
        else $id=0;
        return $id;
    }

    function issetUser ($user){
        $mydb = new myDBC();
        $sql="select id from szemelyes where nick = ?";
        $par = array($user);
        $type = array('s');
        $tomb = array("sql"=>$sql,"type"=>$type,"param"=>$par);
        if($mydb->rowsCount($tomb)!=0)
        {
            $id=1;
        }
        else $id=0;
        return $id;
    }
    function getUser ($email){
        $mydb = new myDBC();
        $sql="select nick from szemelyes where email = ?";
        $par = array($email);
        $type = array('s');
        $tomb = array("sql"=>$sql,"type"=>$type,"param"=>$par);
        return $mydb->resultArray($tomb);
        
    }

	/*insertLoginUser

	*/
	function updateLoginUser($date,$email){
	$mydb = new myDBC();
		$sql = "update szemelyes set lost_date=?, status=1 where email=?";
		$par = array($date,$email);
		$type = array('i','s');
		$tomb = array("sql"=>$sql,"type"=>$type,"param"=>$par);
		if($mydb->runQuery($tomb))
                {
                    $id=1;
                    $nick = getUser($email)[0]['nick'];
		}
                else $id=0;
		return $nick;
	}
	
	function filter( $data ){
	$mydb = new myDBC();
		if( !is_array( $data ) )
		{
			$data = $mydb->mysqli->real_escape_string( $data );
			$data = trim( htmlentities( $data, ENT_QUOTES, 'UTF-8', false ) );
			$data = strip_tags($data,"<br>");
		}
		else
		{
			//Self call function to sanitize array data
			$data = array_map( array( $mydb, 'filter' ), $data );
		}
		return $data;
	}
	
	function clean( $data ){
		$data = stripslashes( $data );
		$data = html_entity_decode( $data, ENT_QUOTES, 'UTF-8' );
		$data = nl2br( $data );
		$data = urldecode( $data );
		return $data;
	}
	
	/*clearText:$text
	*trimmelem
	*entity_decode-olom ha jól értem akkor utf-8-nak megfelelőre
	*a\r\n beviteleket str_replace-vel <br> rel helyettesítem
	*nl2br
	*A html_entity_decode által visszaalakított stringben megtralálja a nem <br> tag-eket és szűri
	*real_escape_string
	*/
	function clearText ($text){
	$mydb = new myDBC();
		$text = trim($text);
		$text = html_entity_decode($text, ENT_QUOTES, 'UTF-8');
		$text = str_replace(array("\r\n", "\r", "\n"), "<br>", $text);
		$text = nl2br($text);
		$text = strip_tags($text,"<br>");
		return $mydb->mysqli->real_escape_string($text);
	}


?>