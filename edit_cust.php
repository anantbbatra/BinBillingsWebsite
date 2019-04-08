<?php
require_once "httpManager.php";

$cust_id = $_GET['id'];

if ( isset($_POST['edit'])) {
    $firm = addCust($cust_id, $_POST['cust_name'],$_POST['cust_email'],$_POST['community_id'],
        $_POST['balance'],$_POST['provider_id'], $_POST['account_comments']);

    //echo "<pre>\n$firm\n</pre>\n";
    echo 'Firm has been updated. - <a href="manage_firms.php">Continue...</a>';
    return;
}

$firm = getFirm($cust_id);

echo('
<p>Edit Firm</p>
<form method="post">
<table border="1">

    <tr>
        <td>Field</td>
        <td>Old Value</td>
    </tr>
    <tr>
        <td>provider_id</td>
        <td>'.$firm["provider_id"].'</td>
        
    </tr>
    <tr>
        <td>provider_name</td>
        <td><input type="text" name="provider_name" value = "'.$firm["provider_name"].'"></p></td>
    </tr>
    <tr>
        <td>provider_email</td>
        <td><input type="text" name="provider_email" value = "'.$firm["provider_email"].'"></p></td>
    </tr>
    <tr>
        <td>firm_contact_num</td>
        <td><input type="text" name="firm_contact_num" value = "'.$firm["firm_contact_num"].'"></p></td>
    </tr>
    <tr>
        <td>firm_address</td>
        <td><input type="text" name="firm_address" value = "'.$firm["firm_address"].'"></p></td>
    </tr>
    <tr>
        <td>green_rate</td>
        <td><input type="text" name="green" value = "'.$firm["green"].'"></p></td>
    </tr>
    <tr>
        <td>brown_rate</td>
        <td><input type="text" name="brown" value = "'.$firm["brown"].'"></p></td>
    </tr>
    <tr>
        <td>red_rate</td>
        <td><input type="text" name="red" value = "'.$firm["red"].'"></p></td>
    </tr>
    <tr>
        <td>paymentInfo</td>
        <td><input type="text" name="paymentinfo" value = "'.$firm["paymentinfo"].'"></td>
    </tr>
    <tr>
        <td>account_status</td>
        <td>'.$firm["account_status"].'</td>
    </tr>
    <tr>
        <td>account_comments</td>
        <td><input type="text" name="account_comments" value = "'.$firm["account_comments"].'"></td>
    </tr>
    
    </table>
    
    <p><input type="submit" value="Edit" name="edit"/>
    <a href="manage_firms.php">Cancel</a></p>
</form>

');
?>