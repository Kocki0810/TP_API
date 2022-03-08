<?php
include_once "db_connect.php";
include_once "Verify.inc";
include_once "Logging.php";
class Bon
{
    public $subtotal;

    function __construct($subtotal)
    {
        $this->subtotal = $subtotal;
    }

    function AddToDB()
    {
        $db = new Connect();
        $db->SQL_query("INSERT INTO bon (subtotal) values ('$this->subtotal')");
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
    public $bonid;

    function __construct($tekst, $antal, $pris, $bonid)
    {
        $this->tekst = $tekst;
        $this->antal = $antal;
        $this->pris = $pris;
        $this->bonid = $bonid;
    }

    function AddtoDB()
    {
        $db = new Connect();
        $db->SQL_query("INSERT INTO bon_linje (tekst, pris, antal, bonID) VALUES ('$this->tekst', '$this->pris', '$this->antal', '$this->bonid')");
    }

    function RetrieveLines($bonid)
    {
        $db = new Connect();
        return $db->SQL_query("SELECT * FROM bon_linje WHERE bonID = '$bonid'")->fetch_assoc();
    }
}
