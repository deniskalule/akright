<?php

session_start()
include('includes/connection.php');

if(!isset($_SESSION['client']) || trim($_SESSION['client']) =='')
{
    header('location: login.php');
}

$sql = $conn->query("select * from client_table where id='".$_SESSION['client']."'");
$client = $sql->fetch_assoc();

?>