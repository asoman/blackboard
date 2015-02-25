<?php



function request($data){
    $mUsers = M_Users::Instance();
    if($mUsers->Register($data['mail'], $data['password']))
        echo 0;
    else
        echo"Failed to register";   
}