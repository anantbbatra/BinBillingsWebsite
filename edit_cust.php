<?php
include('navBar.php');
require_once "httpManager.php";

//------------------------------Authentication----------------------------------------
include ("authenticate.php");
$userInfo = authenticateUser();
$usertype = $userInfo["userType"];
$userId = $userInfo["userId"];
//------------------------------Authentication----------------------------------------


$cust_id = $_GET['id'];

if ( isset($_POST['edit'])) {
    $firm = updateCust($cust_id, $_POST['cust_name'],$_POST['cust_email'],$_POST['community_id'],
        $_POST['balance'],$_POST['provider_id'], $_POST['account_comments']);
    //echo "<pre>\n$firm\n</pre>\n";
    echo 'Customer has been updated. - <a href="manage_customers.php">Continue...</a>';
    return;
}

$firm = getCust($cust_id);

echo('
<p>Edit Customer</p>
<form method="post">
<table border="1">

    <tr>
        <td>Field</td>
        <td>Old Value</td>
    </tr>
    <tr>
        <td>cust_id</td>
        <td>'.$firm["cust_id"].'</td>
        
    </tr>
    <tr>
        <td>cust_name</td>
        <td><input type="text" name="cust_name" value = "'.$firm["cust_name"].'"></p></td>
    </tr>
    <tr>
        <td>cust_email</td>
        <td><input type="text" name="cust_email" value = "'.$firm["cust_email"].'"></p></td>
    </tr>
    <tr>
        <td>community_id</td>
        <td><input type="text" name="community_id" value = "'.$firm["community_id"].'"></p></td>
    </tr>
    ');
if ($usertype=="employee"){echo('
    
    <tr>
        <td>balance</td>
        <td><input type="text" name="balance" value = "'.$firm["balance"].'"></p></td>
    </tr>
    <tr>
        <td>provider_id</td>
        <td><input type="text" name="provider_id" value = "'.$firm["provider_id"].'"></p></td>
    </tr>
    
 ');
}else{
    echo (' <td><input type="hidden" name="balance" value = "'.$firm["balance"].'"></p></td>
        <td><input type="hidden" name="provider_id" value = "'.$firm["provider_id"].'"></p></td>
');
}

echo('
    <tr>
        <td>provider_name</td>
        <td>'.$firm["provider_name"].'</td>
    </tr>
    <tr>
        <td>apartment_name</td>
        <td>'.$firm["apartment_name"].'</td>
    </tr>
    <tr>
        <td>city_name</td>
        <td>'.$firm["city_name"].'</td>
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
    <a href="manage_customers.php">Cancel</a></p>
</form>

');
?>