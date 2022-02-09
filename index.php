<?php 

include "db_connect.php";
$name = "test";
SQL_query("INSERT INTO brugere (name) VALUES (':Name')", [":Name" => $name]);

?>