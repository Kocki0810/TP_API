<?php
include_once "Funktionalitet/UpdateUser.php";


$userid = $_POST["id"];

$updateUser = new UpdateUser();

echo $updateUser->CheckStatus($userid);
exit;