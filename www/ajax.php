<?php

include_once("a/m_ajax.php");
include_once('config.php');
 session_start();
 
if(IsPost()){
    
    $post = $_POST;
    
    switch ($post["request"])
    {
	case 'register':
                include_once 'a/a_register.php';
            break;
	case 'login':		
		include_once 'a/a_login.php';
                
            break;
	default:
		header("/");
    }
    request($post);
   
}
else{
    header("/");
}


