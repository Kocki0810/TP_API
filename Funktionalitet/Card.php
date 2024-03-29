<?php
include_once "db_connect.php";
include_once "Verify.php";
include_once "Logging.php";
class Card
{
    public $card_number;
    public $pin;
    public $amount;
    public $created_at;
    public $card_holder;
    public $status;

    function __construct($row)
    {
        $this->card_number = $row["card_number"];
        $this->pin = $row["pin"];
        $this->amount = $row["amount"];
        $this->created_at = $row["created_at"];
        $this->card_holder = $row["card_holder"];
        $this->status = $row["status"];
    }

    function CreateCard()
    {
        $db = new Connect();
        $date = date("Y-m-d");
        $values = "'$this->card_number', '$this->amount', '$date', '$this->card_holder', '$this->pin', '0'";
        $sql = "INSERT INTO card  (card_number, amount, created_at, card_holder, pin, status) VALUES ($values)";
        $db->SQL_query($sql);
        $update = new UpdateUser();
        $update->Update(0, $this->card_number);
    }

    function SetCardStatus($status)
    {
        $db = new Connect();
        if($status == "0" || $status == "1")
        {
            $db->SQL_query("UPDATE card SET status = '$status' WHERE card_number = '$this->card_number'");
            $update = new UpdateUser();
            $update->Update(0, $this->card_number);
            Logging::Log("Card $this->card_number updated status to $status", "SECURITY");
        }
    }

    function DeleteCard()
    {
        $db = new Connect();
        $db->SQL_query("DELETE FROM card WHERE  card.card_number = $this->card_number");
        $update = new UpdateUser();
        $update->Update(0, $this->card_number);
        Logging::Log("Card $this->card_number deleted", "SECURITY");
    }
}

class GetCard
{
    public $id;

    function __construct($card_holder)
    {
        $this->id = $card_holder;
    }

    function GetCards()
    {
        $db = new Connect();
        $result = $db->SQL_query("SELECT * FROM card WHERE card_holder = '$this->id'");
        while ($row = $result->fetch_assoc()) {
            $array[] = $row;
        }
        return $array;
    }
}
?>