<?php  
/** 
 * Created by PhpStorm. 
 * User: Ehtesham Mehmood 
 * Date: 11/21/2014 
 * Time: 2:46 AM 
 */  

function redirect($url) {
    header('Location: '.$url);
    die();
}


session_start();//session is a way to store information (in variables) to be used across multiple pages.  
session_destroy();  
redirect("login.html");
?> 