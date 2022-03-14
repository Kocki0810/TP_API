<?php

include_once "Funktionalitet/Verify.php";
include_once "Funktionalitet/db_connect.php";

$username = $_POST["username"];
$password = $_POST["password"];

$login = new Verify();
if(!$login->LogIn($username, $password))
{
    echo "Wrong username or password";
    exit;
}
else
{
    echo "OK";
    exit;
}
?>