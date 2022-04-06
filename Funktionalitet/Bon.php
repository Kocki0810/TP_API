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
    
}

class GetBon
{
    public $card_number;
    

    function __construct($card_number)
    {
        $this->card_number = $card_number;
    }

    function RetrieveData()
    {
        $db = new Connect();
        Logging::Log("Data retrieved by $this->card_number");
        $array = array();

        $result = $db->SQL_query("SELECT bl.tekst, b.subtotal, b.id as bonid, bl.id as lid, bl.antal, bl.pris FROM bon_linje bl JOIN bon b ON bl.bonID = b.id WHERE b.card_number = '$this->card_number';");
        while ($row = $result->fetch_assoc()) {
            $temp = array();

            $temp["tekst"] = $row["tekst"];
            $temp["antal"] = $row["antal"];
            $temp["pris"] = $row["pris"];

            $array[$row["bonid"]][$row["lid"]] = $temp;
        }
        return $array;
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
}

