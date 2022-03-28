<?php
include_once "db_connect.php";
include_once "Verify.php";
include_once "Logging.php";
class Bon
{
    public $subtotal;
    public $card_number;
    function __construct($subtotal, $card_number)
    {
        $this->subtotal = $subtotal;
        $this->card_number = $card_number;
    }

    function AddToDB()
    {
        $db = new Connect();
        $db->SQL_query("INSERT INTO bon (subtotal, card_number) values ('$this->subtotal', '$this->card_number')");
        return $db->last_id();
    }
    function RetrieveData($card_number)
    {
        $db = new Connect();
        Logging::Log("Data retrieved by $card_number");
        return $db->SQL_query("SELECT * FROM bon WHERE $card_number")->fetch_assoc();
    }
}

class Bon_linje
{
    public $tekst;
    public $antal;
    public $pris;

    function __construct($tekst, $antal, $pris)
    {
        $this->tekst = $tekst;
        $this->antal = $antal;
        $this->pris = $pris;
    }

    function AddtoDB($bonid)
    {
        $db = new Connect();
        $db->SQL_query("INSERT INTO bon_linje (tekst, pris, antal, bonID) VALUES ('$this->tekst', '$this->pris', '$this->antal', '$bonid')");
    }

    function RetrieveLines($bonid)
    {
        $db = new Connect();
        return $db->SQL_query("SELECT * FROM bon_linje WHERE bonID = '$bonid'")->fetch_assoc();
    }
}
