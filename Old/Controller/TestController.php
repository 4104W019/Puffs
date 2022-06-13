<?php

$method = $_SERVER['REQUEST_METHOD'];

$id = "";
if(!empty($_GET["id"])){
    $id = $_GET["id"];
}

switch($method){
 
    case "GET":
        echo $method.$id;
        break;
        
    case "POST":
        echo $method.$id;
        break;
 
    case "PUT":
        echo $method.$id;
        break;

    case "DELETE":
        echo $method.$id;
        break; 
}

?> 