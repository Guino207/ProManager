<?php
$host = "localhost";
$db_name = "ManaGer";
$user = "root";
$password = "Mysql123";

$mn = new mysqli($host, $db_name, $user, $password);

if($mn->connect_error()){
    die("Erro na conexion " . $mn->connect_error);
}else{
    echo "";
}



error_reporting(E_ALL);
ini_set('display_errors', 1);