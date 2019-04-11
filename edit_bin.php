<?php
require_once "httpManager.php";
include('navBar.php');
//------------------------------Authentication----------------------------------------
include ("authenticate.php");
$userInfo = authenticateUser();
$usertype = $userInfo["userType"];
$userId = $userInfo["userId"];
//------------------------------Authentication----------------------------------------

$bin_id = $_GET['bin_id'];

if (isset($_POST['edit'])) {
    $bin = uploadBin($_POST['status'],$_POST['community_id'],$_POST['x_coordinate'],
        $_POST['y_coordinate'],$_POST['color'],$_POST['provider_id'],$_POST['bin_id'],$_POST['mac']);

    //echo "<pre>\n$bin\n</pre>\n";
    echo 'Bin has been updated. - <a href="manage_bins.php">Continue...</a>';
    return;
}

$bin = getBin($bin_id);

echo('
<h1>Edit Bin</h1>
<form method="post">
<table border="1">

    <tr>
        <td>Field</td>
        <td>Old Value</td>
    </tr>
    <tr>
        <td>bin_id</td>
        <td>'.$bin["bin_id"].'</td>
    </tr>
    <input type="hidden" name="bin_id" value = "'.$bin["bin_id"].'"> 
    
    ');
if ($usertype=="employee"){
    echo ('
       
    <tr>
        <td>community_id</td>
        <td>'.$bin["community_id"].'</td>
    </tr>
    <input type="hidden" name="community_id" value = "'.$bin["community_id"].'">    
    <tr>
        <td>x_coordinate</td>
        <td>'.$bin["x_coordinate"].'</td>
    </tr>
    <input type="hidden" name="x_coordinate" value = "'.$bin["x_coordinate"].'">
    <tr>
        <td>y_coordinate</td>
        <td>'.$bin["y_coordinate"].'</td>
    </tr>
    <input type="hidden" name="y_coordinate" value = "'.$bin["y_coordinate"].'">
    
    <tr>
        <td>provider_id</td>
        <td><input type="text" name="provider_id" value = "'.$bin["provider_id"].'"></p></td>
    </tr>
    <tr>
        <td>MAC_address</td>
        <td><input type="text" name="mac" value = "'.$bin["mac"].'"></p></td>
    </tr>
    <tr>
        <td>color</td>
        <td><input type="text" name="color" value = "'.$bin["color"].'"></p></td>
    </tr>
    ');
}else{
    echo('
    <tr>
        <td>community_id</td>
        <td><input type="text" name="community_id" value = "'.$bin["community_id"].'"></td>
    </tr>
    <tr>
        <td>color</td>
        <td>'.$bin["color"].'</td>
        <input type="hidden" name="color" value = "'.$bin["color"].'">
    </tr>
    <tr>
        <td>x_coordinate</td>
        <td><input type="text" name="x_coordinate" value = "'.$bin["x_coordinate"].'"></td>
    </tr>
    <tr>
        <td>y_coordinate</td>
        <td><input type="text" name="y_coordinate" value = "'.$bin["y_coordinate"].'"></td>
        <input type="hidden" name="provider_id" value = "'.$bin["provider_id"].'">
    </tr>  
    <tr>
        <td>MAC_address</td>
        <td>'.$bin["mac"].'</td>
    </tr>
    <input type="hidden" name="mac" value = "'.$bin["mac"].'">  
    
    ');
}
echo('
    <tr>
        <td>status</td>
        <td>'.$bin["status"].'</td>
    </tr>
    <input type="hidden" name="status" value = "'.$bin["status"].'">
    <tr>
        <td>unlockCode</td>
        <td>'.$bin["unlockcode"].'</td>
    </tr>
</table>
    
    <p><input type="submit" value="Edit" name="edit"/>
    <a href="manage_bins.php">Cancel</a></p>
</form>

');
?>