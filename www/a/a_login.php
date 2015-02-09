<?php


function request($data){
    
   if($mUsers->Login($data['mail'], $data['password'], isset($data['remember'])))
        echo "OK";
    else
        echo"NONONONO";            
                     
                            
                        
}

