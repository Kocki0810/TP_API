<?php
class Connect
{
    public $last_insert_id;
    function conn()
    {
        $servername = "sql.itcn.dk";
        $hostname = "mads807k.SKOLE";
        $password = "X74nQf55Cf";
        $db = "mads807k.skole";
        return new mysqli($servername, $hostname, $password, $db);
    }

    function SQL_query($sql)
    {
        $conn = $this->conn();
        $result = $conn->query($sql);
        $this->last_insert_id = $conn->insert_id;
        return $result;
    }

    function last_id()
    {
        return $this->last_insert_id;
    }
}

?>