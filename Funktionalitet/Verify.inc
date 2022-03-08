<?php

class Verify
{
    function Card_Active($card_number)
    {
        $db = new Connect();

        $sql = "SELECT * FROM card WHERE card_number = '$card_number'  AND status = '1' LIMIT 1";
        $result = $db->SQL_query($sql);
        return $result->num_rows == 1;

    }
    function Check_Pin($card_number, $pin)
    {
        $db = new Connect();

        $sql = "SELECT * FROM card WHERE card_number = '$card_number' AND pin = '$pin' LIMIT 1";
        $result = $db->SQL_query($sql);
        return $result->num_rows == 1;
    }
}

?>