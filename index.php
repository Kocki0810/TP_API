<?php

include_once "Funktionalitet/Transfer.inc";
include_once "Funktionalitet/db_connect.php";


//switch($function)
//{
//    case "card":
//        include("card.inc");
//        break;
//    case "transfer":
//        include("Transfer.inc");
//        break;
//}
$test = new Transaktion("1234", "1234", "1234", "1234");
$test->Insert(1);
unset($test);
?>