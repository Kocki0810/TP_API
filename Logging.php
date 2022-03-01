<?php

namespace TP_API;

class Logging
{
    function Log($message, $severity = "INFO")
    {
        $db = new Connect();
        $db->conn();
        $date = date('d-m-y h:i:s');
        $db->SQL_query("INSERT INTO log (severity, msg, date)  VALUES ('$severity', '$message', '$date' ");
    }
}