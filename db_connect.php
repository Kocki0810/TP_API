<?php


function Connect()
{
    
    $servername = "sql.itcn.dk";
    $hostname = "mads807k.SKOLE";
    $password = "X74nQf55Cf";

    return new mysqli($servername, $hostname, $password, "masd807k.skole");
}

function SQL_query($sql)
{
    $conn = Connect();
    return $stmt = $conn->query($sql);
}

function SQL_insert($sql, $param)
{
    $conn = Connect();
    $stmt = $conn->prepare($sql);
    $stmt->execute($param);
}


?>