<?php

$host= "127.0.0.1";
$name= "root";
$pass= "Dana24082003!";
$db = "products";

$induction= mysqli_connect($host, $name, $pass, $db);

if ($induction==false){
    echo ("Ошибка соединения");
}

?>
