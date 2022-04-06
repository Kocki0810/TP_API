<?php

include_once "Funktionalitet/Card.php";
$id = $_POST["id"];


$card = new GetCard($id);

echo json_encode($card->GetCards());