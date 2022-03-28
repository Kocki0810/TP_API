<?php


include_once "db_connect.php";

class UpdateUser
{
    function Update($id, $card_number = null)
    {
        $db = new Connect();
        if($card_number != null)
        {
            $userid = $db->SQL_query("SELECT * FROM card WHERE card_number = $card_number")->fetch_assoc()["card_holder"];
        }
        else
        {
            $userid = $id;
        }
        $db->SQL_query("UPDATE update_data SET update_user = '1' WHERE brugerID = '$userid'");
    }

    function CheckStatus($id)
    {
        $db = new Connect();
        $status = $db->SQL_query("SELECT * FROM update_data WHERE brugerID = '$id'")->fetch_assoc()["update_user"];
        if($status == 1)
        {
            $db->SQL_query("UPDATE update_data SET update_user = 1 WHERE brugerID = '$id'");
        }
    }
}