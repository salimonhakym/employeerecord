<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'new_dash';

$conn = new mysqli($host, $username, $password, $dbname);

if($conn->connect_error){
    die('Connection failed: '.$conn->connect_error);
}
    define('ROOT_PATH', realpath(dirname(__FILE__)));
    define('INCLUDE_PATH', realpath(dirname(__FILE__)) .'/includes');
    session_start();
?>