<?php

include_once("m_ajax.php");
include_once('./config.php');

if(IsPost()){
    
    $post = $_POST;
    
    switch ($post["request"])
    {
	case 'register':
                include_once 'a_register.php';
            break;
	case 'login':		
		include_once 'a_register.php';
                
            break;
	default:
		header("/");
    }
    request($post);
   
}
else{
    header("/");
}


