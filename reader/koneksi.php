<?php
session_start(); 
$conn = new mysqli('localhost','root','','u5864817_mitchell_db2');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>