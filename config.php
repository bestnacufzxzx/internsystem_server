<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
// header('Content-Type: text/html; charset=utf-8');


$db_username = 'root';
$db_password = '';
$db_name = 'personal';
$db_host = 'localhost';				
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);
mysqli_set_charset($mysqli, "utf8");

if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
$config['thekey']='ValarMorghulis!';
?>