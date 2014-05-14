<?php

class Bootsrap {

    function __construct() {
        
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        //print_r($url);
        if(empty($url[0]))
        {
            include 'controllers/room_list.php';
            return false;
        }
        else
        {
            $file = 'controllers/' . $url[0] . '.php';
            if(file_exists($file)){
                include $file;
            }
        }
        
    }


}

