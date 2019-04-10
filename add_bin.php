<?php

//------------------------------Authentication----------------------------------------
include ("authenticate.php");
$userInfo = authenticateUser();
$usertype = $userInfo["userType"];
$userId = $userInfo["userID"];

if ($usertype != "employee"){
    header("Location: invalid_access.php");
    return;
}
//------------------------------Authentication----------------------------------------


?>