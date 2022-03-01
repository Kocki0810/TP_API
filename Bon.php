<?php
namespace TP_API;
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
}
