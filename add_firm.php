<?php

//------------------------------Authentication----------------------------------------
include ("authenticate.php");
$userInfo = authenticateUser();
$usertype = $userInfo["userType"];
$userId = $userInfo["userId"];

if ($usertype != "employee"){
    header("Location: invalid_access.php");
    return;
}
//------------------------------Authentication----------------------------------------


include('navBar.php');
require_once "httpManager.php";
if ( isset($_POST['provider_name']) && isset($_POST['provider_email'])
    && isset($_POST['firm_contact_num']) && isset($_POST['firm_address'])
    && isset($_POST['green_rate']) && isset($_POST['brown_rate'])
    && isset($_POST['red_rate'])&& isset($_POST['paymentInfo'])) {

    $firm = addFirm($_POST['provider_name'],$_POST['provider_email'],$_POST['firm_contact_num'],
        $_POST['firm_address'],$_POST['green_rate'],$_POST['brown_rate'],
        $_POST['red_rate'],$_POST['paymentInfo']);

    //echo "<pre>\n$firm\n</pre>\n";
    echo 'Success - <a href="manage_firms.php">Continue...</a>';
    return;
}

echo('<h1>Create a new Provider Account</h1>');

?>
<form method="post">
    <p>provider_name:
        <input type="text" name="provider_name"></p>
    <p>provider_email:
        <input type="text" name="provider_email"></p>
    <p>firm_contact_num:
        <input type="text" name="firm_contact_num"></p>
    <p>firm_address:
        <input type="text" name="firm_address"></p>
    <p>green_rate:
        <input type="number" min="0" name="green_rate"></p>
    <p>brown_rate:
        <input type="number" min="0" name="brown_rate"></p>
    <p>red_rate:
        <input type="number" min="0" name="red_rate"></p>
    <p>paymentInfo:
        <input type="text" name="paymentInfo"></p>
    <p><input type="submit" value="Add New"/>
        <a href="manage_firms.php">Cancel</a></p>
</form>