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
if (isset($_POST['status']) && isset($_POST['color'])
    && isset($_POST['provider_id'])) {
    $bin = uploadBin($_POST['color'],$_POST['provider_id'],$_POST['mac']);

    //echo "<pre>\n$firm\n</pre>\n";
    echo 'Success - <a href="manage_bins.php">Continue...</a>';
    return;
}


?>

<h1>Add Bin</h1>
<form method="post">
    <table border="1">
        <tr>
            <td>Field</td>
            <td>Value</td>
        </tr>
        <tr>
            <td>MAC Adress</td>
            <td> <input type="text" name="mac"></td>
        </tr>
        <tr>
            <td>color</td>
            <td> <input type="text" name="color"></td>
        </tr>
        <tr>
            <td>provider_id</td>
            <td> <input type="text" name="provider_id"></td>
        </tr>

    </table>

    <p><input type="submit" value="add new"/>
        <a href="manage_bins.php">Cancel</a></p>
</form>
