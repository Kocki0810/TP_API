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
    function LogIn($username, $password)
    {
        $db = new Connect();
        $result = $db->SQL_query("SELECT * FROM brugere WHERE username = '$username' AND password = '$password'");
        if($result->num_rows != 1)
        {
            return false;
        }
        else
        {
            $id = $result->fetch_assoc()["ID"];
            return $id;
        }
//        $sessionkey = password_hash(random_bytes(64),  PASSWORD_DEFAULT );
//        $expire = date("Y-M-D h:i:s", time()+3600);
//        $db->SQL_query("UPDATE brugere SET sessionkey = '$sessionkey', sessionexpire = '$expire' WHERE id = '$id'");
//        return $sessionkey;
    }
}

?>