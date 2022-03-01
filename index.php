<?php
namespace TP_API;


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