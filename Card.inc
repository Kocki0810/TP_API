<?php
namespace TP_API;
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
}
?>