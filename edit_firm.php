<?php
require_once "httpManager.php";

$provider_id = $_GET['id'];

if ( isset($_POST['edit'])) {
    $firm = addFirm($provider_id, $_POST['provider_name'],$_POST['provider_email'],$_POST['firm_contact_num'],
        $_POST['firm_address'],$_POST['green'],$_POST['brown'],
        $_POST['red'],$_POST['paymentinfo'], $_POST['account_comments']);

    //echo "<pre>\n$firm\n</pre>\n";
    echo 'Firm has been updated. - <a href="manage_firms.php">Continue...</a>';
    return;
}

$firm = getFirm($provider_id);

echo('
<p>Edit Firm</p>
<form method="post">
<table border="1">

    <tr>
        <td>Field</td>
        <td>Old Value</td>
        <td>Enter New Value</td>
    </tr>
    <tr>
        <td>provider_id</td>
        <td>'.$firm["provider_id"].'</td>
        
    </tr>
    <tr>
        <td>provider_name</td>
        <td>'.$firm["provider_name"].'</td>
        <td><input type="text" name="provider_name"></p></td>
    </tr>
    <tr>
        <td>provider_email</td>
        <td>'.$firm["provider_email"].'</td>
        <td><input type="text" name="provider_email"></p></td>
    </tr>
    <tr>
        <td>firm_contact_num</td>
        <td>'.$firm["firm_contact_num"].'</td>
        <td><input type="text" name="firm_contact_num"></p></td>
    </tr>
    <tr>
        <td>firm_address</td>
        <td>'.$firm["firm_address"].'</td>
        <td><input type="text" name="firm_address"></p></td>
    </tr>
    <tr>
        <td>green_rate</td>
        <td>'.$firm["green"].'</td>
        <td><input type="text" name="green"></p></td>
    </tr>
    <tr>
        <td>brown_rate</td>
        <td>'.$firm["brown"].'</td>
        <td><input type="text" name="brown"></p></td>
    </tr>
    <tr>
        <td>red_rate</td>
        <td>'.$firm["red"].'</td>
        <td><input type="text" name="red"></p></td>
    </tr>
    <tr>
        <td>paymentInfo</td>
        <td>'.$firm["paymentinfo"].'</td>
        <td><input type="text" name="paymentinfo"></td>
    </tr>
    <tr>
        <td>account_status</td>
        <td>'.$firm["account_status"].'</td>
    </tr>
    <tr>
        <td>account_comments</td>
        <td>'.$firm["account_comments"].'</td>
        <td><input type="text" name="account_comments"></td>
    </tr>
    
    </table>
    
    <p><input type="submit" value="Edit" name="edit"/>
    <a href="manage_firms.php">Cancel</a></p>
</form>

');
?>