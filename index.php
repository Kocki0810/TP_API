<?php 

include "db_connect.php";
include "Verify.inc";

$function = $POST["function"];

switch($function)
{
    case "card":
        include("card.inc");
        break;
    case "transfer":
        include("Transfer.inc");
        break;
}

?>