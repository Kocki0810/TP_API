<?php
include_once "db_connect.php";
include_once "Verify.php";
include_once "Logging.php";
include_once "UpdateUser.php";
class Transaktion
{
    public $card_number;
    public $terminal_id;
    public $pin;
    function __construct($card_id, $terminal_id, $pin)
    {
        $this->card_number = $card_id;
        $this->terminal_id = $terminal_id;
        $this->pin = $pin;
    }

    function Withdraw($amount)
    {
        $db = new Connect();
        $db->conn();

        $verify = new Verify();
        if(!$verify->Card_Active($this->card_number))
        {
            echo "Error 404";
            return;
        }
        $verify->Card_Active($this->card_number);
        if(!$verify->Check_Pin($this->card_number, $this->pin))
        {
            Logging::Log("Attempted login on $this->card_number with $this->pin at $this->terminal_id", "SECURITY");
            echo "wrong pin";
            return;
        }
        $result = $db->SQL_query("SELECT amount FROM card WHERE card_number = '$this->card_number' LIMIT 1");
        $money = $result->fetch_assoc()["amount"];
        if($money < $amount)
        {
            Logging::Log("Attempted withdrawal on $this->card_number not enough money amount = $amount");
            echo "Not enough money";
            return;
        }
        $update = new UpdateUser();
        $update->Update(0, $this->card_number);

        $new_amount = $money - $amount;
        $db->SQL_query("UPDATE card SET amount = '$new_amount' WHERE card_number = '$this->card_number'");
        Logging::Log("$amount withdrawn from $this->card_number at $this->terminal_id new amount = $new_amount");
        echo "Success";
    }

    function Insert($amount)
    {
        $db = new Connect();
        $db->conn();

        $verify = new Verify();
        if(!$verify->Card_Active($this->card_number))
        {
            Logging::Log("Attempted to insert money into $this->card_number, card does not exist amount $amount");
            echo "Error 404";
            return;
        }
        Logging::Log("Inserted $amount into $this->card_number");
        $db->SQL_query("UPDATE card SET amount = amount + '$amount' WHERE card_number = '$this->card_number'");
        $update = new UpdateUser();
        $update->Update(0, $this->card_number);
        echo "Success";
    }
}

?>