<?php 
session_start();
//database.php
include 'connect.php';

$connect_database = mysqli_connect($server, $username, $password, $database);
if(!mysqli_connect($server, $username, $password))
{
	exit('Error: could not establish database connection');
}

$conn = new PDO("mysql:host=localhost;dbname=forum_v2", 'genesis', 'genesis');

//mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);

?>