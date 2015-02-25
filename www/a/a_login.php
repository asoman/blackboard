<?php


function request($data){
   
   $mUsers = M_Users::Instance();
   
   if($mUsers->Login($data['mail'], $data['password'], $data['remember']))
        echo "OK";
   else
        echo"NONONONO";            
                     
                            
                  
}

