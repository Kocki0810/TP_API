<?php


// $key = $POST["key"];
// $card_number = $POST["card_number"];
// $pin = $POST["pin"];
// $tid = $POST["tid"];

$key = "1234";
$card_number = "1234";
$pin = "1234";
$sql = "SELECT * FROM card WHERE api_key = '$key' AND card_number = '$card_number'";
$result = SQL_query($sql);
if($result->num_rows != 1)
{
    echo "False";
    exit;
}
else
{
    $row = $result->fetch_assoc();

    if($row["pin"] != $pin)
    {
        echo "Wrong pin";
        exit;
    }
}
var_dump($result);
?>