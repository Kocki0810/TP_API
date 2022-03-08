<?php
class Connect
{


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
        return $this->conn()->query($sql);

    }

}

?>