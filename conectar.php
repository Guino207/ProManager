<?php
$host = "localhost";
$db_name = "Manager";
$user = "root";
$password = "mysql123";

$manager = new mysqli($host, $db_name, $user, $password);

if($manager->connect_error){
    die("Erro na conexion " . $manager->connect_error);
}else{
    echo "";
}



error_reporting(E_ALL);
ini_set('display_errors', 1);