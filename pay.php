<?php
include_once "Funktionalitet/Bon.php";
include_once "Funktionalitet/Transfer.php";
include_once "Funktionalitet/Verify.php";

$draw_from = ($_POST["from"] ?? "");
$send_to = ($_POST["to"] ?? "");
$terminal_id = ($_POST["terminal"] ?? "");
$pin = ($_POST["pin"] ?? "");
$bon = json_decode(str_replace("\\", "", $_POST["bon"]), true);
$bon_linjer = array();
$subtotal = 0;

error_reporting("0");

for($i = 0; $i < count($bon["reciepts"]); $i++)
{
    $temp = $bon["reciepts"][$i];
    $linje = new Bon_linje($temp["name"], $temp["antal"], $temp["pris"]);
    $subtotal += $temp["pris"] * $temp["antal"];

    $bon_linjer[$i] = $linje;
}

$transaction = new Transaktion($draw_from, $terminal_id, $pin);
$transaction->Withdraw($subtotal);

$new_bon = new Bon($subtotal, $draw_from);
$lastid = $new_bon->AddToDB();
foreach($bon_linjer as $linje)
{
    $linje->AddtoDB($lastid);
}
