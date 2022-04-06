<?php


include_once "Funktionalitet/Bon.php";

$cardnumber = $_POST["card_number"];
$bon = array();
$bon = new GetBon($cardnumber);
echo json_encode($bon->RetrieveData());



?>