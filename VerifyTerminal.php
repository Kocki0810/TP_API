<?php

include_once "db_connect.php";

$tid = $POST["tid"];
$key = $POST["key"];
$key = hash("sha512", $key);
$result = SQL_query("SELECT * FROM terminal WHERE ID = '$tid' AND api_key = '$key'");

if($result->num_rows != 1)
{
    echo "False";
    exit;
}
else
{
    SQL_query("UPDATE terminal SET last_online = ".date()." WHERE ID = '$tid'");
    echo "Success";
}
?>