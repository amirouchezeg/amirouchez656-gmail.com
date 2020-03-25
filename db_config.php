<?php
$login = "root";
$password = "Secret**!23sdl";
$host = "localhost";
$db = "gouvernance";

$db = new PDO("mysql:dbname=$db;host=$host", $login, $password ); 

$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$db->query("SET NAMES utf8");

  
?>
